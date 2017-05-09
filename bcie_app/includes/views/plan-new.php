<div class="wrap">
    <h1><?php _e( 'Agregar Plan Adquisición', 'bcie' ); ?></h1>

    <form action="" method="post" class="formulario">

        <table class="form-table">
            <tbody>
                <tr class="row-ProjectTitle">
                    <th scope="row">
                        <label for="ProjectTitle"><?php _e( 'Nombre del proyecto (Escrito)', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="ProjectTitle" id="ProjectTitle" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->ProjectTitle ); ?>" required="required" />
                    </td>
                </tr>
            <!--    <tr class="row-">
                    <th scope="row">
                        <label for=""><?php _e( 'o Nombre del proyecto (Selección)', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="" id="" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php  ?>" />
                    </td>
                </tr>-->
                <tr class="row-CountryID">
                  <th scope="row-CountryID">
                    <label for=""><?php _e( 'Pais del Proceso', 'bcie' ); ?></label>
                  </th>
                  <td>
                      <select class="regular-text" class="CountryID" name="CountryID">
                                <option class="" name="" value=""<?php
                                global $wpdb;
                                $idc= $item->CountryID;
                                if ($idc == 0) {
                                    echo "selected";

                                } ?>>Seleccione un Tipo</option>
                                <?php
                                  global $wpdb;
                                  $resultados= $wpdb->get_results( "SELECT id, Name FROM wp_bcie_app_country" );
                                  foreach ( $resultados as $fila ){?>
                                    <option value="<?php echo $fila->id?>"<?php
                                    if ($idc == $fila->id) {
                                      echo "selected";
                                    }
                                     ?>><?php echo $fila->Name; $item->CountryID; ?></option>
                                  <?php } ?>
                      </select>
                </td>
                </tr>
                <tr class="row-LastUpdate">
                    <th scope="row">
                        <label for="LastUpdate"><?php _e( 'Fecha actualización', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="date" name="LastUpdate" id="LastUpdate" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->LastUpdate ); ?>" />
                    </td>
                </tr>
                <tr class="row-CurrentCreditLine">
                    <th scope="row">
                        <label for="CurrentCreditLine"><?php _e( 'Línea Vigente', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="number" name="CurrentCreditLine" id="CurrentCreditLine" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->CurrentCreditLine ); ?>" />
                    </td>
                </tr>
                <tr class="row-ParentCreditLine">
                    <th scope="row">
                        <label for="ParentCreditLine"><?php _e( 'Línea Padre', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="number" name="ParentCreditLine" id="ParentCreditLine" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->ParentCreditLine ); ?>" />
                    </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">

        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Agregar', 'bcie' ), 'primary', 'submit_plan' ); ?>

    </form>
</div>
