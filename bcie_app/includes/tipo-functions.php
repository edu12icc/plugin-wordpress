<?php

/**
 * Get all tipo
 *
 * @param $args array
 *
 * @return array
 */
function tipo_get_all_tipo( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'tipo-all';
    $items     = wp_cache_get( $cache_key, 'bcie' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_processtype ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'bcie' );
    }

    return $items;
}

/**
 * Fetch all tipo from database
 *
 * @return array
 */
function tipo_get_tipo_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bcie_app_processtype' );
}

/**
 * Fetch a single tipo from database
 *
 * @param int   $id
 *
 * @return array
 */
function tipo_get_tipo( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_processtype WHERE id = %d', $id ) );
}

function tipos_delete_tipo( $id ) {
    global $wpdb;
    return $wpdb->delete( 'wp_bcie_app_processtype', array( 'id' => $id ) );
  }
/**
 * Insert a new tipo
 *
 * @param array $args
 */
function tipo_insert_tipo( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'Name' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'bcie_app_processtype';

    // some basic validation
    if ( empty( $args['Name'] ) ) {
        return new WP_Error( 'no-Name', __( 'No Nombre provided.', 'bcie' ) );
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
