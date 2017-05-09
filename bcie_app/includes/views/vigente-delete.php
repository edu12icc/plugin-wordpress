
<div class="wrap">
    <h2><?php _e( 'Eliminar Proceso Vigente', 'bcie' ); ?></h2>
    <?php $item = _get_vigente( $id ); ?>
    <form action="" method="post" class="formulario">
	   <table class="form-table">
            <h3>¿Seguro desea eliminar el registro?</h3>
            <tbody>
                <tr class="row-ProjectTitle">
                    <th scope="row">
                        <label for="ProjectTitle"><?php _e( 'Nombre del proyecto (Escrito)', 'bcie' ); ?></label>
                    </th>
                    <td>
                      <?php
                        echo $item->ProjectTitle;
                       ?>
                    </td>
                </tr>
              </tbody>
        </table>
        <input type="hidden" name="deletevigente" value="1">
		<input type="hidden" name="field_id" value="<?php echo $item->id; ?>">
        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Eliminar', 'bcie' ), 'primary', 'submit_vigente' );?>
    </form>
</div>
<?php
