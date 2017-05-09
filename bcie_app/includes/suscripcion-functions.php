<?php

/**
 * Get all suscripcion
 *
 * @param $args array
 *
 * @return array
 */
function suscripcion_get_all_suscripcion( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'suscripcion-all';
    $items     = wp_cache_get( $cache_key, 'bcie' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_subscription ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'bcie' );
    }

    return $items;
}

/**
 * Fetch all suscripcion from database
 *
 * @return array
 */
function suscripcion_get_suscripcion_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'bcie_app_subscription' );
}




/**
 * Fetch a single suscripcion from database
 *
 * @param int   $id
 *
 * @return array
 */
function suscrpcion_get_suscripcion( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'bcie_app_subscription WHERE id = %d', $id ) );
}

/**
 * Insert a new suscripcion
 *
 * @param array $args
 */
function suscripcion_insert_suscripcion( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'FirstName' => '',
        'Surname	' => '',
        'Email' => '',
        'CountryID' => '',
        'ParticipationOpportunities' => '',
        'ProcurementPlans' => '',
        'OtherInfo' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'bcie_app_subscription';

    // some basic validation
    if ( empty( $args['FirstName'] ) ) {
        return new WP_Error( 'no-FirstName', __( 'No  provided.', 'bcie' ) );
    }
    if ( empty( $args['Surname	'] ) ) {
        return new WP_Error( 'no-Surname	', __( 'No  provided.', 'bcie' ) );
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
