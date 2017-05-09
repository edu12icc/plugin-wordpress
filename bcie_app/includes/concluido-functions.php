<?php

/**
 * Get all concluido
 *
 * @param $args array
 *
 * @return array
 */
function concluido_get_all_concluido( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'concluido-all';
    $items     = wp_cache_get( $cache_key, 'bcie' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_finishedprocess ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'bcie' );
    }

    return $items;
}

/**
 * Fetch all concluido from database
 *
 * @return array
 */
function concluido_get_concluido_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bcie_app_finishedprocess' );
}

/**
 * Fetch a single concluido from database
 *
 * @param int   $id
 *
 * @return array
 */
function concluido_get_concluido( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_finishedprocess WHERE id = %d', $id ) );
}

function concluido_delete_concluido( $id ) {
    global $wpdb;
    return $wpdb->delete( 'wp_bcie_app_finishedprocess', array( 'id' => $id ) );
  }


/**
 * Insert a new concluido
 *
 * @param array $args
 */
function conluido_insert_concluido( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'ProcessTitle' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'bcie_app_finishedprocess';

    // some basic validation
    if ( empty( $args['ProcessTitle'] ) ) {
        return new WP_Error( 'no-ProcessTitle', __( 'No Nombre provided.', 'bcie' ) );
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
