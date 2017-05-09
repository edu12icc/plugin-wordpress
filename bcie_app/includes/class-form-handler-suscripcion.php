<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler_Suscripcion {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form_suscripcion' ) );
    }

    /**
     * Handle the suscripcion new and edit form
     *
     * @return void
     */
    public function handle_form_suscripcion() {
        if ( ! isset( $_POST['submit_suscripcion'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], '' ) ) {
            die( __( 'Are you cheating?', 'bcie' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'bcie' ) );
        }

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=suscripcion' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;
        $FirstName = isset( $_POST['FirstName'] ) ? sanitize_text_field( $_POST['FirstName'] ) : '';
        $Surname	 = isset( $_POST['Surname	'] ) ? sanitize_text_field( $_POST['Surname	'] ) : '';
        $Email = isset( $_POST['Email'] ) ? sanitize_text_field( $_POST['Email'] ) : '';
        $CountryID = isset( $_POST['CountryID'] ) ? sanitize_text_field( $_POST['CountryID'] ) : '';
        $Company = isset( $_POST['Company'] ) ? sanitize_text_field( $_POST['Company'] ) : '';
        $ParticipationOpportunities = isset( $_POST['ParticipationOpportunities'] ) ? sanitize_text_field( $_POST['ParticipationOpportunities'] ) : '0';
        $ProcurementPlans = isset( $_POST['ProcurementPlans'] ) ? sanitize_text_field( $_POST['ProcurementPlans'] ) : '0';
        $OtherInfo = isset( $_POST['OtherInfo'] ) ? sanitize_text_field( $_POST['OtherInfo'] ) : '';
        $deletesuscripcion = isset( $_POST['deletesuscripcion'] ) ? sanitize_text_field( $_POST['deletesuscripcion'] ) : '0';

        // some basic validation
        if ( ! $FirstName ) {
            $errors[] = __( 'Error:  is required', 'bcie' );
        }

        if ( ! $Surname	 ) {
            $errors[] = __( 'Error:  is required', 'bcie' );
        }



        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            wp_safe_redirect( $redirect_to );
            exit;
        }

        $fields = array(
            'FirstName' => $FirstName,
            'Surname	' => $Surname	,
            'Email' => $Email,
            'CountryID' => $CountryID,
            'Company'=> $Company,
            'ParticipationOpportunities' => $ParticipationOpportunities,
            'ProcurementPlans' => $ProcurementPlans,
            'OtherInfo' => $OtherInfo,
        );

        //Delete
        if ( $deletesuscripcion == 1) {
            suscripcion_delete_suscripcion( $field_id );

         }

        // New or edit?
        if ( ! $field_id ) {

            $insert_id = suscripcion_insert_suscripcion( $fields );

        } else {

            $fields['id'] = $field_id;

            $insert_id = suscripcion_insert_suscripcion( $fields );
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

new Form_Handler_Suscripcion();
