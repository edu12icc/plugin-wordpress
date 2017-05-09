
<div class="wrap">
    <h2><?php _e( 'Eliminar Proceso Concluido', 'bcie' ); ?></h2>
    <?php $item = concluido_get_concluido( $id ); ?>
    <form action="" method="post" class="formulario">
	   <table class="form-table">
            <h3>¿Seguro desea eliminar el registro?</h3>
            <tbody>
                <tr class="row-ProcessTitle">
                    <th scope="row">
                        <label for="ProcessTitle"><?php _e( 'Nombre del proyecto (Escrito)', 'bcie' ); ?></label>
                    </th>
                    <td>
                      <?php
                        echo $item->ProcessTitle;
                       ?>
                    </td>
                </tr>
              </tbody>
        </table>
    <input type="hidden" name="deleteconcluido" value="1">
		<input type="hidden" name="field_id" value="<?php echo $item->id; ?>">
        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Eliminar', 'bcie' ), 'primary', 'submit_concluido' );?>
    </form>
</div>
<?php
