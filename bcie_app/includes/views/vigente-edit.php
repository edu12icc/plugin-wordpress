<div class="wrap">
    <h2><?php _e( 'Modificar Proceso Vigente', 'bcie' ); ?></h2>

    <?php $item = _get_vigente( $id ); ?>

    <form action="" method="post" class="formulario">

        <table class="form-table">
            <tbody>
						<tr class="row-FocusArea">
							<th scope="row">
								<label for="FocusArea"><?php _e( 'Focus Area', 'bcie' ); ?></label>
							</th>
							<td>
								<textarea type="text" name="FocusArea" id="FocusArea" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="" ><?php echo esc_attr( $item->FocusArea ); ?></textarea>
							</td>
						</tr>
						<tr class="row-ProjectTitle">
							<th scope="row">
									<label for="ProjectTitle"><?php _e( 'Nombre del Proyecto', 'bcie' ); ?></label>
							</th>
							<td>
									<input type="text" name="ProjectTitle" id="ProjectTitle" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->ProjectTitle ); ?>" required="required" />
							</td>
						</tr>
						<tr class="row-ProcessTypeID">
							<th scope="row-ProcessTypeID">
								<label for=""><?php _e( 'Tipo de Proceso', 'bcie' ); ?></label>
							</th>
              <td>
									<select class="regular-text" class="ProcessTypeID" name="ProcessTypeID">
                  <option class="" name="" value=""<?php
                  global $wpdb;
                  $idc= $item->ProcessTypeID;
                  if ($idc == 0) {
                      echo "selected";

                  } ?>>Seleccione un Tipo</option>
                  <?php
                    global $wpdb;
                    $resultados= $wpdb->get_results( "SELECT id, Name FROM wp_bcie_app_processtype" );
                    foreach ( $resultados as $fila ){?>
                      <option value="<?php echo $fila->id?>"<?php
                      if ($idc == $fila->id) {
                        echo "selected";
                      }
                       ?>><?php echo $fila->Name; $item->ProcessTypeID; ?></option>
                    <?php } ?>
                  </select>
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
						<tr class="row-ReceptionDate">
							<th scope="row">
								<label for="ReceptionDate"><?php _e( 'Fecha de recepción de documentos', 'bcie' ); ?></label>
							</th>
							<td>
								<input type="date" name="ReceptionDate" id="ReceptionDate" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo substr( esc_attr( $item->ReceptionDate ), 0,-9);?>" />
							</td>
						</tr>


             </tbody>
			</table>
			<table  class="form-table">
			<tbody>
					<h2>Administrado por Prestatarios/Beneficiario</h2>
					<tr class="row-Scope">
						<th scope="row">
							<label for="Scope"><?php _e( 'Alcance', 'bcie' ); ?></label>
						</th>
						<td>
							<input type="text" name="Scope" id="Scope" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Scope ); ?>" />
						</td>
					</tr>
					<tr class="row-Mount">
						<th scope="row">
							<label for="Mount"><?php _e( 'Monto', 'bcie' ); ?></label>
						</th>
						<td>
							<input type="text" name="Mount" id="Mount" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Mount ); ?>" />
						</td>
					</tr>
						<tr class="row-Priority">
						<th scope="row">
							<label for="Priority"><?php _e( 'Prioridad', 'bcie' ); ?></label>
						</th>
						<td>
							<input type="number" name="Priority" id="Priority" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Priority ); ?>" />
						</td>
                    </tr>
					<tr class="row-Category">
						<th scope="row">
							<label for="Category"><?php _e( 'Categoria', 'bcie' ); ?></label>
						</th>
						<td>
							<input type="number" name="Category" id="Category" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Category ); ?>" />
						</td>
					</tr>
					<tr class="row-ModalityDescription">
						<th scope="row">
							<label for="ModalityDescription"><?php _e( 'Modalidad', 'bcie' ); ?></label>
						</th>
						<td>
							<input type="text" name="ModalityDescription" id="ModalityDescription" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->ModalityDescription ); ?>" />
						</td>
					</tr>
					<tr class="row-Website">
						<th scope="row">
							<label for="Website"><?php _e( 'Sitios Web', 'bcie' ); ?></label>
						</th>
						<td>
							<input type="text" name="Website" id="Website" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Website ); ?>" />
					</td>
					</tr>
					<tr class="row-DocumentationPlace">
						<th scope="row">
							<label for="DocumentationPlace"><?php _e( 'Dirección (Obtención de documentos)', 'bcie' ); ?></label>
						</th>
						<td>
							<input type="text" name="DocumentationPlace" id="DocumentationPlace" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->DocumentationPlace ); ?>" />
						</td>
					</tr>
					<tr class="row-EndDateSale">
							<th scope="row">
								<label for="EndDateSale"><?php _e( 'Fin venta de documentos', 'bcie' ); ?></label>
							</th>
							<td>
								<input type="date" name="EndDateSale" id="EndDateSale" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo substr( esc_attr( $item->EndDateSale ), 0,-9);?>" />
							</td>
					</tr>
					<tr class="row-StartDateSale">
							<th scope="row">
								<label for="StartDateSale"><?php _e( 'Inicio venta de documentos', 'bcie' ); ?></label>
							</th>
							<td>
								<input type="date" name="StartDateSale" id="StartDateSale" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo substr( esc_attr( $item->StartDateSale ), 0,-9);?>" />
							</td>
					</tr>
					<tr class="row-Address">
                    <th scope="row">
                        <label for="Address"><?php _e( 'Dirección (Entrega de documentos)', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Address" id="Address" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Address ); ?>" />
                    </td>
                </tr>
				<tr class="row-DateAdjudication">
							<th scope="row">
								<label for="DateAdjudication"><?php _e( 'Fecha tentativa de adjudicación', 'bcie' ); ?></label>
							</th>
							<td>
								<input type="date" name="DateAdjudication" id="DateAdjudication" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo substr( esc_attr( $item->DateAdjudication ), 0,-9);?>" />
							</td>
                </tr>
				<tr class="row-ProcessTitle">
                    <th scope="row">
                        <label for="ProcessTitle"><?php _e( 'Nombre del Proceso', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="ProcessTitle" id="ProcessTitle" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr($item->ProcessTitle); ?>" />
                    </td>
                </tr>
				<tr class="row-ProcessNumber">
                    <th scope="row">
                        <label for="ProcessNumber"><?php _e( 'Número de Proceso', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="ProcessNumber" id="ProcessNumber" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->ProcessNumber ); ?>" />
                    </td>
                </tr>
				<tr class="row-Project">
                    <th scope="row">
                        <label for="Project"><?php _e( 'Proyecto', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Project" id="Project" class="regular-text" placeholder="" value="<?php echo esc_attr( $item->Project ); ?>"> </input>
                    </td>
                </tr>
				<tr class="row-TenderID">
                    <th scope="row-TenderID">
                        <label for=""><?php _e( 'Licitación', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="number" name="TenderID" id="TenderID" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->TenderID ); ?>" />
                    </td>
                </tr>
				<tr class="row-Executor">
                    <th scope="row">
                        <label for="Executor"><?php _e( 'Organismo ejecutor', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Executor" id="Executor" class="regular-text" placeholder="" value="<?php echo esc_attr( $item->Executor ); ?>">
                    </td>
                </tr>
                <tr class="row-Name">
                    <th scope="row">
                        <label for="Name"><?php _e( 'Nombre', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Name" id="Name" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Name ); ?>" />
                    </td>
                </tr>
				<tr class="row-Object">
                    <th scope="row">
                        <label for="Object"><?php _e( 'Objetivo', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Object" id="Object" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Object ); ?>" />
                    </td>
                </tr>
			</tbody>
		</table>
        <input type="hidden" name="delete" value="0">
        <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">

        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Modificar', 'bcie' ), 'primary', 'submit_vigente' ); ?>

    </form>
</div>
