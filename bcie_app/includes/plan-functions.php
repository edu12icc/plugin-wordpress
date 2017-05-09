<?php

/**
 * Get all plan
 *
 * @param $args array
 *
 * @return array
 */
function plan_get_all_plan( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'DESC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'plan-all';
    $items     = wp_cache_get( $cache_key, 'bcie' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_procurementplan ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'bcie' );
    }

    return $items;
}

/**
 * Fetch all plan from database
 *
 * @return array
 */
function plan_get_plan_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bcie_app_procurementplan' );
}

function planes_delete_plan( $id ) {
    global $wpdb;
    return $wpdb->delete( 'wp_bcie_app_procurementplan', array( 'id' => $id ) );
  }
/**
 * Fetch a single plan from database
 *
 * @param int   $id
 *
 * @return array
 */
function plan_get_plan( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_procurementplan WHERE id = %d', $id ) );
}

/**
 * Insert a new plan
 *
 * @param array $args
 */
function plan_insert_plan( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'ProjectTitle' => '',
        'LastUpdate' => '',
        'CurrentCreditLine' => '',
        'ParentCreditLine' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'bcie_app_procurementplan';

    // some basic validation
    if ( empty( $args['ProjectTitle'] ) ) {
        return new WP_Error( 'no-ProjectTitle', __( 'No Nombre del proyecto (Escrito) provided.', 'bcie' ) );
    }

    // remove row id to determine if new or update
    $row_id = (int) $args['id'];
    unset( $args['id'] );

    if ( ! $row_id ) {



        // insert a new
        if ( $wpdb->insert( $table_name, $args ) ) {
            return $wpdb->insert_id;
        }

    } else {

        // do update method here
        if ( $wpdb->update( $table_name, $args, array( 'id' => $row_id ) ) ) {
            return $row_id;
        }
    }

    return false;
}
