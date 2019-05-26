<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Principal';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'Principal/index';
$route['dashboard'] = 'Principal/dashboard';

//rotas p/ médico
$route['cadastra_medico'] = 'Principal/cadastra_medico';
$route['consulta_medico'] = 'Principal/consulta_medico';
$route['lista_medico'] = 'Principal/lista_medico';
$route['deleta_medico'] = 'Principal/deleta_medico';
$route['atualiza_medico'] = 'Principal/atualiza_medico';
$route['retorna_medicos'] = 'Principal/retorna_medicos';

//rotas p/ paciente
$route['cadastra_paciente'] = 'Principal/cadastra_paciente';
$route['consulta_paciente'] = 'Principal/consulta_paciente';
$route['lista_paciente'] = 'Principal/lista_paciente';
$route['altera_paciente'] = 'Principal/altera_paciente';
$route['deleta_paciente'] = 'Principal/deleta_paciente';

//rota p/ atendimento
$route['cadastra_atendimento'] = 'Principal/cadastra_atendimento';
$route['lista_atendimento'] = 'Principal/lista_atendimento';
$route['deleta_atendimento'] = 'Principal/deleta_atendimento';
$route['consulta_atendimento'] = 'Principal/consulta_atendimento';
$route['atualiza_atendimento'] = 'Principal/atualiza_atendimento';

$route['agenda'] = 'Principal/agenda';

$route['pdf_gen'] = "Principal/pdf_gen";

$route['requicaoajax'] = "Principal/requicaoajax";

$route['logout'] = "Principal/logout";
