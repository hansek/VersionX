/*
 * VersionX
 *
 * Copyright 2010-2011 by Mark Hamstra (contact via www.markhamstra.nl)
 *
 * This file is part of VersionX, a basic versioning addon for MODx CMF.
 *
 * VersionX is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * VersionX is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * VersionX; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package versionx
 */

VersionX.panel.Hometabs = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel' // Basic class to use -> styles the whole thing.
        ,items: [{ // Multidimensional array of items in the panel.Hometabs config
            html: '<h2>'+_('versionx.versionx')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header' // Header class
        },{
            xtype: 'modx-tabs' // Use the MODx class template
            ,bodyStyle: 'padding: 10px'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,stateful: true
            ,stateId: 'versionx-home-tabpanel'
            ,items: [{
                title: _('versionx.overviewTitle')
                ,defaults: { autoHeight: true }
                ,items: [{
                    html: '<p>'+_('versionx.overviewDescription')+'</p>'
                    ,border: false
                    ,bodyStyle: 'padding: 10px'
                },{ 
						html: '<h3>'+_('versionx.devTitle')+'</h3>'+
							'<p>'+_('versionx.devDescription')+'</p>'
						,border: false
						,bodyStyle: 'padding: 10px'
					 }]	
            },{
                title: _('versionx.resourcesTitle')
                ,defaults: { autoHeight: true }
                ,items: [{
                    html: '<p>'+_('versionx.resourcesDescription')+'</p>'
                    ,border: false
                    ,bodyStyle: 'padding: 10px'
                },{
                    xtype: 'versionx-grid-resources'
                    ,preventRender: true
                }]
            },{
					title: _('versionx.chunksTitle')+' and '+_('versionx.snippetsTitle')+' coming in 1.1'
					,disabled: true
				}
				
				/*{
                title: _('versionx.chunksTitle')
                ,defaults: { autoHeight: true }
					 ,disabled: true
                ,items: [{
                    html: '<p>'+_('versionx.chunksDescription')+'</p>'
                    ,border: false
                    ,bodyStyle: 'padding: 10px'
                }]
            },{
                title: _('versionx.snippetsTitle')
                ,defaults: { autoHeight: true }
					 ,disabled: true
                ,items: [{
                    html: '<p>'+_('versionx.snippetsDescription')+'</p>'
                    ,border: false
                    ,bodyStyle: 'padding: 10px'
                }]
				}*/]
        }]
    });
    VersionX.panel.Hometabs.superclass.constructor.call(this,config);
};
Ext.extend(VersionX.panel.Hometabs,MODx.Panel); // Extend it from the base MODx Panel
Ext.reg('versionx-panel-hometabs',VersionX.panel.Hometabs); // Register xtype (template)

VersionX.grid.Resources = function(config) {
    config = config || {};
    Ext.applyIf(config,{
		  url: MODx.config.assets_url+'components/versionx/connector.php'
		  ,id: 'resourcegrid'
		  ,baseParams: { action: 'getlist' }
		  ,fields: ["revision","fromRev","mode","time","type","contentType","pagetitle","longtitle","description","alias","link_attributes","published","pub_date","unpub_date","parent","isfolder","introtext","contentField","richtext","template","menuindex","searchable","cacheable","createdby","createdon","editedby","editedon","deleted","deletedon","deletedby","publishedon","publishedby","menutitle","donthit","haskeywords","hasmetatags","privateweb","privatemgr","content_dispo","hidemenu","classKey","context_key","content_type","docid","editor"]
		  ,paging: true
		  ,autosave: false
		  ,remoteSort: false
		  ,primaryKey: 'revision'
		  ,columns: [{
            header: _('versionx.grid.revNum') //'#' 
            ,dataIndex: 'revision'
            ,sortable: true
            ,width: 4
			},{
			header: _('versionx.grid.docID') //'Res. ID' 
            ,dataIndex: 'docid'
            ,sortable: true
            ,width: 14
         },{
				header: _('versionx.grid.mode') 
				,dataIndex: 'mode'
				,sortable: true
				,width: 14
				,renderer: function(val, meta, record) {
					if (val=='upd') { return _('versionx.grid.mode.upd'); } //'modified'; }
					if (val=='new') { return _('versionx.grid.mode.new'); }
					if (val.substr(0,3)=='rev') { return _('versionx.grid.mode.rev')+' ('+val.substr(3)+')'; }
				}
			},{
            header: _('versionx.grid.fromRev') //'Prior' 
            ,dataIndex: 'fromRev'
            ,sortable: true
            ,width: 16
			},{
            header: _('versionx.grid.class') //'Class' 
            ,dataIndex: 'classKey'
            ,sortable: true
            ,width: 18
         },{
            header: _('versionx.grid.time') //'Time' 
            ,dataIndex: 'time'
            ,sortable: true
            ,width: 18
        },{
            header: _('versionx.grid.editor') //'Editor' 
            ,dataIndex: 'editedby'
            ,sortable: true
            ,width: 16
		}]
			,listeners: {
				'cellcontextmenu': function(grid, row, col, eventObj){
					var _contextMenu = new Ext.menu.Menu({
						items: [{
							text: _('versionx.grid.details') //'View details'
							//,icon: '../assets/components/versionx/images/star.gif'
							,handler: function() {
								resourcewindow(grid, eventObj, row)
							}
						},{
							text: _('versionx.grid.compare') //'Compare'
							,handler: function() {
								comparewindow(grid, eventObj, row)
							}
						},{
							text: _('versionx.grid.restore') //'Restore'
							,handler: function() {
								Ext.MessageBox.confirm(_('versionx.grid.restoreTitle'), _('versionx.grid.restoreMsg'), function(btn){
								if(btn === 'yes'){
									var conn = new Ext.data.Connection();
									var pGrid = Ext.ComponentMgr.get('resourcegrid'); //ID as specified in the gridPanel config
									var gridrecord = pGrid.getSelectionModel().getSelected().json;
									var x = gridrecord.revision;
									if (x==undefined) { window.alert(_('versionx.error.idnotfound')); }
									else { 
										conn.request({
											url: MODx.config.assets_url+'components/versionx/connector.php', 
											method: 'POST',
											params: { action: 'restorerevision', revision: x },
											success: function(responseObject) {
												var returned = responseObject.responseText;
												if (returned == 'OK') {
													window.alert(_('versionx.grid.restore.done'));
													window.location.reload(true);
												}
											},
											failure: function() {
												window.alert(_('versionx.error.requestfailed'));
											}
										});
									}
								}
								else{
									// User pressed no or canceled: do nothing
								}
							 });
							}
						}]
					});
					_contextMenu.showAt(eventObj.getXY());
				}
			}
    });
    VersionX.grid.Resources.superclass.constructor.call(this,config);
};
Ext.extend(VersionX.grid.Resources,MODx.grid.Grid);
Ext.reg('versionx-grid-resources',VersionX.grid.Resources);

function resourcewindow(g, eventObj, row) {
	var pGrid = Ext.ComponentMgr.get('resourcegrid'); //ID as specified in the gridPanel config
	var gridrecord = pGrid.getSelectionModel().getSelected().json;
	var x = gridrecord.revision;
	if (x==undefined) { window.alert(_('versionx.error.idnotfound')); }
	else {
		if (win) { win.close(); }
		var win = new Ext.Window({
			title: _('versionx.detailwindow.title') //'Resource Revision '+x
			,closeable: true
			,closeAction: 'close'
			,id: 'resourcewindow'
			,hidden: false
			,resizable: false
			,renderTo: 'viewdetails-window'
			,width: 800 // Width required to properly display tabs in the window
			,autoHeight: true
			
			// The below needs to be lexicon-ified still!
			,items: [{
				xtype: 'modx-tabs'
				,bodyStyle: 'padding: 10px'
				,defaults: { border: false }
				,items: [{
					title: _('versionx.detailwindow.basictab') //'Basic Fields'
					,cls: 'modx-panel'
					,bodyStyle: 'padding: 10px' 
					,html: '<table><tr><td width="170px">'+_('resource_template')+'</td><td>'+gridrecord.template+'</td></tr><tr><td>'+_('resource_pagetitle')+'</td><td>'+gridrecord.pagetitle+'</td></tr><tr><td>'+_('resource_longtitle')+'</td><td>'+gridrecord.longtitle+'</td></tr><tr><td>'+_('resource_description')+'</td><td>'+gridrecord.description+'</td></tr><tr><td>'+_('resource_alias')+'</td><td>'+gridrecord.alias+'</td></tr><tr><td>'+_('resource_link_attributes')+'</td><td>'+gridrecord.link_attributes+'</td></tr><tr><td>'+_('resource_summary')+'</td><td>'+gridrecord.introtext+'</td></tr><tr><td>'+_('resource_parent')+'</td><td>'+gridrecord.parent+'</td></tr><tr><td>'+_('resource_menutitle')+'</td><td>'+gridrecord.menutitle+'</td></tr><tr><td>'+_('resource_menuindex')+'</td><td>'+gridrecord.menuindex+'</td></tr><tr><td>'+_('resource_hide_from_menus')+'</td><td>'+gridrecord.hidemenu+'</td></tr></td></tr></table>'
				},{
					title: _('versionx.detailwindow.settingstab') //'Settings'
					,bodyStyle: 'padding: 10px'
					,html: '<table><tr><td width="170px">'+_('resource_folder')+'</td><td>'+gridrecord.isfolder+'</td></tr><tr><td>'+_('resource_richtext')+'</td><td>'+gridrecord.richtext+'</td></tr><tr><td>'+_('resource_publishedon')+'</td><td>'+gridrecord.publishedon+'</td></tr><tr><td>'+_('resource_publishedby')+'</td><td>'+gridrecord.publishedby+'</td></tr><tr><td>'+_('resource_publishdate')+'</td><td>'+gridrecord.pub_date+'</td></tr><tr><td>'+_('resource_unpublishdate')+'</td><td>'+gridrecord.unpub_date+'</td></tr><tr><td>'+_('resource_searchable')+'</td><td>'+gridrecord.searchable+'</td></tr><tr><td>'+_('resource_cacheable')+'</td><td>'+gridrecord.cacheable+'</td></tr><tr><td>'+_('deleted')+'</td><td>'+gridrecord.deleted+'</td></tr><tr><td>'+_('resource_content_type')+'</td><td>'+gridrecord.content_type+'</td></tr><tr><td>'+_('resource_contentdispo')+'</td><td>'+gridrecord.content_dispo+'</td></tr><tr><td>'+_('class_key')+'</td><td>'+gridrecord.classKey+'</td></tr></table>'
				},{
					title: _('versionx.detailwindow.contenttab') //'Settings'
					,bodyStyle: 'padding: 10px'
					,html: gridrecord.contentField
				}]
			}] 
		});
	}
}
function comparewindow(g, eventObj, row) {
	var pGrid = Ext.ComponentMgr.get('resourcegrid'); //ID as specified in the gridPanel config
	var gridrecord = pGrid.getSelectionModel().getSelected().json;
	var newRev = gridrecord.revision;
	if (newRev==undefined) { window.alert(_('versionx.error.idnotfound')); }
	else {
		var old = gridrecord.fromRev;
		if (old==undefined) { window.alert(_('versionx.error.idnotfound')); }
		else {
			if (win) { win.close(); }
			var win = new Ext.Window({
				title: 'Comparing Revision '+newRev+' and '+old // @ LEXICON
				,closeable: true
				,closeAction: 'close'
				,id: 'comparewindow'
				,hidden: false
				,resizable: false
				,renderTo: 'viewdetails-window'
				,width: 800 // Width required to properly display tabs in the window
				,autoHeight: true

				,items: [{
					xtype: 'modx-tabs'
					,bodyStyle: 'padding: 10px'
					,defaults: { border: false }
					,items: [{
						title: _('versionx.comparewindow.fieldstab') //'Fields &amp; settings'
						,cls: 'modx-panel'
						,bodyStyle: 'padding: 10px'
						,xtype: 'versionx-grid-resources-compare'	
					},{
						title: _('versionx.comparewindow.contenttab') //'Content'
						,cls: 'modx-panel'
						,bodyStyle: 'padding: 10px'
						,xtype: 'versionx-grid-resources-compare-content'
					}]
				}] 
			});
		}
	}
}
VersionX.grid.Resources.Compare = function(config) {
	var pGrid = Ext.ComponentMgr.get('resourcegrid'); //ID as specified in the gridPanel config
	var gridrecord = pGrid.getSelectionModel().getSelected().json;
	var newRev = gridrecord.revision;
	if (newRev==undefined) { window.alert(_('versionx.error.idnotfound')); }
	else {
		var fromRev = gridrecord.fromRev;
		if (fromRev==undefined) { window.alert(_('versionx.error.idnotfound')); }
		else {
			config = config || {};
			Ext.applyIf(config,{
				url: MODx.config.assets_url+'components/versionx/connector.php'
				,id: 'resourcecomparegrid'
				,baseParams: { 'action': 'compareresources', 'old': fromRev, 'new': newRev }
				,fields: ["field","oldvalue","newvalue"]
				,paging: false
				,autosave: false
				,remoteSort: false
				,primaryKey: 'field'
				,columns: [{
					header: _('versionx.comparewindow.fields.field')  
					,dataIndex: 'field'
					,sortable: true
					,width: 60
				},{
					header: _('versionx.comparewindow.fields.old')+' (R'+fromRev+')'
					,dataIndex: 'oldvalue'
					,sortable: true
					,width: 100
					,forcefit: true
				},{
					header: _('versionx.comparewindow.fields.new')+' (R'+newRev+')' 
					,dataIndex: 'newvalue'
					,sortable: true
					,forcefit: true
				}]
			});
			VersionX.grid.Resources.Compare.superclass.constructor.call(this,config);
		}
	}
};
Ext.extend(VersionX.grid.Resources.Compare,MODx.grid.Grid);
Ext.reg('versionx-grid-resources-compare',VersionX.grid.Resources.Compare);



VersionX.grid.Resources.CompareContent = function(config) {
	var pGrid = Ext.ComponentMgr.get('resourcegrid'); //ID as specified in the gridPanel config
	var gridrecord = pGrid.getSelectionModel().getSelected().json;
	var newRev = gridrecord.revision;
	if (newRev==undefined) { window.alert(_('versionx.error.idnotfound')); }
	else {
		var fromRev = gridrecord.fromRev;
		if (fromRev==undefined) { window.alert(_('versionx.error.idnotfound')); }
		else {
			config = config || {};
			Ext.applyIf(config,{
				url: MODx.config.assets_url+'components/versionx/connector.php'
				,id: 'resourcecomparecontentgrid'
				,baseParams: { action: 'compareresourcescontent', 'old': fromRev, 'new': newRev }
				,fields: ["line","body"]
				,paging: false
				,autosave: false
				,remoteSort: false
				,primaryKey: 'oldvalue'
				,columns: [{
					header: _('versionx.grid.revNum')
					,dataIndex: 'line'
					,sortable: true
					,width: 10
				},{
					header: _('versionx.comparewindow.contenttab')
					,dataIndex: 'body'
					,sortable: true
					,forceFit: true
					,width: 90
					,renderer: columnWrap
				}]
			});
		}
	}
   VersionX.grid.Resources.CompareContent.superclass.constructor.call(this,config);
};
Ext.extend(VersionX.grid.Resources.CompareContent,MODx.grid.Grid);
Ext.reg('versionx-grid-resources-compare-content',VersionX.grid.Resources.CompareContent);
function columnWrap(val){
    return '<div style="white-space:normal !important;">'+ val +'</div>';
}
