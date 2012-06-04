
	Ext.onReady(function (){
		var store = Ext.create('Ext.data.Store', {
		    storeId:'campersStore',
		    fields:["id",'firstName', 'lastName', 'phoneNumber',"registrationCode","paymentStatus"],
		    autoLoad : true,
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
		        { header: 'First Name',  dataIndex: 'firstName' },
		        { header: 'Last Name',  dataIndex: 'lastName' },
		        { header: 'Phone', dataIndex: 'phoneNumber' },
		        { header : 'Payment Status', dataIndex : 'paymentStatus'},
		        { header: 'Registration Code', dataIndex: 'registrationCode' }
		    ],
		    height: 400,
		    width: 520,
		    
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

		var form = Ext.create('Ext.form.Panel', {
		    title: 'Campers Records',
		    bodyPadding: 5,
		    width: 350,
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
		                form.submit({
		                    success: function(form, action) {
		                    	form.reset();
		                       	Ext.Msg.alert('Success', action.result.msg);
		                       	window.grid =  grid;
		                       	grid.store.load({
		                       		callback: function(records, operation, success) {
       									grid.view.refresh();
       									//myMask.hide();
    								}
		                       	})
							
								
		                    },
		                    failure: function(form, action) {
		                        Ext.Msg.alert('Failed', action.result.msg);
		                    }
		                });
		            }
		        }
		    }],
		    renderTo: 'campers_form'
		});
	});
