<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler_Plana {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form_plana' ) );
    }

    /**
     * Handle the plan new and edit form
     *
     * @return void
     */
    public function handle_form_plana() {
        if ( ! isset( $_POST['submit_plan'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], '' ) ) {
            die( __( 'Are you cheating?', 'bcie' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'bcie' ) );
        }

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=plan' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;
        $ProjectTitle = isset( $_POST['ProjectTitle'] ) ? sanitize_text_field( $_POST['ProjectTitle'] ) : '';
        $CountryID = isset( $_POST['CountryID'] ) ? sanitize_text_field( $_POST['CountryID'] ) : '';
        $LastUpdate = isset( $_POST['LastUpdate'] ) ? sanitize_text_field( $_POST['LastUpdate'] ) : '';
        $CurrentCreditLine = isset( $_POST['CurrentCreditLine'] ) ? intval( $_POST['CurrentCreditLine'] ) : 0;
        $ParentCreditLine = isset( $_POST['ParentCreditLine'] ) ? intval( $_POST['ParentCreditLine'] ) : 0;
        $deleteplan = isset( $_POST['deleteplan'] );

        // some basic validation
        if ( ! $ProjectTitle ) {
            $errors[] = __( 'Error: Nombre del proyecto (Escrito) is required', 'bcie' );
        }

        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            
        }

        $fields = array(
            'ProjectTitle' => $ProjectTitle,
            'CountryID' => $CountryID,
            'LastUpdate' => $LastUpdate,
            'CurrentCreditLine' => $CurrentCreditLine,
            'ParentCreditLine' => $ParentCreditLine,

        );
        // Delete
        if (  $deleteplan == 1) {
            planes_delete_plan( $field_id );
         }
        // New or edit?
        if ( ! $field_id ) {

            $insert_id = plan_insert_plan( $fields );

        } else {

            $fields['id'] = $field_id;

            $insert_id = plan_insert_plan( $fields );
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

new Form_Handler_Plana();
