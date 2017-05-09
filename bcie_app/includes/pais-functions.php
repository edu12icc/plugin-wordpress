<?php

/**
 * Get all pais
 *
 * @param $args array
 *
 * @return array
 */
function paises_get_all_pais( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'pais-all';
    $items     = wp_cache_get( $cache_key, 'bcie' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT id, Name FROM ' . $wpdb->prefix . 'bcie_app_country ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'bcie' );
    }

    return $items;
}

/**
 * Fetch all pais from database
 *
 * @return array
 */
function paises_get_pais_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bcie_app_country' );
}

/**
 * Fetch a single pais from database
 *
 * @param int   $id
 *
 * @return array
 */
function paises_get_pais( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_country WHERE id = %d', $id ) );
}

function paises_delete_pais( $id ) {
    global $wpdb;
    return $wpdb->delete( 'wp_bcie_app_country', array( 'id' => $id ) );

  }

/**
 * Insert a new pais
 *
 * @param array $args
 */
function _insert_pais( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'Name' => '',
        'Denonym' => '',
        'isBCIEMember' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'bcie_app_country';

    // some basic validation
    if ( empty( $args['Name'] ) ) {
        return new WP_Error( 'no-Name', __( 'No Nombre del Pais provided.', 'bcie' ) );
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
