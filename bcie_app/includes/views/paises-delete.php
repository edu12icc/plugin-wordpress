
<div class="wrap">
    <h2><?php _e( 'Eliminar Pais', 'bcie' ); ?></h2>
    <?php $item = paises_get_pais( $id ); ?>
    <form action="" method="post" class="formulario">
	   <table class="form-table">
            <h3>¿Seguro desea eliminar el registro?</h3>
            <tbody>
                <tr class="row-Name">
                    <th scope="row">
                        <label for="Name"><?php _e( 'Nombre del Pais', 'bcie' ); ?></label>
                    </th>
                    <td>
                      <?php
                        echo $item->Name;

                       ?>
                    </td>
                </tr>
              </tbody>
        </table>
		<input type="hidden" name="delete" value="1">
    <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">
        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Eliminar', 'bcie' ), 'primary', 'Actualizar' );?>
    </form>
</div>
<?php
