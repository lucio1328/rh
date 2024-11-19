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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'utilisateur';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth/login']='utilisateur/login';
$route['auth/signup']='utilisateur/signup';
$route['auth/create_account']='utilisateur/create_account';
$route['auth/liste']='utilisateur/liste';
$route['auth/logout']='utilisateur/logout';
$route['auth/dashbord']='utilisateur/dashbord';
$route['auth/ajout']='utilisateur/ajout';
$route['auth/ajouter']='utilisateur/ajouter';
$route['auth/supprimer/(:num)']='utilisateur/supprimer/$1';
$route['auth/modification/(:num)']='utilisateur/modification/$1';
$route['auth/modifier/(:num)']='utilisateur/modifier/$1';


$route['employe/liste']='employe/liste';
$route['employe/ajout']='employe/ajout';
$route['employe/supprimer/(:num)']='employe/supprimer/$1';
$route['employe/modifier/(:num)']='employe/modifier/$1';
$route['employe/modification/(:num)']='employe/modification/$1';
$route['employe/profil/(:num)']='employe/profil/$1';
$route['employe/competence/(:num)']='employe/competence/$1';
$route['employe/competence_aj/(:num)']='employe/competence_aj/$1';
$route['employe/contrat/(:num)']='employe/contrat/$1';
$route['employe/contrat_aj/(:num)']='employe/contrat_aj/$1';
$route['employe/promotion/(:num)']='employe/promotion/$1';
$route['employe/promouvoir/(:num)']='employe/promouvoir/$1';

$route['poste/choix']='poste/choix';
$route['poste/liste']='poste/liste';
$route['poste/ajout']='poste/ajout';
$route['poste/create']='poste/create';
$route['poste/supprimer/(:num)']='poste/supprimer/$1';
$route['poste/modification/(:num)']='poste/modification/$1';
$route['poste/modifier/(:num)']='poste/modifier/$1';


$route['competence/choix']='competence/choix';
$route['competence/liste']='competence/liste';
$route['competence/ajout']='competence/ajout';
$route['competence/create']='competence/create';
$route['competence/supprimer/(:num)']='competence/supprimer/$1';
$route['competence/modification/(:num)']='competence/modification/$1';
$route['competence/modifier/(:num)']='competence/modifier/$1';

$route['offre/choix']='offre/choix';
$route['offre/liste']='offre/liste';
$route['offre/ajout']='offre/ajout';
$route['offre/modifier/(:num)']='offre/modifier/$1';
$route['offre/supprimer/(:num)']='offre/supprimer/$1';
$route['offre/create']='offre/create';
$route['offre/modification/(:num)']='offre/modification/$1';

$route['candidature/liste']='candidature/liste';

$route['offre2/liste']='offre2/liste';
