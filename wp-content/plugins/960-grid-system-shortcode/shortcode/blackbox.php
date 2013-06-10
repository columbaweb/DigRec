<?php
$wpconfig = realpath("../../../../wp-load.php");
if (!file_exists($wpconfig))  {
	echo "Could not found wp-config.php. Error in path :\n\n".$wpconfig ;	
	die;	
}
require_once($wpconfig);
global $wpdb;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php _e("960 Grid System Shortcodes", '960-grid-system-shortcode'); ?></title>
<!-- <meta http-equiv="Content-Type" content="<?php// bloginfo('html_type'); ?>; charset=<?php //echo get_option('blog_charset'); ?>" /> -->
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<?php
		wp_admin_css( 'wp-admin', true );
	?>
	<link rel="stylesheet" id="shortcode-style"  href="<?php echo GRID_SYSTEM_SHORTCODES_URL . 'css/shortcode.css'; ?>" type="text/css" media="all" />
	<script language="javascript" type="text/javascript" src="<?php echo GRID_SYSTEM_SHORTCODES_URL . 'shortcode/function.js'; ?>"></script>
	<base target="_self" />
	<style type="text/css">
		body {
			min-width: 0;
		}	
		#wphead, #tabs {
			padding-left: auto;
			padding-right: 15px;
		}
		#tabs {
			margin-bottom: 0;
		}		
		#flipper {
			margin: 0;
		}
		.keys .left, .top, .action { text-align: right; }
		.keys .right { text-align: left; }
		td b { font-family: Tahoma, "Times New Roman", Times, serif }
	</style>
</head>
	<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->

	<ul id="tabs">
		<li><a id="tab1" href="javascript:flipTab(1)" title="<?php _e('General', '960-grid-system-shortcode') ?>" accesskey="1" tabindex="1" class="current"><?php _e('General', '960-grid-system-shortcode') ?></a></li>
		<li><a id="tab2" href="javascript:flipTab(2)" title="<?php _e('Documentation', '960-grid-system-shortcode') ?>" accesskey="2" tabindex="2"><?php _e('Documentation', '960-grid-system-shortcode') ?></a></li>
	</ul>
	
	<div id="flipper" class="wrap">
		<div id="content1">
			<div class="columns-1">
				<p>
					<label for="960_grid"><?php _e("Grid", '960-grid-system-shortcode'); ?></label>
					<select id="960_grid" name="grid_select">
						<option value="clear">clear</option>
						<?php 
							for ( $i = 1; ; $i++ ) {
								if ( $i > 24 )
									break;
								echo '<option value="grid_' . $i . '">grid_' . $i . '</option>';
							}
						?>
					</select>
				</p>
				<p>
					<label for="grid_prefix"><?php _e("Prefix", '960-grid-system-shortcode'); ?></label>
					<select id="grid_prefix" name="select_pull_grid">	
						<option value=""></option>
						<?php 
							for ( $i = 1; ; $i++ ) {
								if ( $i > 24 )
									break;
								echo '<option value=" prefix_' . $i . '">prefix_' . $i . '</option>';
							}
						?>
					</select>
				</p>

				<p>
					<label for="grid_suffix"><?php _e("Suffix", '960-grid-system-shortcode'); ?></label>
					<select id="grid_suffix" name="select_pull_grid">	
						<option value=""></option>
						<?php 
							for ( $i = 1; ; $i++ ) {
								if ( $i > 24 )
									break;
								echo '<option value=" suffix_' . $i . '">suffix_' . $i . '</option>';
							}
						?>
					</select>
				</p>

				<p>
					<label for="grid_push"><?php _e("Push", '960-grid-system-shortcode'); ?></label>
					<select id="grid_push" name="select_push_grid">
						<option value=""></option>
						<?php 
							for ( $i = 1; ; $i++ ) {
								if ( $i > 24 )
									break;
								echo '<option value=" push_' . $i . '">push_' . $i . '</option>';
							}
						?>
					</select>
				</p>

				<p>
					<label for="grid_pull"><?php _e("Pull", '960-grid-system-shortcode'); ?></label>
					<select id="grid_pull" name="select_pull_grid">	
						<option value=""></option>
						<?php 
							for ( $i = 1; ; $i++ ) {
								if ( $i > 24 )
									break;
								echo '<option value=" pull_' . $i . '">pull_' . $i . '</option>';
							}
						?>
					</select>
				</p>

				<p>
					 <label style="margin-right: 20px;"><input name="chk_grid_alpha" id="grid_alpha" type="checkbox" /><?php _e("alpha", '960-grid-system-shortcode'); ?></label>
					 <label><input name="chk_grid_omega" id="grid_omega" type="checkbox" /><?php _e("omega", '960-grid-system-shortcode'); ?></label>
				</p>
				
			</div>
			
			<div class="clear"></div><!-- clearing the hole -->
			
			<div class="mceActionPanel" style="overflow: hidden; margin-top: 20px;">
				<div style="float: left">
					<input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", '960-grid-system-shortcode'); ?>" onclick="tinyMCEPopup.close();" />
				</div>
				<div style="float: right">
					<button onclick="insertGRIDcode();" value="<?php _e("Insert", '960-grid-system-shortcode'); ?>" class="button" type="button"><?php _e("Insert", '960-grid-system-shortcode'); ?></button>
				</div>
			</div>
		</div>


		<div id="content2" class="hidden">

			<h2><?php _e('960 Grid System', '960-grid-system-shortcode'); ?></h2>

			<h3><?php _e('Clear', '960-grid-system-shortcode'); ?></h3>
			<p><?php _e('This shortcode will give you a line break for makin a new grid', '960-grid-system-shortcode') ?></p>

			<h3><?php _e('Prefix', '960-grid-system-shortcode'); ?></h3>
			<p><?php _e('This shortcode will crete a space before current grid.', '960-grid-system-shortcode') ?></p>

			<h3><?php _e('Suffix', '960-grid-system-shortcode'); ?></h3>
			<p><?php _e('This shortcode will crete a space after current grid.', '960-grid-system-shortcode') ?></p>

			<h3><?php _e('Push', '960-grid-system-shortcode'); ?></h3>
			<p><?php _e('This shortcode will push another grid.', '960-grid-system-shortcode') ?></p>

			<h3><?php _e('Pull', '960-grid-system-shortcode'); ?></h3>
			<p><?php _e('This shortcode will pull another grid.', '960-grid-system-shortcode') ?></p>
			
			<h3><?php _e('Detailed Documentation', '960-grid-system-shortcode'); ?></h3>
			<p><?php _e('960 Grid System ~ Core CSS. Learn more <a href="http://960.gs/">http://960.gs/</a>', '960-grid-system-shortcode') ?></p>

			<div class="mceActionPanel" style="overflow: hidden; margin-top: 20px;">
				<div style="float: left">
					<input type="button" id="cancel" name="cancel" value="<?php _e("Close", '960-grid-system-shortcode'); ?>" onclick="tinyMCEPopup.close();" />
				</div>
			</div>
		</div>
	</div>
</body>
</html>