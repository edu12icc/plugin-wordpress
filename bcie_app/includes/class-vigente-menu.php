<?php

/**
 * Admin Menu
 */
class vigente_menu {

    /**
     * Kick-in the class
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Add menu items
     *
     * @return void
     */
    public function admin_menu() {

        /** Top Menu **/
        add_menu_page( __( 'Proceso Vigente', 'bcie' ), __( 'Proceso Vigente', 'bcie' ), 'manage_options', 'vigente', array( $this, 'plugin_page' ), 'dashicons-groups', null );

        add_submenu_page( 'vigente', __( 'Proceso Vigente', 'bcie' ), __( 'Proceso Vigente', 'bcie' ), 'manage_options', 'vigente', array( $this, 'plugin_page' ) );
    }

    /**
     * Handles the plugin page
     *
     * @return void
     */
    public function plugin_page() {
        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';
        $id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

        switch ($action) {
            case 'view':

                $template = dirname( __FILE__ ) . '/views/vigente-single.php';
                break;

            case 'edit':
                $template = dirname( __FILE__ ) . '/views/vigente-edit.php';
                break;

            case 'new':
                $template = dirname( __FILE__ ) . '/views/vigente-new.php';
                break;
            case 'delete':
                $template = dirname( __FILE__ ) . '/views/vigente-delete.php';
                break;
                case 'show':
                    $template = dirname( __FILE__ ) . '/views/show_currentprocess.php';
                    break;

            default:
                $template = dirname( __FILE__ ) . '/views/vigente-list.php';
                break;
        }

        if ( file_exists( $template ) ) {
            include $template;
        }
    }
}
