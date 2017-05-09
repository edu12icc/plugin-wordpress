<?php
/**
 * @package bcie_app
 */
/*
Plugin Name: Adquiciones BCIE (customizaciones)
Plugin URI: http://www.bcie.org/
Description: Este plugin fue desarrollado por NGS para integrar WordPress y las aplicaciones que requiere el sitio del <strong>Portal de Adquisciones</strong> para proveer de servicios a sus usuarios.
Version: 1.1.0
Author: CPADILLA
Author URI: http://www.ngshn.com/
License: GPLv2 or later
Text Domain: bcie_app
*/

// FILTROS
add_filter('query_vars', 'parameter_queryvars' );
function parameter_queryvars( $qvars )
{
$qvars[] = 'idproceso';
return $qvars;
}

// SHORTCODES
function bcie_app_filtros_busqueda($atts) {
     $filtros= '<h3>Filtros de Búsqueda</h3>
		 <div class="bcie_app_contenedor">
			<div class="bcie_app_columnas_4_2">
                         <select  name="" id="">
	       		  <option value="">Proceso Administrado por</option>
			  <option value="">BCIE</option>
			  <option value="">Prestatario/Beneficiario</option>
			</select></div>';
    
     $filtros .= '<div class="bcie_app_columnas_4_2"><select class="" name="" id=""><option>País del Proceso</option>';
      global $wpdb;
      $resultados= $wpdb->get_results( "SELECT * FROM wp_bcie_app_country WHERE isBCIEMember=1;" );
      foreach ( $resultados as $fila ){
                 $filtros .= '<option>'.$fila->Name.'</option>';
		} 
     $filtros .= '</select></div>';
     $filtros.='<div class="bcie_app_columnas_4_2"> <select class="" name="" id="">
			   <option value="">Tipo de Proceso</option>
		           <option value="">Bienes</option>
                           <option value="">Obras</option>
                           <option value="">Servicios</option>
			   <option value="">Cosultorías</option>
			</select>
			</div>
			 <div class="bcie_app_columnas_4_2"><select name="" >
      	 	 	   <option value="">Area de Focalización</option>
                           <option value="">Desarrollo Humano e Infraestructura Social</option>
			   <option value="">Infraestructura Productiva</option>
                           <option value="">Energía</option>
			   <option value="">Desarrollo Rural y Medio Ambiente</option>
                           <option value="">Intermediación Financiera y Finanzas para el Desarrollo</option>
		           <option value="">Servicios para Competitividad </option>
			</select>
			</div>
			<div class="bcie_app_columnas_4_2"> <input type="text" name="" value="" placeholder="Monto Desde" class="">
                        </div>
			<div class="bcie_app_columnas_4_2"> <input type="text" name="" value="" placeholder="Monto Hasta" class="">
                        </div>
	    	        <div class="bcie_app_columnas_4_2"><input type="text" name="" value="" placeholder="Línea" class="">
			<br>
                        </div>
 			<div class="bcie_app_columnas_4_2">
                        <input type="text" name="" value="" placeholder="Búsqueda por palabras" class="">
                        </div>
                       <div class="bcie_app_columnas_4_2">
			 <input type="date" name="" value="" placeholder="Fecha Desde" class="">
			</div>
                       <div class="bcie_app_columnas_4_2">
                         <input type="date" name="" value="" placeholder="Fecha Hasta" class="">
                        </div>
                        </div>
			<div class=""><a class="bcie_botones" align="left">Buscar</a><a align="left" class="bcie_botones">Limpiar Filtros</a></div>
			<br><br>';
			return $filtros;
        }
      add_shortcode('bcie_app_filtros_busqueda', 'bcie_app_filtros_busqueda');

function bcie_app_filtros_busqueda_concluido($atts) {
       $filtros= '<h3>Filtros de Búsqueda</h3>';
         $filtros .= '<div class="bcie_app_contenedor"><div class="bcie_app_columnas_2"><select class="bcie_app_form" name="" id=""><option>País del Proceso</option>';
        global $wpdb;
        $resultados= $wpdb->get_results( "SELECT * FROM wp_bcie_app_country WHERE isBCIEMember=1;" );
        foreach ( $resultados as $fila ){
                   $filtros .= '<option>'.$fila->Name.'</option>';
                  }
       $filtros .= '</select></div>';
        $filtros .= '<div class="bcie_app_columnas_2"><select>
                             <option value="">Estado de Proceso</option>
                             <option value="">Adjudicado</option>
                             <option value="">Desierto</option>
                             <option value="">Fracasado</option>
                             <option value="">Cancelado</option>
                          </select></div>
                   <div class="bcie_app_columnas_2"><input type="text" name="" value="" placeholder="Línea"></div>
                   <div class="bcie_app_columnas_2"><input type="text" name="" value="" placeholder="Búsqueda por palabras"></div>
                  </div>
                  <div ><a class="bcie_botones" align="right">Buscar</a><a class="bcie_botones">Limpiar Filtos</a></div>';
                   return $filtros;
          }
        add_shortcode('bcie_app_filtros_busqueda_concluido', 'bcie_app_filtros_busqueda_concluido');

  function bcie_app_filtros_busqueda_plan($atts) {
       $filtros= '<h3>Filtros de Búsqueda</h3>';
       $filtros .= '<div class="bcie_app_contenedor"><div class="bcie_app_columnas_4_2"><select><option>País del Proceso</option>';
          global $wpdb;
          $resultados= $wpdb->get_results( "SELECT * FROM wp_bcie_app_country WHERE isBCIEMember=1;" );
          foreach ( $resultados as $fila ){
                    $filtros .= '<option>'.$fila->Name.'</option>';
                  }
      $filtros .= '</select></div>';
      $filtros .= ' <div class="bcie_app_columnas_4_2"><input type="date" name="" value="" placeholder="Fecha Desde" class="bcie_app_form"></div>
                  <div class="bcie_app_columnas_4_2"><input type="date" name="" value="" placeholder="Fecha Hasta" class="bcie_app_form"></div>
                 <div class="bcie_app_columnas_4_2"><input type="text" name="" value="" placeholder="Línea"></div>
                 <div class="bcie_app_columnas_4_2"><input type="text" name="" value="" placeholder="Búsqueda por palabras" class="bcie_app_form"></div>
                 </div>
                <div><a class="bcie_botones" align="left">Buscar</a><a class="bcie_botones" align="left" >Limpiar Filtos</a></div>';
                 return $filtros;
        }
      add_shortcode('bcie_app_filtros_busqueda_plan', 'bcie_app_filtros_busqueda_plan');

function bcie_app_suscribirse(){
  $formulario='
     
      <label style="font-size:20px;">Datos Generales</label><br>
     
    <div class="bcie_app_contenedor bcie_app_form_bordes">
        <div class="bcie_app_columnas_2">
        <input class="bcie_app_form2" type="text" name="" value="" placeholder="Nombre">
        </div>
        <div class="bcie_app_columnas_2"> <input class="bcie_app_form2" type="text" name="" value="" placeholder="Apellido">
        </div>
        <div class="bcie_app_columnas_2">
         <input class="bcie_app_form2" type="text" name="" value="" placeholder="Correo Electónico">
        </div>
        <div class="bcie_app_columnas_2"> 
         <input class="bcie_app_form2" type="text" name="" value="" placeholder="Telefono">
        </div>
         <div class="bcie_app_columnas_2">
         <input class="bcie_app_form2" type="text" name="" value="" placeholder="Empresa/Institución">
         </div>
         <div class="bcie_app_columnas_2">'; 
           
         $formulario .= '<select style="width:100%;" name="" id=""><option>País</option>';
                         global $wpdb;
                         $resultados= $wpdb->get_results( "SELECT * FROM wp_bcie_app_country WHERE isBCIEMember=1;" );
                         foreach ( $resultados as $fila ){
                         $formulario .= '<option>'.$fila->Name.'</option>';
                }
         $formulario .= '</select>';
        $formulario .= ' </div>
     </div>
       
     <br> <label for="" style="font-size:20px;">Actividad que desarrolla</label>
            	<div class="bcie_app_contenedor bcie_app_form_bordes">
            	<div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Contratista</label></div>
            	<div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Consultor</label></div>
            	<div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Prestatario/Beneficiario</label></div>
            	<div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Organismo Financiador</label></div>
          	</div>

           <label style="font-size:20px;">Tipo de Información de la cual desea recibir las actualizaciones</label>
           <div class="bcie_app_contenedor bcie_app_form_bordes">
                <div class="bcie_app_columnas_2"><input type="checkbox" name="" value=""><label>Avisos de oportunidades de participación</label></div>
                <div class="bcie_app_columnas_2"><input type="checkbox" name="" value=""><label>Planes de Adquisiciones</label></div>
           </div>
           <label style="font-size:20px;">Países</label> 
           <div class="bcie_app_contenedor bcie_app_form_bordes"> 
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>All Countries</label></div>
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Guatemala</label></div>
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>El Salvador</label></div>
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Honduras</label></div>
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Nicaragua</label></div>
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Costa Rica</label></div>
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Panamá</label></div>
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Rep. Dominicana</label></div>
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Argentina</label></div>
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Colombia</label></div>
                 <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Belice</label></div>
                 <div class="bcie_app_columnas_4"><label></label></div>
              </div>
              <br><label style="font-size:20px">Tipo de Proceso</label>
                       <div class="bcie_app_contenedor bcie_app_form_bordes">
                       <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Bienes</label></div>
                       <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Obras</label></div>
                       <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Servicios</label></div>
                       <div class="bcie_app_columnas_4"><input type="checkbox" name="" value=""><label>Consultorías</label></div>
                       </div>
         
     <div style="width:100%; margin-top:10px; margin-right:10px; float:left;"><input type="checkbox" name="" value=""><label>Me interesa recibir cualquier otra información generada en el portal de adquisiciones</label>
     <br><br><a class="bcie_botones" style="float:left;">Suscribirse</a></div>';
	 
	 return $formulario;
}
add_shortcode('bcie_app_suscribirse', 'bcie_app_suscribirse');

function bcie_app_solicitud_linea(){
  $formulario='
      <input class="bcie_app_form4" type="text" name="" value="" placeholder="Nombre Completo">
      <input class="bcie_app_form4" type="text" name="" value="" placeholder="Correo Electónico">
      <input class="bcie_app_form4" type="text" name="" value="" placeholder="Empresa/Institución">
      <input class="bcie_app_form4" type="text" name="" value="" placeholder="País">
      <input class="bcie_app_form4" type="text" name="" value="" placeholder="Cargo/Posición">
      <textarea class="bcie_app_form4" placeholder="Mensaje" rows="15" ></textarea>
      <a class="bcie_botones">Envíar</a>';
   return $formulario;
}
add_shortcode('bcie_app_solicitud_linea', 'bcie_app_solicitud_linea');
function bcie_app_procesos_vigentes() {
  global $wpdb;
  $returns ='<div class="datagrid"><table class="table table-striped table-bordered" ><thead><tr><th>Título del Aviso</th><th>País</th><th>Fecha de Publicación</th><th>Fecha de Recepción</th><th>Días Restantes</th></tr></thead><tbody>';
  $resultados= $wpdb->get_results("SELECT * FROM tabla_vigente;");
  foreach ($resultados as $value) {
    $returns .= '<tr><td style="text-align:left !important;"><a href="'.get_site_url().'/index.php/proceso-vigente?idproceso='.$value->id.'">'.$value->ProjectTitle.'</a></td><td>'.$value->Name.'</td><td>'.date('d-M-y',strtotime($value->StartDateSale)).'</td><td>'.date('d-M-y',strtotime($value->ReceptionDate)).'</td>
    <td class="center"> ';
    if ($value->RemainingDays <= 15) {
       $returns .= '<span class="tiempo_minimo">'.$value->RemainingDays.'</span></td></tr>';
    }
    else if($value->RemainingDays > 15 or $value->RemainingDays < 15){
      $returns .= '<span class="tiempo_medio">'.$value->RemainingDays.'</span></td></tr>';
    }
    else {
        $returns .= '<span class="tiempo_mayor">'.$value->RemainingDays.'</span></td></tr>';
    }
  }
  $returns .= '</tbody></table></div>';
  return $returns;

  }
  add_shortcode('bcie_app_procesos_vigentes', 'bcie_app_procesos_vigentes');

function do_process(){
    $enlace = get_permalink();
    return $enlace;
}
add_shortcode('do_process', 'do_process');

function bcie_app_ver_proceso_vigente($atts) {
  global $wp_query;
  if (isset($wp_query->query_vars['idproceso']))
    {
        global $wpdb;
        $id = $wp_query->query_vars['idproceso'];
        $resultados= $wpdb->get_row("SELECT * FROM `wp_bcie_app_currentprocess` WHERE id=".$id);
        $returns ='<h4><strong>'.$resultados->ProjectTitle.'</strong></h4>
                  <p style="text-align: justify">
                  <label>País: '.$wpdb->get_var('SELECT NAME FROM `wp_bcie_app_country` WHERE id='.$resultados->CountryID.'').'| Fecha de recepción de propuesta: '.date('d-M-y',strtotime($resultados->ReceptionDate)).' | Linea: '.$resultados->CurrentCreditLine.'</label><br><br>

                  <div class="bcie_bordes"><h4 align="center">Banco Centroamericano de Integración Económica</h4>
                  <h3 align="center">'.$wpdb->get_var('SELECT NAME FROM `wp_bcie_app_country` WHERE id='.$resultados->CountryID.'').'</h3>
                  <p align ="center">
                  '.$resultados->Name.' ('.$resultados->CurrentCreditLine.')
                  </p>
                  <h4 align="center"> Aviso </h4>
                  <p align ="center">
                  '.$resultados->ProjectTitle.'<br>
                  '.$resultados->ProcessNumber.'<br>
                  <b>Modalidad: </b>'.$resultados->ModalityDescription.'<br><br>
                  </p>
                  <p>
                   <b>1.FUENTE DE RECURSOS</b></br>
                   El Banco Centroamericano de Integración Económica (BCIE), como parte de los servicios que brinda a sus países socios beneficiarios, está otorgando el financiamiento para la presente adquisición, en el marco del '.$resultados->Name.'.</br></br>
                   <b>2.ORGANISMO EJECUTOR Y CONTRATANTE DEL PROCESO</b></br></br>
                   2.1 El Organismo Ejecutor de este proceso es: '.$resultados->Executor.'.</br></br>
                   2.2 El Organismo Ejecutor, es el responsable del presente proceso de adquisición para lo cual, nombra al Comité Ejecutivo del proceso e invita a presentar propuestas para la contratación requerida.</br></br>
                   2.3 El Contratista será seleccionado de acuerdo con los procedimientos del Banco Centroamericano de Integración Económica establecidos en la Política para la Obtención de Bienes, Obras, Servicios y Consultorías con Recursos del BCIE y sus Normas para la Aplicación, que se encuentran bajo la siguiente dirección en el sitio de Internet: http://www.bcie.org bajo la sección Adquisiciones.</br></br>
                   <b>3. PRESENTACIÓN DEL PROCESO</b></br></br>
                   3.1 Objetivos Generales de la adquisición: '.$resultados->Object.'</br></br>
                   3.2 El Organismo Ejecutor pone a disposición de los interesados toda la documentación relacionada con esta licitación, necesaria para la preparación de las propuestas. Dicha información estará disponible en:</br></br>
                   Lugar:      <b>'.$resultados->DocumentationPlace.'</b><br>
                   A partir de: <b>'.date('d-M-y',strtotime($resultados->StartDateSale)).'</b></br>
                   Hasta:   <b>'.date('d-M-y',strtotime($resultados->EndDateSale)).'</b></br>
                   Cuando la adquisición de los documentos implique costo para el oferente, este será NO reembolsable. </br>
                   </br>Información adicional puede obtenerse en: <b>'.$resultados->Website.'</b>. </br></br>
                   3.3 Las Propuestas para este proceso se recibirán en:</br>
                   Fecha: <b>'.date('d-M-y',strtotime($resultados->ReceptionDate)).'</b></br>
                   Lugar: <b>'.$resultados->Address.'</b>.
                  <p>
                  </div>';
        return $returns;
    }else {
    return "Error no se econtró el registro.";
    }
  }
add_shortcode('bcie_app_ver_proceso_vigente', 'bcie_app_ver_proceso_vigente');


  function bcie_app_procesos_concluidos() {
    global $wpdb;
    $returns .= '<div class="datagrid"><table><thead><tr><th>Título del Proceso</th><th>País</th><th>Línea Vigente</th></thead><tbody>';
    $resultados= $wpdb->get_results("SELECT * FROM tabla_concluido;");
    foreach ($resultados as $value) {
      $returns .= '<tr><td style="text-align: left !important;"><a href="'.get_site_url().'/index.php/proceso-concluido?idproceso='.$value->id.'">'.$value->ProcessTitle.'</a></td><td>'.$value->Name.'</td><td>'.$value->CurrentCreditLine.'</td></tr>';
    }
    $returns .= '</tbody></table></div>';
      return $returns;

    }
    add_shortcode('bcie_app_procesos_concluidos', 'bcie_app_procesos_concluidos');

    function bcie_app_ver_procesos_concluidos($atts) {
      global $wp_query;
      if (isset($wp_query->query_vars['idproceso']))
        {
            global $wpdb;
            $id = $wp_query->query_vars['idproceso'];
            $resultados= $wpdb->get_row("SELECT * FROM `wp_bcie_app_finishedprocess` WHERE id=".$id);
            $returns ='<div class="bcie_bordes"><h4><strong>'.$resultados->ProcessTitle.'</strong></h4>
                  
                      <label>País: '.$wpdb->get_var('SELECT NAME FROM `wp_bcie_app_country` WHERE id='.$resultados->CountryID.'').' | Linea: '.$resultados->CurrentCreditLine.'</label></br>

                      </br><h4 align="center">Banco Centroamericano de Integración Económica</h4>
                      <h5 align="center"><b>'.$wpdb->get_var('SELECT NAME FROM `wp_bcie_app_country` WHERE id='.$resultados->CountryID.'').'</b></h5>
                      <p align="center">
                      '.$resultados->Executor.'</br>
                      '.$resultados->ProcessTitle.'
                      <p>
                      El resultado del proceso es el siguiente: ';
                      switch ($resultados->ProcessResult) {
                        case '0':
                          $returns .='<b>Adjudicado</b>';
                          $returns .= '</br>Nombre del adjudicatario: <b>'.$resultados->OffererName.'</b></br>
                                        Nacionalidad del adjudicatario: <b>'.$wpdb->get_var('SELECT NAME FROM `wp_bcie_app_country` WHERE id='.$resultados->OffererNationalityID.'').'</b></br>
                                        Monto Adjudicado: <b>$'.$resultados->AmountAwarded.'</b></p>';
                          break;
                        case '1':
                          $returns .='<b>Desierto </b></p></div>';
                          break;
                        case '2':
                          $returns .='<b>Fracasado </b></p></div>';
                          break;
                        case '3':
                          $returns .='<b>Cancelado </b></p><div>';
                          break;
                      }

            return $returns;
        }else {
        return "Error no se econtró el registro.";
        }
      }
    add_shortcode('bcie_app_ver_procesos_concluidos', 'bcie_app_ver_procesos_concluidos');

    function bcie_app_plan_adquisicion() {
      global $wpdb;
      $returns .= '<div class="datagrid"><tbody><table><thead><tr><th>Título del Proyecto</th><th>País</th><th>Línea Vigente</th><th>Fecha Actualización</th></tr></thead><tbody>';
      $resultados= $wpdb->get_results("SELECT * FROM bcie_app_plan;");
      foreach ($resultados as $value) {
        $returns .= '<tr><td style="text-align:left !important;"><a href="'.get_site_url().'/index.php/plan-de-adquisicion?idproceso='.$value->id.'">'.$value->ProjectTitle.'</a></td><td>'.$value->Name.'</td><td>'.$value->CurrentCreditLine.'</td><td>'.date('d-M-y',strtotime($value->LastUpdate)).'</td></tr>';
      }
      $returns .= '</tbody></table></div>';
      return $returns;

      }
      add_shortcode('bcie_app_plan_adquisicion', 'bcie_app_plan_adquisicion');

      function bcie_app_ver_plan_adquisicion($atts) {
        global $wp_query;
        if (isset($wp_query->query_vars['idproceso']))
          {
              global $wpdb;
              $id = $wp_query->query_vars['idproceso'];
              $resultados= $wpdb->get_row("SELECT * FROM `wp_bcie_app_procurementplan` WHERE id=".$id);
              $returns ='<div class="bcie_bordes"><h4><strong>'.$resultados->ProjectTitle.'</strong></h4>
                        <br>
                        <label>País: '.$wpdb->get_var('SELECT NAME FROM `wp_bcie_app_country` WHERE id='.$resultados->CountryID.'').'|Fecha de Actualización:'.date('d-M-y',strtotime($resultados->LastUpdate)).' | Linea: '.$resultados->CurrentCreditLine.'</label></br></div>';

              return $returns;
          }else {
          return "Error no se econtró el registro.";
          }
        }
      add_shortcode('bcie_app_ver_plan_adquisicion', 'bcie_app_ver_plan_adquisicion');



//FUNCTIONS
add_action('admin_menu', 'adquisiciones_plugin');

function adquisiciones_plugin(){
  $newvigente= new vigente_menu();
  $newconcluido = new conluido_menu();
  $newplan = new plan_menu();
  $newpaises= new paises_menu();
  $newtipo= new tipo_menu();

  add_menu_page(
    'Adquisiciones',
    'Adquisiciones',
    'manage_options',
    'adquisiciones',
    'adquisiciones_plugin',
    'dashicons-cart'
  );

  add_submenu_page(
    'adquisiciones',
    __( 'Proceso Vigente', 'bcie' ),
    __( 'Proceso Vigente', 'bcie' ),
    'manage_options',
    'vigente',
    array( $newvigente, 'plugin_page' )
  );

  add_submenu_page(
    'adquisiciones',
    __( 'Proceso Concluido', 'bcie' ),
    __( 'Proceso Concluido', 'bcie' ),
    'manage_options',
    'concluido',
    array( $newconcluido, 'plugin_page' )
  );

  add_submenu_page(
    'adquisiciones',
    __( 'Plan Adquisicion', 'bcie' ),
    __( 'Plan Adquisicion', 'bcie' ),
    'manage_options',
    'plan',
    array( $newplan, 'plugin_page' )
  );

  add_submenu_page(
      'adquisiciones',
    __( 'Paises', 'bcie' ),
    __( 'Paises', 'bcie' ),
    'manage_options',
    'paises',
    array( $newpaises, 'plugin_page' )
  );

  add_submenu_page(
      'adquisiciones',
    __( 'Tipo Proceso', 'bcie' ),
    __( 'Tipo Proceso', 'bcie' ),
    'manage_options',
    'tipo',
    array( $newtipo, 'plugin_page' )
  );

  remove_submenu_page(
    'adquisiciones',
    'adquisiciones'
  );
}

add_action('init', function(){
   include dirname( __FILE__) . '/includes/class-vigente-menu.php';
   include dirname( __FILE__) . '/includes/class-vigente-list-table.php';
   include dirname( __FILE__) . '/includes/vigente-functions.php';
   include dirname( __FILE__) . '/includes/class-form-handler-vigente.php';

   include dirname( __FILE__) . '/includes/class-concluido-menu.php';
   include dirname( __FILE__) . '/includes/class-concluido-list-table.php';
   include dirname( __FILE__) . '/includes/concluido-functions.php';
   include dirname( __FILE__) . '/includes/class-form-handler-concluido.php';

   include dirname( __FILE__) . '/includes/class-plan-menu.php';
   include dirname( __FILE__) . '/includes/class-plan-list-table.php';
   include dirname( __FILE__) . '/includes/plan-functions.php';
   include dirname( __FILE__) . '/includes/class-form-handler-plan.php';

   include dirname( __FILE__) . '/includes/class-paises-menu.php';
   include dirname( __FILE__) . '/includes/class-pais-list-table.php';
   include dirname( __FILE__) . '/includes/pais-functions.php';
   include dirname( __FILE__) . '/includes/class-form-handler.php';

   include dirname( __FILE__) . '/includes/class-tipo-menu.php';
   include dirname( __FILE__) . '/includes/class-tipo-list-table.php';
   include dirname( __FILE__) . '/includes/tipo-functions.php';
   include dirname( __FILE__) . '/includes/class-form-handler-tipo.php';

   wp_register_style('your_css_and_js', plugins_url('style.css',__FILE__ ));
   wp_enqueue_style('your_css_and_js');
 }
);
?>
