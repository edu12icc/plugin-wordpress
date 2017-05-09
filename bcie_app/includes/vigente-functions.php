<?php

/**
 * Get all vigente
 *
 * @param $args array
 *
 * @return array
 */
function _get_all_vigente( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'DESC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'vigente-all';
    $items     = wp_cache_get( $cache_key, 'bcie' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_currentprocess ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'bcie' );
    }

    return $items;
}

/**
 * Fetch all vigente from database
 *
 * @return array
 */
function _get_vigente_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bcie_app_currentprocess' );
}

/**
 * Fetch a single vigente from database
 *
 * @param int   $id
 *
 * @return array
 */
function _get_vigente( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_currentprocess WHERE id = %d', $id ) );
}

function vigente_delete_vigente( $id ) {
    global $wpdb;
    return $wpdb->delete( 'wp_bcie_app_currentprocess', array( 'id' => $id ) );
  }
/**
 * Insert a new vigente
 *
 * @param array $args
 */
function _insert_vigente( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'ProjectTitle' => '',
        'NID' => '',
        'TenderID' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'bcie_app_currentprocess';

    // some basic validation
    if ( empty( $args['ProjectTitle'] ) ) {
        return new WP_Error( 'no-ProjectTitle', __( 'No Titulo del Aviso provided.', 'bcie' ) );
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
