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
  $route['default_controller'] = 'web';
  $route['404_override'] = 'web/pnf';
  $route['translate_uri_dashes'] = FALSE;

  // $route['sitemap\.xml'] = "web/sitemap";
  // $route['sitemaps/(:any)/(:any)'] = "web/sitemaps/$1/$2";
  // $route['catgory-sitemap/(:any)/(:any)/(:any)'] = 'web/catgory_sitemap/$1/$2/$3';
/*
$route['sitemap/sitemap\.xml'] = "sitemap/index"; */

$route['user'] = 'user/index/User';
$route['admin'] = 'user/index/Admin';
$route['dashboard/(:any)'] = 'user/dashboard/$1';
$route['feed'] = 'feed/index';
$route['blogs/feed'] = 'feed/blogFeed';
$route['press_releases/feed'] = 'feed/prFeed';
$route['upload/(:any)'] = 'user/upload/$1';



$route['admin/client/list']='ClientController';
$route['admin/client/add']='ClientController/add';
$route['admin/client/edit/(:any)']='ClientController/edit/$1';
$route['admin/client/enable/(:any)']='ClientController/enable/$1';
$route['admin/client/disable/(:any)']='ClientController/disable/$1';
$route['admin/client/delete/(:any)']='ClientController/delete/$1';

/*Blogs*/
$route['admin/blog/list']='BlogController';
$route['admin/blog/add']='BlogController/add';
$route['admin/blog/edit/(:any)']='BlogController/edit/$1';
$route['admin/blog/enable/(:any)']='BlogController/enable/$1';
$route['admin/blog/disable/(:any)']='BlogController/disable/$1';
$route['admin/blog/delete/(:any)']='BlogController/delete/$1';


/*Press Release*/
$route['admin/pressrelease/list']='PRController';
$route['admin/pressrelease/add']='PRController/add';
$route['admin/pressrelease/edit/(:any)']='PRController/edit/$1';
$route['admin/pressrelease/enable/(:any)']='PRController/enable/$1';
$route['admin/pressrelease/disable/(:any)']='PRController/disable/$1';
$route['admin/pressrelease/delete/(:any)']='PRController/delete/$1';


$route['list/(:any)'] = 'user/list/$1';
$route['add/(:any)'] = 'user/add/$1';

$route['edit/member/(:any)'] = 'user/edit/member/$1';
$route['delete/member/(:any)'] = 'user/delete/member/$1';
$route['enable/member/(:any)'] = 'user/enable/member/$1';
$route['disable/member/(:any)'] = 'user/disable/member/$1';


$route['edit/publisher/(:any)'] = 'user/edit/publisher/$1';
$route['delete/publisher/(:any)'] = 'user/delete/publisher/$1';
$route['enable/publisher/(:any)'] = 'user/enable/publisher/$1';
$route['disable/publisher/(:any)'] = 'user/disable/publisher/$1';


$route['edit/category/(:any)'] = 'user/edit/category/$1';
$route['delete/category/(:any)'] = 'user/delete/category/$1';
$route['enable/category/(:any)'] = 'user/enable/category/$1';
$route['disable/category/(:any)'] = 'user/disable/category/$1';

$route['edit/region/(:any)'] = 'user/edit/region/$1';
$route['delete/region/(:any)'] = 'user/delete/region/$1';
$route['enable/region/(:any)'] = 'user/enable/region/$1';
$route['disable/region/(:any)'] = 'user/disable/region/$1';

$route['edit/report/(:any)'] = 'user/edit/report/$1';
$route['delete/report/(:any)'] = 'user/delete/report/$1';
$route['reportlist'] = 'report/viewlist';
$route['report/viewlist'] = 'report/ajaxList';

/*$route['edit/press_release/(:any)'] = 'user/edit/press_release/$1';
$route['delete/press_release/(:any)'] = 'user/delete/press_release/$1';
*/
/*$route['edit/blog/(:any)'] = 'user/edit/blog/$1';
$route['delete/blog/(:any)'] = 'user/delete/blog/$1';*/

$route['pages/(:any)'] = 'user/pages/$1';
$route['export'] = 'user/createXLS';
$route['logout/(:any)'] = 'user/logout/$1';

$route['edit/paylink/(:any)'] = 'user/edit/paylink/$1';
$route['delete/paylink/(:any)'] = 'user/delete/paylink/$1';
$route['paylinklist'] = 'paylink/viewlist';
$route['paylink/viewlist'] = 'paylink/ajaxList';

// Web routes
$route['fetchreports'] = 'Api/fetchreports';
$route['exportdb/(:any)'] = 'Api/exportdb/$1';

$route['categories'] = 'web/categories';
$route['categories/(:any)'] = 'web/categoryDetails/$1';
$route['categories/(:any)/(:any)'] = 'web/categoryDetails/$1/$2';
$route['categories/(:any)/(:any)/(:any)'] = 'web/categoryDetails/$1/$2/$3';

$route['reports'] = 'web/reportList';
$route['cancer'] = 'web/cancerPage';
$route['diabetis'] = 'web/diabetisPage';
$route['reportsdetails/(:any)'] = 'web/report/$1';
$route['request-sample/(:any)'] = 'web/request_sample/$1';
$route['check-discount/(:any)'] = 'web/check_discount/$1';
$route['buyNow/(:any)'] = 'web/buyNow/$1';

$route['search/(:any)'] = 'web/search/$1';
$route['paymentResponce'] = 'web/paymentResponce';

$route['press-releases'] = 'web/pressRelease';
$route['press-release/(:any)'] = 'web/press_release/$1';
$route['press-release/(:any)/(:any)'] = 'web/press_release/$1/$2';

$route['blogs'] = 'web/blogs';
$route['blogs/(:any)'] = 'web/blogs/$1';
$route['blog/(:any)'] = 'web/single_blog/$1';
$route['blog/(:any)/(:any)'] = 'web/single_blog/$1/$2';

$route['contact-us'] = 'web/contact';
$route['about-us'] = 'web/about';
$route['services'] = 'web/services';
$route['privacy-policy'] = 'web/privacypolicyOnEnquiery';
$route['privacypolicy'] = 'web/privacypolicyOnEnquiery';
$route['terms-conditions'] = 'web/termsConditions';
// $route['format-delivery'] = 'web/format_delivery';
// $route['how-to-order'] = 'web/how_to_order';
// $route['return-policy'] = 'web/return_policy';

// $route['subscribers'] = 'web/Subscribers';

// $route['unique-keywords/(:any)/(:any)'] = 'web/UniqueKeywords/$1/$2';
// $route['call-keywords/(:any)/(:any)'] = 'web/callKeywords/$1/$2';
$route['(:any)'] = 'web/$1';


/*
 * Paypal Routes
 */
// $route['paydata'] = 'Paypal/index';
// $route['buyNow/(:any)'] = 'web/buyNow/$1';
// $route['paypal/getPaymentStatus'] = 'Paypal/getPaymentStatus';
// $route['paypal/getPaymentStatus'] = 'Paypal/getPaymentStatus';
// $route['paypal/success'] = 'Paypal/success';
// $route['paypal/cancel'] = 'Paypal/cancel';
// $route['paypal/refund_payment'] = 'Paypal/refund_payment';

//razorpay
//$route['default_controller'] = 'razorpay/index';
$route['checkout/(:any)'] = "razorpay/checkout/$1";
