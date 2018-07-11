<script>
	var theme_uri = "<?php echo get_template_directory_uri(); ?>";

	function loadCSS( href, before, media ){
		"use strict";
			var ss = window.document.createElement( "link" );
			var ref = before || window.document.getElementsByTagName( "script" )[ 0 ];
			ss.rel = "stylesheet";
			ss.href = href;
			ss.media = "only x";
			ref.parentNode.insertBefore( ss, ref );
			setTimeout( function(){
			ss.media = media || "all";
		} );
		return ss;
	}
		loadCSS(theme_uri + "/dest/css/style.css", window.document.getElementById( "ScriptHook" ) );
		
	function loadJS( src, before ){
		"use strict";
		var ref = before || window.document.getElementsByTagName( "script" )[ 0 ];
		var script = window.document.createElement( "script" );
		script.src = src;
		ref.parentNode.insertBefore( script, ref );
		return script;
	}
	loadJS(theme_uri + "/dest/js/bundle.js", window.document.getElementById( "ScriptHook" ) );
</script>

<noscript>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dest/css/style.css">
</noscript>