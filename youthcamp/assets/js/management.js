
	Ext.onReady(function (){
		var store = Ext.create('Ext.data.Store', {
		    storeId:'campersStore',
		    fields:["id",'firstName', 'lastName', 'phoneNumber',"registrationCode","paymentStatus","role", 
		    'date_registered','arrival_day','church.name'],
		    autoLoad : true,
		    pageSize: 250,
		    proxy: {
		        type: 'ajax',
		        api: {
		        	read : 'management/getRegisteredCampersAsJson'
		        },
		        reader: {
		            type: 'json',
		            root: 'data'
		        }
		    }
		});

		var grid = Ext.create('Ext.grid.Panel', {
		    title: 'Registered Campers',
		    store: Ext.data.StoreManager.lookup('campersStore'),
		    columns: [
		        { header: 'First Name',  dataIndex: 'firstName' ,width : 80},
		        { header: 'Last Name',  dataIndex: 'lastName' ,width : 80},
		        { header: 'Phone', dataIndex: 'phoneNumber' ,width : 80},
		        { header : 'PMT Sts', dataIndex : 'paymentStatus', renderer : paymentRenderer,width : 55},
		        { header: 'Role', dataIndex: 'role',width : 50 },
		        { header: 'Reg Date', dataIndex: 'date_registered' },
		        { header: 'Arrival Day', dataIndex: 'arrival_day',width : 70 },
		        { header: 'Church', dataIndex: 'church.name' ,width : 55}
		    ],
		    height: 600,
		    width: 599,
		    
		    dockedItems: [{
		        xtype: 'pagingtoolbar',
		        store: Ext.data.StoreManager.lookup('campersStore'),   // same store GridPanel is using
		        dock: 'bottom',
		        displayInfo: true
		    }],
		    renderTo: "campers_grid"
		});

		grid.on('itemdblclick', function (grid, record){
			form.loadRecord(record);
		});

		// The data store containing the list of states
		var paymentMode = Ext.create('Ext.data.Store', {
		    fields: ['value', 'name'],
		    data : [
		        {"value":"Not Paid", "name":"Not Paid"},
		        {"value":"Paid", "name":"Paid"}
		    ]
		});

		
		var searchForm = Ext.create('Ext.form.Panel',{
			title : 'Search',
			margin : '0 0 40 0' ,
            layout: {
                type: 'hbox',
                padding:'5',
                align:'top'
            },
            defaults:{margins:'0 20 0 0'},
            defaultType: 'textfield',
            items : [
            	{
            		name : 'sFirstName',
            		fieldLabel : 'First Name'
            	},
            	{
            		name : 'sLastName',
            		fieldLabel : 'Last Name'
            	},
            	{
            		xtype : 'hiddenfield',
            		name : 'action',
            		value : 'search'
            	},
            	{
                    xtype : 'button' , 
                    text : 'Search', 
                    width : 110,
                    handler : function () {
                       var values = this.up("form").getForm().getValues();
                        //console.log(values)
                        grid.getStore().load({
                            params : values
                        });
                   
                        grid.getView().refresh(); 
                    }
                }
            ],
            renderTo : 'campers_search'
		});
	
		function paymentRenderer(val) {
	        if (Ext.String.trim(val).toLowerCase() == "paid") {
	            return '<span style="color:green;">' + val + '</span>';
	        }
	        return '<span style="color:red;">' + val + '</span>';
	    }

		var form = Ext.create('Ext.form.Panel', {
		    title: 'Manage Campers Payment',
		    bodyPadding: 5,
		    width: 300,
		    url: 'management/markCamperAsPaid',
		    layout: 'anchor',
		    defaults: {
		        anchor: '100%'
		    },
		    defaultType: 'textfield',
		    items: [
			    {
			    	xtype: 'combo',
		    	    fieldLabel: 'Payment Status',
				    store: paymentMode,
				    queryMode: 'local',
				    displayField: 'name',
				    valueField: 'value',
				    allowBlank: false,
				    editable : false,
				    name : 'paymentStatus',
			    },
			    {
			        fieldLabel: 'First Name',
			        name: 'firstName',
			        allowBlank: false,
			        editable : false,
			    },{
			        fieldLabel: 'Last Name',
			        name: 'lastName',
			        allowBlank: false,
			        editable : false,
			    },
			    {
			  		xtype : 'hiddenfield',
			    	name : 'id',
			    	allowBlank : false
			    }
		    ],

		    // Reset and Submit buttons
		    buttons: [{
		        text: 'Reset',
		        handler: function() {
		            this.up('form').getForm().reset();
		        }
		    }, {
		        text: 'Submit',
		        formBind: true, //only enabled once the form is valid
		        disabled: true,
		        handler: function() {
		            var form = this.up('form').getForm();
		            if (form.isValid()) {
		            	
		            	//var myMask = new Ext.LoadMask(grid, {msg:"Please wait..."});
						//myMask.show();
						Ext.MessageBox.show({
				           msg: 'Saving payment, please wait...',
				           progressText: 'Saving...',
				           width:300,
				           wait:true,
				           waitConfig: {interval:200},
				           icon:'ext-mb-download', //custom class in msg-box.html
				           //animateTarget: 'mb7'
				       	});

		                form.submit({
		                    success: function(form, action) {
		                    	form.reset();
		                    	Ext.MessageBox.hide();
		                    	Ext.MessageBox.show({
		                    		title: 'Success',
								    msg: action.result.msg,
								    width: 300,
								    buttons: Ext.Msg.OK,
								    icon: Ext.window.MessageBox.INFO
		                    	});
		                       	
		                       	window.grid =  grid;
		                       	grid.store.load({
		                       		callback: function(records, operation, success) {
       									grid.view.refresh();
       									Ext.MessageBox.hide();
       									//icon: Ext.window.MessageBox.INFO
       									//myMask.hide();
    								}
		                       	})
							
								
		                    },
		                    failure: function(form, action) {
		                        Ext.Msg.alert('Failed', action.result.msg);
		                        Ext.MessageBox.show({
		                    		title: 'Failure',
								    msg: "Something went wrong please try again",
								    width: 300,
								    buttons: Ext.Msg.OK,
								    icon: Ext.window.MessageBox.ERROR
		                    	});
		                    }
		                });
		            }
		        }
		    }],
		    renderTo: 'campers_form'
		});
	});
