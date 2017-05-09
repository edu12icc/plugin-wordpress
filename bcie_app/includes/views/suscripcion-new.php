<div class="wrap">
    <h1><?php _e( 'Agregar Suscripciones', 'bcie' ); ?></h1>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-FirstName">
                    <th scope="row">
                        <label for="FirstName"><?php _e( 'Nombre', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="FirstName" id="FirstName" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-Surname	">
                    <th scope="row">
                        <label for="Surname	"><?php _e( 'Apellido', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Surname	" id="Surname	" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-Email">
                    <th scope="row">
                        <label for="Email"><?php _e( 'Email', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Email" id="Email" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="" />
                    </td>
                </tr>
                <tr class="row-Company">
                    <th scope="row">
                        <label for="Company"><?php _e( 'Empresa/Institución', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="Company" id="Company" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="<?php echo esc_attr( $item->Company ); ?>" />
                    </td>
                </tr>
                <tr class="row-CountryID">
                    <th scope="row">
                        <label for="CountryID"><?php _e( '', 'bcie' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="CountryID" id="CountryID" class="regular-text" placeholder="<?php echo esc_attr( '', 'bcie' ); ?>" value="" />
                    </td>
                </tr>
                <tr class="row-ParticipationOpportunities">
                    <th scope="row">
                        <?php _e( ' Me interesa recibir información sobre Oportunidades de participación', 'bcie' ); ?>
                    </th>
                    <td>
                        <label for="ParticipationOpportunities"><input type="checkbox" name="ParticipationOpportunities" id="ParticipationOpportunities" value="on" /> <?php _e( '', 'bcie' ); ?></label>
                    </td>
                </tr>
                <tr class="row-ProcurementPlans">
                    <th scope="row">
                        <?php _e( ' Me interesa recibir información sobre Planes de adquisicion', 'bcie' ); ?>
                    </th>
                    <td>
                        <label for="ProcurementPlans"><input type="checkbox" name="ProcurementPlans" id="ProcurementPlans" value="on" /> <?php _e( '', 'bcie' ); ?></label>
                    </td>
                </tr>
                <tr class="row-OtherInfo">
                    <th scope="row">
                        <?php _e( ' Me interesa recibir cualquier otra información generada en el portal de adquisiciones', 'bcie' ); ?>
                    </th>
                    <td>
                        <label for="OtherInfo"><input type="checkbox" name="OtherInfo" id="OtherInfo" value="on" /> <?php _e( '', 'bcie' ); ?></label>
                    </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="0">

        <?php wp_nonce_field( '' ); ?>
        <?php submit_button( __( 'Agregar', 'bcie' ), 'primary', 'submit_suscripcion' ); ?>

    </form>
</div>
