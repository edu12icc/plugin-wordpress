
<div class="wrap">
    <h2><?php _e( 'Modificar Pais', 'bcie' ); ?></h2>
    <?php $item = paises_get_pais( $id ); ?>
    <form action="" method="post" class="formulario">


	   <table class="form-table">
            <tbody>
              <tr class="row-isBCIEMember">
                  <th scope="row">
                      <label for="isBCIEMember"><?php _e( 'Miembro BCIE?', 'bcie' ); ?></label>
                  </th>
                  <td>
                      <input type="number" name="isBCIEMember" id="isBCIEMember" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->isBCIEMember ); ?>" />
                  </td>
              </tr>
                <tr class="row-Name">
                    <th scope="row">
                        <label for="Name"><?php _e( 'Nombre del Pais', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Name" id="Name" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Name ); ?>" required="required" />
                    </td>
                </tr>
                <tr class="row-Denonym">
                    <th scope="row">
                        <label for="Denonym"><?php _e( 'Referencia', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Denonym" id="Denonym" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Denonym ); ?>" />
                    </td>
                </tr>

             </tbody>
        </table>
		 <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">
        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Modificar', 'bcie' ), 'primary', 'Actualizar' ); ?>

    </form>
</div>
