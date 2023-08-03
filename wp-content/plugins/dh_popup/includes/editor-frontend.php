<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once vc_path_dir( 'EDITORS_DIR', 'class-vc-frontend-editor.php' );

class DH_Popup_Editor_Frontend extends Vc_Frontend_Editor{
	
	public function init(){
		$this->addHooks();
		
		if(isset($_GET['dh_popup_editor']) && 'frontend' === $_GET['dh_popup_editor']){
		    
		    remove_all_actions('admin_notices');
			remove_all_actions('network_admin_notices');
			
			if ( ! defined( 'DH_POPUP_IS_FRONTEND_EDITOR' ) ) {
				define( 'DH_POPUP_IS_FRONTEND_EDITOR', true );
			}
			
			$this->hookLoadEdit();
		}
	}
	
	/**
	 * 
	 * @param string $url
	 * @param string $id
	 * @return mixed
	 */
	public static function getInlineUrl( $url = '', $id = '' ) {
		$the_ID = ( strlen( $id ) > 0 ? $id : get_the_ID() );
		
		return apply_filters( 'dh_popup_editor_frontend_url', admin_url() . 'post.php?dh_popup_editor=frontend&vc_action=vc_inline&post_id=' . $the_ID . '&post_type=' . get_post_type( $the_ID ) . ( strlen( $url ) > 0 ? '&url=' . rawurlencode( $url ) : '' ) );
		
	}
	
	/**
	 * @return bool
	 * @throws \Exception
	 */
	public static function frontendEditorEnabled() {
	    return true;
	}
	
	/**
	 *
	 */
	public function hookLoadEdit() {
		add_action( 'current_screen', array(
			$this,
			'adminInit',
		) );
		do_action( 'vc_frontend_editor_hook_load_edit' );
		add_action( 'admin_head', array(
			$this,
			'disableBlockEditor',
		) );
	}

	public function disableBlockEditor() {
		global $current_screen;
		$current_screen->is_block_editor( false );
	}

	/**
	 *
	 */
	public function adminInit() {
	    if ( DH_Popup_Editor_Frontend::frontendEditorEnabled() ) {
			$this->setPost();
			$this->renderEditor();
		}
	}
	
	/**
	 * @return bool
	 */
	public static function inlineEnabled() {
	    return true;
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 */
	function render( $template ) {
	    if('editor'===$template){
			dh_popup_include_editor_template('editor_frontend.tpl.php',array( 'editor' => $this ));
	    }else{
			vc_include_template( 'editors/frontend_' . $template . '.tpl.php', array( 'editor' => $this ) );
	    }
	}
	
	function enqueueAdmin(){
		parent::enqueueAdmin();
		wp_register_script( 'dh_popup_editor_frontend', DH_POPUP_URL.'/assets/js/popup_frontend_builder.js', null, DH_POPUP_VERSION, true );
		wp_localize_script( 'dh_popup_editor_frontend', 'dh_popup_editor_frontend', array(
			'preview' => __( 'Preview', 'dh_popup' ),
			'builder' => __( 'Builder', 'dh_popup' ),
			'add_template_message' => __( 'If you add this template, all your current changes will be removed. Are you sure you want to add template?', 'dh_popup' ),
		) );
		wp_enqueue_script( 'dh_popup_editor_frontend' );
	}
}