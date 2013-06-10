function init() {
	tinyMCEPopup.resizeToInnerSize();
}
function d(id) { return document.getElementById(id); }
function insertGRIDcode() {

	var tagtext;
	var ctag;
	var langname_ddb = document.getElementById('960_grid');
	var langname = langname_ddb.value;

	var prefix; var suffix;
	var grid_prefix = document.getElementById('grid_prefix').value;
	var grid_suffix = document.getElementById('grid_suffix').value;	
	
	var pull; var push;
	var grid_pull = document.getElementById('grid_pull').value;
	var grid_push = document.getElementById('grid_push').value;
	
	var alpha; var omega;
	var grid_alpha = document.getElementById('grid_alpha').checked;
	var grid_omega = document.getElementById('grid_omega').checked;
	
	var searchct = langname_ddb.value.substring(0, 3)
	var inst = tinyMCE.getInstanceById('content');
	var html = inst.selection.getContent();
	
	if (grid_alpha)
		alpha = ' alpha';
	else
		alpha = '';

	if (grid_omega)
		omega = ' omega';
	else
		omega = '';
	
	pull	= grid_pull;
	push	= grid_push;
	prefix	= grid_prefix;
	suffix	= grid_suffix;
	tagtext	= "[" + langname;
	
	if ( html )
		ctag = "[/" + langname + "]";
	else
		ctag = " Your content here [/" + langname + "]";
	if ( langname == "clear" )
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, '[clear]');
	else
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext+alpha+omega+prefix+suffix+pull+push+']'+html+ctag);
	tinyMCEPopup.editor.execCommand('mceRepaint');
	tinyMCEPopup.close();
	return;
}

function flipTab(n) {
	for (i=1;i<=2;i++) {
		c = d('content'+i.toString());
		t = d('tab'+i.toString());
		if ( n == i ) {
			c.className = '';
			t.className = 'current';
		} else {
			c.className = 'hidden';
			t.className = '';
		}
	}
}