<div class="wrap">
    <h2><?php _e( 'Agregar Proceso Concluido', 'bcie' ); ?></h2>

    <form action="" method="post" class="formulario">

        <table class="form-table">
            <tbody>
              <tr class="row-OffererID">
                  <th scope="row-OffererID">
                      <label for="OffererID"><?php _e( 'OffererID', 'bcie' ); ?></label>
                  </th>
                  <td>
                      <input type="text" name="OffererID" id="OffererID" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->OffererID ); ?>" />
                  </td>
              </tr>
                <tr class="row-ProcessTitle">
                    <th scope="row">
                        <label for="ProcessTitle"><?php _e( 'Nombre', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="ProcessTitle" id="ProcessTitle" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->ProcessTitle ); ?>" required="required" />
                    </td>
                </tr>
                <tr class="row-ProcessNumber">
                    <th scope="row-ProcessNumber">
                        <label for="ProcessNumber"><?php _e( 'Número del proceso', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="ProcessNumber" id="ProcessNumber" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->ProcessNumber ); ?>" />
                    </td>
                </tr>
                <tr class="row-TenderID">
                    <th scope="row-TenderID">
                        <label for="TenderID"><?php _e( 'Licitación', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="number" name="TenderID" id="TenderID" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->TenderID ); ?>" />
                    </td>
                </tr>
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
                <tr class="row-Executor">
                    <th scope="row-Executor">
                        <label for="Executor"><?php _e( 'Organismo ejecutor', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Executor" id="Executor" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Executor ); ?>" />
                    </td>
                </tr>
                <tr class="row-LineName">
                  <th scope="row-LineName">
                    <label for="LineName"><?php _e( 'Nombre de la Linea', 'bcie' ); ?></label>
                  </th>
                  <td>
                    <input type="text" name="LineName" id="LineName" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->LineName );?>" />
                  </td>
                </tr>
                <tr class="row-CurrentCreditLine">
                  <th scope="row">
                    <label for="CurrentCreditLine"><?php _e( 'Linea Vigente', 'bcie' ); ?></label>
                  </th>
                  <td>
                    <input type="text" name="CurrentCreditLine" id="CurrentCreditLine" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->CurrentCreditLine );?>" />
                  </td>
                </tr>
                <tr class="row-ParentCreditLine">
                  <th scope="row">
                    <label for="ParentCreditLine"><?php _e( 'Linea Padre', 'bcie' ); ?></label>
                  </th>
                  <td>
                    <input type="text" name="ParentCreditLine" id="ParentCreditLine" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->ParentCreditLine );?>" />
                  </td>
                </tr>
                <tr class="row-ProcessResult">
                  <th scope="row-ProcessResult">
                    <label for=""><?php _e( 'Resultado', 'bcie' ); ?></label>
                  </th>
                  <td>
                      <select class="regular-text" name="ProcessResult">
                        <option value="">Selecione Tipo</option>
                         <option value="0">Adjudicado <?php $item->ProcessResult ?></option>
                         <option value="1">Desierto <?php $item->ProcessResult ?></option>
                         <option value="2">Fracasado <?php $item->ProcessResult ?></option>
                         <option value="3">Cancelado <?php $item->ProcessResult ?></option>
                      </select>
                  </td>
                </tr>
                <tr class="row-OffererName">
                  <th scope="row-OffererName">
                    <label for="OffererName"><?php _e( 'Nombre del Oferente', 'bcie' ); ?></label>
                  </th>
                  <td>
                    <input type="text" name="OffererName" id="OffererName" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->OffererName );?>" />
                  </td>
                </tr>
                <tr class="row-CountryID">
                  <th scope="row-CountryID">
                    <label for=""><?php _e( 'Pais del Proceso', 'bcie' ); ?></label>
                  </th>
                  <td>
                      <select class="regular-text" class="OffererNationalityID" name="OffererNationalityID">
                                <option class="" name="" value=""<?php
                                global $wpdb;
                                $idc= $item->OffererNationalityID;
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
                                     ?>><?php echo $fila->Name; $item->OffererNationalityID; ?></option>
                                  <?php } ?>
                      </select>
                </td>
              </tr>
              <tr>
                <tr class="row-RequestNumber">
                  <th scope="row-RequestNumber">
                    <label for="RequestNumber"><?php _e( 'Numero de contrato', 'bcie' ); ?></label>
                  </th>
                  <td>
                    <input type="text" name="RequestNumber" id="RequestNumber" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->RequestNumber );?>" />
                  </td>
                </tr>
                <tr class="row-AmountAwarded">
                  <th scope="row-AmountAwarded">
                    <label for="AmountAwarded"><?php _e( 'Monto adjudicado', 'bcie' ); ?></label>
                  </th>
                  <td>
                    <input type="text" name="AmountAwarded" id="AmountAwarded" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->AmountAwarded );?>" />
                  </td>
                </tr>
                <tr class="row-DateAdjudication">
                  <th scope="row-DateAdjudication">
                    <label for="DateAdjudication"><?php _e( 'Fecha de adjudicación', 'bcie' ); ?></label>
                  </th>
                  <td>
                    <input type="date" name="DateAdjudication" id="DateAdjudication" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->DateAdjudication );?>" />
                  </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">

        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Agregar', 'bcie' ), 'primary', 'submit_concluido' ); ?>

    </form>
</div>
