<div class="wrap">
    <h1><?php _e( 'Agregar Tipo de Proceso', 'bcie' ); ?></h1>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-Name">
                    <th scope="row">
                        <label for="Name"><?php _e( 'Nombre', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Name" id="Name" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="" required="required" />
                    </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="0">

        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Agregar', 'bcie' ), 'primary', 'submit_tipoproceso' ); ?>

    </form>
</div>
