<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once DH_POPUP_DIR.'/includes/editor-navbar.php';
/** @var $post WP_Post */
$nav_bar = new DH_Popup_Editor_Navbar( $post );
$nav_bar->render();
/** @var $editor Vc_Backend_Editor */

global $wp_version;
$is_gutenberg = version_compare( $wp_version, '4.9.8', '>' ) && ! get_option( 'wpb_js_gutenberg_disable' );
if ( $is_gutenberg ) {
    $is_gutenberg = get_post_type_object( get_post_type() )->show_in_rest;
}
$content_id = version_compare(WPB_VC_VERSION, '6.8.0','<') ? 'visual_composer_content' : 'wpbakery_content';
?>
	<style>
		#vc_templates-more-layouts,
		#wpb_visual_composer {
			display: none;
		}
	</style>
	<script type="text/javascript">
		window.vc_all_presets = [];
		window.vc_post_id = <?php echo get_the_ID(); ?>;
		window.wpbGutenbergEditorUrl = '<?php echo esc_js( set_url_scheme( admin_url( 'post-new.php?post_type=wpb_gutenberg_param' ) ) ); ?>';
		window.wpbGutenbergEditorSWitchUrl = '<?php echo esc_js( set_url_scheme( admin_url( 'post.php?post=' . get_the_ID() . '&action=edit&vcv-gutenberg-editor' ) ) ); ?>';
		window.wpbGutenbergEditorClassicSWitchUrl = '<?php echo esc_js( set_url_scheme( admin_url( 'post.php?post=' . get_the_ID() . '&action=edit&classic-editor' ) ) ); ?>';
		window.wpbIsGutenberg = <?php echo $is_gutenberg ? 'true' : 'false'; ?>;
	</script>
	<div class="metabox-composer-content">
		<div id="<?php echo esc_attr($content_id)?>" class="wpb_main_sortable main_wrapper"></div>
		<?php require vc_path_dir( 'TEMPLATES_DIR', 'editors/partials/vc_welcome_block.tpl.php' ); ?>
	</div>
<?php

$wpb_vc_status = apply_filters( 'wpb_vc_js_status_filter', vc_get_param( 'wpb_vc_js_status', get_post_meta( $post->ID, '_wpb_vc_js_status', true ) ) );

if ( '' === $wpb_vc_status || ! isset( $wpb_vc_status ) ) {
	$wpb_vc_status = vc_user_access()
		->part( 'backend_editor' )
		->checkState( 'default' )
		->get() ? 'true' : 'false';
}

?>

	<input type="hidden" id="wpb_vc_js_status" name="wpb_vc_js_status" value="<?php echo esc_attr( $wpb_vc_status ); ?>"/>
	<input type="hidden" id="wpb_vc_loading" name="wpb_vc_loading"
	       value="<?php esc_attr_e( 'Loading, please wait...', 'dh_popup' ) ?>"/>
	<input type="hidden" id="wpb_vc_loading_row" name="wpb_vc_loading_row"
	       value="<?php esc_attr_e( 'Crunching...', 'dh_popup' ) ?>"/>
	<input type="hidden" name="vc_post_custom_css" id="vc_post-custom-css"
	       value="<?php echo esc_attr( $editor->post_custom_css ); ?>" autocomplete="off"/>

<?php vc_include_template( 'editors/partials/access-manager-js.tpl.php' );
