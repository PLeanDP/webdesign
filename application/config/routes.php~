<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/



/******************************************************************************/
/*	MAIN PAGE                                                                 */


$route['webdesign_designer/login/submit'] = 'webdesign_pages__designer/submit_form__designer_login';
$route['webdesign_designer/login'] = 'webdesign_pages__designer/login';

$route['webdesign_designer'] = 'webdesign_pages__designer/designer';
/******************************************************************************/






/******************************************************************************/
/*	ADMIN PAGE                                                                 */

$route['webdesign_admin/designer_profile/(:any)/(:any)'] = 'webdesign_pages__admin/designer__change_status/$1/$2';

$route['webdesign_admin/logout'] = 'webdesign_pages__admin/logout';

$route['webdesign_admin/login/(:any)'] = 'webdesign_pages__admin/login/$1';
$route['webdesign_admin/login/submit'] = 'webdesign_pages__admin/submit_form__admin_login';
$route['webdesign_admin/login'] = 'webdesign_pages__admin/login';

$route['webdesign_admin/designer_profile/(:any)'] = 'webdesign_pages__admin/designer_profile/$1';
$route['webdesign_admin'] = 'webdesign_pages__admin/admin';
/******************************************************************************/



/******************************************************************************/
/*	MAIN PAGE                                                                 */
$route['webdesign/(:any)/(:any)/(:any)'] = 'webdesign_pages__main/webdesign/$1/$2/$3';
$route['webdesign/(:any)'] = 'webdesign_pages__main/webdesign/$1';
$route['webdesign__submit_form__new_designer'] = 'webdesign_pages__main/submit_form__new_designer';
$route['webdesign__submit_form__chosen_designer'] = 'webdesign_pages__main/submit_form__chosen_designer';

$route['webdesign'] = 'webdesign_pages__main/webdesign';
/******************************************************************************/




$route['default_controller'] = "welcome";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
