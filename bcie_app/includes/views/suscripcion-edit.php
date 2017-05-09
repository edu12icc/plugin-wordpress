<div class="wrap">
    <h1><?php _e( 'Agregar Suscripciones', 'bcie' ); ?></h1>

    <?php $item = suscrpcion_get_suscripcion( $id ); ?>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-FirstName">
                    <th scope="row">
                        <label for="FirstName"><?php _e( 'Nombre', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="FirstName" id="FirstName" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->FirstName ); ?>" required="required" />
                    </td>
                </tr>
                <tr class="row-Surname">
                    <th scope="row">
                        <label for="Surname	"><?php _e( 'Apellido', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Surname	" id="Surname	" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Surname	 ); ?>" required="required" />
                    </td>
                </tr>
                <tr class="row-Email">
                    <th scope="row">
                        <label for="Email"><?php _e( 'Email', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Email" id="Email" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Email ); ?>" />
                    </td>
                </tr>
                <tr class="row-Company">
                    <th scope="row">
                        <label for="Company"><?php _e( 'Company', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Company" id="Company" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Company ); ?>" />
                    </td>
                </tr>
                <tr class="row-CountryID">
                    <th scope="row">
                        <label for="CountryID"><?php _e( 'País', 'bcie' ); ?></label>
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
                <tr class="row-ParticipationOpportunities">
                    <th scope="row">
                      <label for="ParticipationOpportunities"><input type="checkbox" name="ParticipationOpportunities" id="ParticipationOpportunities" value="" <?php echo ($item->ParticipationOpportunities == 1) ? "checked" : NULL ;?>  /> <?php _e( '', 'bcie' ); ?></label>

                    </th>
                    <td>
                        <?php _e( ' Me interesa recibir información sobre Oportunidades de participación', 'bcie' ); ?>

                </tr>
                <tr class="row-ProcurementPlans">
                    <th scope="row">

                          <label for="ProcurementPlans"><input type="checkbox" name="ProcurementPlans" id="ProcurementPlans" value="on" <?php echo ($item->ProcurementPlans == 1) ? "checked" : NULL ;?> /> <?php _e( '', 'bcie' ); ?></label>
                    </th>
                    <td>
                          <?php _e( ' Me interesa recibir información sobre Planes de adquisicion', 'bcie' ); ?>
                    </td>
                </tr>
                <tr class="row-OtherInfo">
                    <th scope="row">
                      <label for="OtherInfo"><input type="checkbox" name="OtherInfo" id="OtherInfo" value="on" <?php echo ($item->OtherInfo == 1) ? "checked" : NULL ;?> /> <?php _e( '', 'bcie' ); ?></label>

                    </th>
                    <td>
                      <?php _e( ' Me interesa recibir cualquier otra información generada en el portal de adquisiciones', 'bcie' ); ?>
                        </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">

        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Modificar', 'bcie' ), 'primary', 'submit_suscripcion' ); ?>

    </form>
</div>
