(function(){
	//Register the buttons
	tinymce.create('tinymce.plugins.highslideimage',{
		init : function(ed, url){
			ed.addButton('highslideimage',{
				icon : 'image',
				cmd : 'add_highslideimage',
				tooltip : 'Add Highslideimage'
			});
			ed.addCommand('add_highslideimage',function(){
				ed.windowManager.open({
					file : url+'/dialog.htm',
					width : 320,
					height : 120,
					inline :1
				});
			});
		},
		createControl : function(n, cm) {
                        return null;
                },
	});
	tinymce.PluginManager.add('highslideimage',tinymce.plugins.highslideimage);
})();