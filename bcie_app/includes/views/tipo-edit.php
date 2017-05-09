<div class="wrap">
      <h2><?php _e( 'Modificar Tipo de Proceso', 'bcie' ); ?></h2>

    <?php $item = tipo_get_tipo( $id ); ?>

    <form action="" method="post" class="formulario">

        <table class="form-table">
            <tbody>
                <tr class="row-Name">
                    <th scope="row">
                        <label for="Name"><?php _e( 'Nombre', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Name" id="Name" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Name ); ?>" required="required" />
                    </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">

        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Modificar', 'bcie' ), 'primary', 'submit_tipoproceso' ); ?>

    </form>
</div>
