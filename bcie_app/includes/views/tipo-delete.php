
<div class="wrap">
    <h2><?php _e( 'Eliminar Tipo Proceso', 'bcie' ); ?></h2>
    <?php $item = tipo_get_tipo( $id ); ?>
    <form action="" method="post" class="formulario">
	   <table class="form-table">
            <h3>¿Seguro desea eliminar el registro?</h3>
            <tbody>
                <tr class="row-ProcessTitle">
                    <th scope="row-ProcessTitle">
                        <label for="ProcessTitle"><?php _e( 'Nombre', 'bcie' ); ?></label>
                    </th>
                    <td>
                      <?php
                        echo $item->Name;
                       ?>
                    </td>
                </tr>
              </tbody>
        </table>
    <input type="hidden" name="deleteproceso" value="1">
		<input type="hidden" name="field_id" value="<?php echo $item->id; ?>">
        <?php wp_nonce_field( '' );?>
        <?php submit_button( __( 'Eliminar', 'bcie' ), 'primary', 'submit_tipoproceso' );?>
    </form>
</div>
<?php
