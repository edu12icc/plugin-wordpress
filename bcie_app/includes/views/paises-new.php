<div class="wrap">
    <h2><?php _e( 'Agregar Pais', 'bcie' ); ?></h2>

    <form action="" method="post" class="formulario">

        <table class="form-table">
            <tbody>
              <tr class="row-isBCIEMember">
                  <th scope="row">
                      <label for="isBCIEMember"><?php _e( 'Miembro BCIE?', 'bcie' ); ?></label>
                  </th>
                  <td>
                      <input type="text" name="isBCIEMember" id="isBCIEMember" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="">
                  </td>
              </tr>
                <tr class="row-Name">
                    <th scope="row">
                        <label for="Name"><?php _e( 'Nombre del Pais', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Name" id="Name" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-Denonym">
                    <th scope="row">
                        <label for="Denonym"><?php _e( 'Referencia', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Denonym" id="Denonym" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="" />
                    </td>
                </tr>

             </tbody>
        </table>

        <input type="hidden" name="field_id" value="0">

        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Agregar', 'bcie' ), 'primary', 'Actualizar' ); ?>

    </form>
</div>
