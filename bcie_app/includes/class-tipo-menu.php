<?php

/**
 * Admin Menu
 */
class tipo_menu {

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
        add_menu_page( __( 'Tipo Proceso', 'bcie' ), __( 'Tipo Proceso', 'bcie' ), 'manage_options', 'tipo', array( $this, 'plugin_page' ) );

        add_submenu_page( 'tipo', __( 'Tipo Proceso', 'bcie' ), __( 'Tipo Proceso', 'bcie' ), 'manage_options', 'tipo', array( $this, 'plugin_page' ) );
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

                $template = dirname( __FILE__ ) . '/views/tipo-single.php';
                break;

            case 'edit':
                $template = dirname( __FILE__ ) . '/views/tipo-edit.php';
                break;

            case 'new':
                $template = dirname( __FILE__ ) . '/views/tipo-new.php';
                break;

            case 'delete':
                    $template = dirname( __FILE__ ) . '/views/tipo-delete.php';
                    break;

            default:
                $template = dirname( __FILE__ ) . '/views/tipo-list.php';
                break;
        }

        if ( file_exists( $template ) ) {
            include $template;
        }
    }
}
