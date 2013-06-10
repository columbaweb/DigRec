// Docu : http://wiki.moxiecode.com/index.php/TinyMCE:Create_plugin/3.x#Creating_your_own_plugins

(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('gscd');
	 
	tinymce.create('tinymce.plugins.gscd', {
		
		init : function(ed, url) {
		// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');

			ed.addCommand('gscd', function() {
				ed.windowManager.open({
					file : url + '/blackbox.php',
					width : 265,
					height : 310,
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});
			});

			// Register example button
			ed.addButton('gscd', {
				title : '960 Grid System Shortcode',
				cmd : 'gscd',
				image : url + '/z-shortcode.png'
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('gscd', n.nodeName == 'IMG');
			});
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
					longname  : 'gscd',
					author 	  : 'zourbuth',
					authorurl : 'http://www.zourbuth.com',
					infourl   : 'http://www.zourbuth.com',
					version   : "0.1 beta"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('gscd', tinymce.plugins.gscd);
})();


