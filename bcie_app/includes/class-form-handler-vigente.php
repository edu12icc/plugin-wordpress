<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler_Vigente{

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form_vigente' ) );
    }

    /**
     * Handle the vigente new and edit form
     *
     * @return void
     */
    public function handle_form_vigente() {

        if ( ! isset( $_POST['submit_vigente'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], '' ) ) {
            die( __( 'Are you cheating?', 'bcie' ) );

        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'bcie' ) );
        }

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=vigente' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;
        $ProjectTitle = isset( $_POST['ProjectTitle'] ) ? sanitize_text_field( $_POST['ProjectTitle'] ) : '';
        $ProcessTypeID = isset( $_POST['ProcessTypeID'] ) ? sanitize_text_field( $_POST['ProcessTypeID'] ) : '';
        $NID = isset( $_POST['NID'] ) ? intval( $_POST['NID'] ) : 0;
        $CountryID = isset( $_POST['CountryID'] ) ? intval( $_POST['CountryID'] ) : 0;
        $TenderID = isset( $_POST['TenderID'] ) ? intval( $_POST['TenderID'] ) : 0;
		    $FocusArea = isset( $_POST['FocusArea'] ) ? sanitize_text_field( $_POST['FocusArea'] ) : '';
		    $CurrentCreditLine = isset( $_POST['CurrentCreditLine'] ) ? sanitize_text_field( $_POST['CurrentCreditLine'] ) : '';
		    $ParentCreditLine = isset( $_POST['ParentCreditLine'] ) ? sanitize_text_field( $_POST['ParentCreditLine'] ) : '';
		    $ReceptionDate = isset( $_POST['ReceptionDate'] ) ? sanitize_text_field( $_POST['ReceptionDate'] ) : '';
		    $Scope = isset( $_POST['Scope'] ) ? sanitize_text_field( $_POST['Scope'] ) : '';
		    $Mount = isset( $_POST['Mount'] ) ? sanitize_text_field( $_POST['Mount'] ) : '';
		    $Priority= isset( $_POST['Priority'] ) ? intval( $_POST['Priority'] ) : 0;
		    $Category= isset( $_POST['Category'] ) ? intval( $_POST['Category'] ) : 0;
		    $ModalityDescription= isset( $_POST['ModalityDescription'] ) ? sanitize_text_field( $_POST['ModalityDescription'] ) : '';
		    $Website= isset( $_POST['Website'] ) ? sanitize_text_field( $_POST['Website'] ) : '';
		    $DocumentationPlace = isset( $_POST['DocumentationPlace'] ) ? sanitize_text_field( $_POST['DocumentationPlace'] ) : '';
		    $EndDateSale = isset( $_POST['EndDateSale'] ) ? sanitize_text_field( $_POST['EndDateSale'] ) : '';
		    $StartDateSale = isset( $_POST['StartDateSale'] ) ? sanitize_text_field( $_POST['StartDateSale'] ) : '';
		    $Address= isset( $_POST['Address'] ) ? sanitize_text_field( $_POST['Address'] ) : '';
		    $DateAdjudication= isset( $_POST['DateAdjudication'] ) ? sanitize_text_field( $_POST['DateAdjudication'] ) : '';
        $ProcessTitle= isset( $_POST['ProcessTitle'] ) ? sanitize_text_field( $_POST['ProcessTitle'] ) : '';
		    $ProcessNumber= isset( $_POST['ProcessNumber'] ) ? sanitize_text_field( $_POST['ProcessNumber'] ) : '';
		    $Project= isset( $_POST['Project'] ) ? sanitize_text_field( $_POST['Project'] ) : '';
        $TenderID=isset( $_POST['TenderID'] ) ? intval( $_POST['TenderID'] ) : 0;
	    	$Executor= isset( $_POST['Executor'] ) ? sanitize_text_field( $_POST['Executor'] ) : '';
	    	$Name= isset( $_POST['Name'] ) ? sanitize_text_field( $_POST['Name'] ) : '';
	    	$Object= isset( $_POST['Object'] ) ? sanitize_text_field( $_POST['Object'] ) : '';
        $deletevigente = isset( $_POST['deletevigente'] );
        // some basic validation
        if ( ! $ProjectTitle ) {
            $errors[] = __( 'Error: Titulo del Aviso is required', 'bcie' );
        }

        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            
        }

        $fields = array(
            'ProjectTitle' => $ProjectTitle,
            'ProcessTypeID' => $ProcessTypeID,
            'NID' => $NID,
            'ProcessTypeID' => $ProcessTypeID,
            'CountryID' => $CountryID,
			      'FocusArea' => $FocusArea,
			      'CurrentCreditLine'=>$CurrentCreditLine,
			      'ParentCreditLine'=>$ParentCreditLine,
			      'ReceptionDate'=>$ReceptionDate,
			      'Scope'=>$Scope,
			      'Mount'=>$Mount,
			      'Priority'=>$Priority,
			      'Category'=>$Category,
			      'ModalityDescription'=>$ModalityDescription,
			      'Website'=>$Website,
			      'DocumentationPlace'=>$DocumentationPlace,
			      'EndDateSale'=>$EndDateSale,
			      'StartDateSale'=>$StartDateSale,
			      'Address'=>$Address,
			      'DateAdjudication'=>$DateAdjudication,
			      'ProcessTitle'=>$ProcessTitle,
			      'ProcessNumber'=>$ProcessNumber,
			      'Project'=>$Project,
            'TenderID' =>$TenderID,
			      'Executor'=>$Executor,
			      'Name'=>$Name,
			      'Object'=>$Object,
        );
        //Delete
        if ( $deletevigente == 1) {
            vigente_delete_vigente( $field_id );

         }
        // New or edit?
        if ( ! $field_id ) {

            $insert_id = _insert_vigente( $fields );

        } else {

            $fields['id'] = $field_id;

            $insert_id = _insert_vigente( $fields );
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

new Form_Handler_Vigente();
