<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler_Concluido {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form_concluido' ) );
    }

    /**
     * Handle the concluido new and edit form
     *
     * @return void
     */
    public function handle_form_concluido() {

        if ( ! isset( $_POST['submit_concluido'] ) ) {
           return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], '' ) ) {
          die( __( 'Are you cheating?', 'bcie' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'bcie' ) );
        }

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=concluido' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;
        $OffererID = isset( $_POST['OffererID'] ) ? intval( $_POST['OffererID'] ) : 0;
        $ProcessTitle = isset( $_POST['ProcessTitle'] ) ? sanitize_text_field( $_POST['ProcessTitle'] ) : '';
        $ProcessNumber = isset( $_POST['ProcessNumber'] ) ? sanitize_text_field( $_POST['ProcessNumber'] ) : '';
        $TenderID = isset( $_POST['TenderID'] ) ? intval( $_POST['TenderID'] ) : 0;
        $CountryID = isset( $_POST['CountryID'] ) ? intval( $_POST['CountryID'] ) : 0;
        $Executor = isset( $_POST['Executor'] ) ? sanitize_text_field( $_POST['Executor'] ) : '';
        $ProcessResult = isset( $_POST['ProcessResult'] ) ? intval( $_POST['ProcessResult'] ) : 0;
        $LineName = isset( $_POST['LineName'] ) ? sanitize_text_field( $_POST['LineName'] ) : '';
        $CurrentCreditLine = isset( $_POST['CurrentCreditLine'] ) ? intval( $_POST['CurrentCreditLine'] ) : 0;
        $ParentCreditLine = isset( $_POST['ParentCreditLine'] ) ? intval( $_POST['ParentCreditLine'] ) : 0;
        $OffererName = isset( $_POST['OffererName'] ) ? sanitize_text_field( $_POST['OffererName'] ) : '';
        $OffererNationalityID = isset( $_POST['OffererNationalityID'] ) ? intval( $_POST['OffererNationalityID'] ) : 0;
        $RequestNumber = isset( $_POST['RequestNumber'] ) ? sanitize_text_field( $_POST['RequestNumber'] ) : '';
        $AmountAwarded =isset( $_POST['AmountAwarded'] ) ? intval( $_POST['AmountAwarded'] ) : '';
        $DateAdjudication = isset( $_POST['DateAdjudication'] ) ? sanitize_text_field( $_POST['DateAdjudication'] ) : '';
        $deleteconcluido = isset( $_POST['deleteconcluido'] );
        // some basic validation
        #if ( ! $ProcessTitle ) {
        #    $errors[] = __( 'Error: Nombre is required', 'bcie' );
        #}

        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            wp_safe_redirect( $redirect_to );
            exit;
        }

        $fields = array(
            'OffererID' => $OffererID,
            'ProcessTitle' => $ProcessTitle,
            'ProcessNumber' => $ProcessNumber,
            'TenderID' => $TenderID,
            'CountryID'=> $CountryID,
            'Executor' => $Executor,
            'ProcessResult' => $ProcessResult,
            'LineName' => $LineName,
            'CurrentCreditLine'=> $CurrentCreditLine,
            'ParentCreditLine' => $ParentCreditLine,
            'OffererName' => $OffererName,
            'OffererNationalityID' => $OffererNationalityID,
            'RequestNumber' => $RequestNumber,
            'AmountAwarded' => $AmountAwarded,
            'DateAdjudication' => $DateAdjudication,

        );
         // deleteconcluido
         if ($deleteconcluido == 1) {
            concluido_delete_concluido( $field_id );
         }
        // New or edit?
        if ( ! $field_id ) {

            $insert_id = conluido_insert_concluido( $fields );

        } else {
            $fields['id'] = $field_id;

            $insert_id = conluido_insert_concluido( $fields );
        }

        if ( is_wp_error( $insert_id ) ) {
            $redirect_to = add_query_arg( array( 'message' => 'error' ), $page_url );
        } else {
            $redirect_to = add_query_arg( array( 'message' => 'success' ), $page_url );
        }

        wp_safe_redirect(  $page_url );
        exit;
    }
}

new Form_Handler_Concluido();
