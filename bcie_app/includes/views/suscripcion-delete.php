
<div class="wrap">
    <h2><?php _e( 'Eliminar Suscripción', 'bcie' ); ?></h2>
      <?php $item = suscrpcion_get_suscripcion( $id ); ?>
    <form action="" method="post" class="formulario">
	   <table class="form-table">
            <h3>¿Seguro desea eliminar el registro?</h3>
            <tbody>
                <tr class="row-FirstName">
                    <th scope="row">
                        <label for="FirstName"><?php _e( 'Usuario:', 'bcie' ); ?></label>
                    </th>
                    <td>
                      <?php
                        echo $item->FirstName." ";
                       ?>
                       <?php
                         echo $item->Surname." ";
                        ?>
                        <?php
                          echo $item->Email;
                         ?>

                    </td>
                </tr>
              </tbody>
        </table>
    <input type="hidden" name="deletesuscripcion" value="1">
		<input type="hidden" name="field_id" value="<?php echo $item->id; ?>">
        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Eliminar', 'bcie' ), 'primary', 'submit_suscripcion' );?>
    </form>
</div>
<?php
