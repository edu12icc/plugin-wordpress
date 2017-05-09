<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form' ) );
        }

    /**
     * Handle the pais new and edit form
     *
     * @return void
     */
    public function handle_form() {

        if ( ! isset( $_POST['Actualizar']) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], '' ) ) {
          die( __( 'Are you cheating?', 'bcie' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'bcie' ) );
        }

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=paises' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;
        $Name = isset( $_POST['Name'] ) ? sanitize_text_field( $_POST['Name'] ) : '';
        $Denonym = isset( $_POST['Denonym'] ) ? sanitize_text_field( $_POST['Denonym'] ) : '';
        $isBCIEMember = isset( $_POST['isBCIEMember'] ) ? intval( $_POST['isBCIEMember'] ) : 0;
        $delete = isset( $_POST['delete'] );

        // some basic validation
        if ( ! $Name ) {
            $errors[] = __( 'Error: Nombre del Pais is required', 'bcie' );
        }

        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            
        }

        $fields = array(
            'Name' => $Name,
            'Denonym' => $Denonym,
            'isBCIEMember' => $isBCIEMember,

        );
        //Delete
        if ($delete == 1) {
            paises_delete_pais( $field_id );
        }
        // New or edit?
        if ( ! $field_id ) {

            $insert_id = _insert_pais( $fields );

        } else  {
          $fields['id'] = $field_id;

          $insert_id = _insert_pais( $fields );
        }

        if ( is_wp_error( $insert_id ) ) {
            $redirect_to = add_query_arg( array( 'message' => 'error' ), $page_url );
        } else {
           $redirect_to = add_query_arg( array( 'message' => 'success' ), $page_url );

        }
        wp_safe_redirect( $redirect_to );

        exit;
    }
}

new Form_Handler();
