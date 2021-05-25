<?php

namespace Config;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

// // product view
// $routes->group('/product', function ($routes) {
// 	$routes->get('all', 'ProductController::getAllProduct');
// 	$routes->get('detail/(:any)', 'ProductController::productDetail/$1');
// });

// Auth

// // product JSON
// $routes->get('/product-json', 'ProductController::productJSON');
// $routes->get('/product-all-json', 'ProductController::getAllProductJSON');
// $routes->get('/product-detail-json/(:any)', 'ProductController::productDetailJSON/$1');

// customer
// $routes->get('/login', 'CustomerController::login');
// $routes->get('/customer/feedback-json', 'CustomerController::feedbackJSON');
// $routes->get('/customer/customer-json', 'CustomerController::customerJSON');

// $routes->get('/check_user/(:any)', 'UserController::check_user/$1');

// cart
// $routes->get('/cart-view', 'ShoppingCartController::cart_view');
// $routes->post('/cart', 'ShoppingCartController::cart');
// $routes->get('/cart-detail-json/(:any)', 'ShoppingCartController::get_cartJSON/$1');
// $routes->delete('/remove-cart/(:any)', 'ShoppingCartController::remove_cart/$1');
// $routes->get('/cart-count/(:any)', 'ShoppingCartController::cart_count/$1');
// $routes->put('/cart-quantity-update/(:any)', 'ShoppingCartController::update_cart_quantity/$1');
// $routes->get('/cart-sum/(:any)', 'ShoppingCartController::total_sum/$1');

// $routes->put('/updateTotal/(:any)', 'PurchaseController::updateTotal/$1');
// $routes->post('/purchase', 'PurchaseController::purchase');
// $routes->get('/purchase-view', 'PurchaseController::purchaseView');
// $routes->get('/purchase-detail/(:any)', 'PurchaseController::purchaseDetail/$1');
// $routes->get('/purchase-total/(:any)', 'PurchaseController::purchaseTotal/$1');
// $routes->put('/payment/(:any)', 'PurchaseController::pay/$1');

// order complete
// $routes->get('/order-complete', 'OrderCompleteController::index');
// $routes->get('/contact', 'CustomerController::contact');
// $routes->get('/about', 'CustomerController::about');

// View
$routes->get('/', 'ProductController::index');

// USER
$routes->group('user', function ($routes) {
	$routes->group('auth', function ($routes) {
		$routes->post('register', 'UserController::register');
		$routes->post('login', 'UserController::login');
		$routes->get('check_user/(:any)', 'UserController::check_user/$1');
	});

	$routes->group('product', function ($routes) {
		$routes->get('products', 'ProductController::getAllProduct');
		$routes->get('detail/(:any)', 'ProductController::productDetail/$1');
	});

	$routes->group('cart', function ($routes) {
		$routes->post('/', 'ShoppingCartController::cart');
		$routes->get('view', 'ShoppingCartController::cart_view');
		$routes->delete('remove/(:any)', 'ShoppingCartController::remove_cart/$1');
		$routes->get('count/(:any)', 'ShoppingCartController::cart_count/$1');
		$routes->put('update/(:any)', 'ShoppingCartController::update_cart_quantity/$1');
		$routes->get('sum/(:any)', 'ShoppingCartController::total_sum/$1');
	});

	$routes->group('order', function ($routes) {
		$routes->get('complete', 'OrderCompleteController::index');
	});

	$routes->group('purchase', function ($routes) {
		$routes->post('/', 'PurchaseController::purchase');
		$routes->get('view', 'PurchaseController::purchaseView');
		$routes->get('detail/(:any)', 'PurchaseController::purchaseDetail/$1');
		$routes->get('total/(:any)', 'PurchaseController::purchaseTotal/$1');
		$routes->get('check/(:any)', 'PurchaseController::checkPurchase/$1');
		$routes->put('payment/(:any)', 'PurchaseController::pay/$1');
		$routes->put('updateTotal/(:any)', 'PurchaseController::updateTotal/$1');
		$routes->get('payment/view', 'PurchaseController::paymentView');
		$routes->get('payment/view/detail(:any)', 'PurchaseController::paymentDetail/$1');
	});


	// $routes->get('contact', 'CustomerController::contact');
	$routes->get('about', 'CustomerController::about');
});


// ADMIN
$routes->group('admin', function ($routes) {
	$routes->group('auth', function ($routes) {
		$routes->post('login', 'AdminController::login');
	});
	$routes->get('dashboard', 'AdminController::index');
	$routes->get('purchase-control', 'AdminController::purchaseControl');
	$routes->get('produk', 'AdminController::produk');
});


// API
$routes->group('api', function ($routes) {
	$routes->group('user', function ($routes) {
		$routes->group('product', function ($routes) {
			$routes->get('product-json', 'ProductController::productJSON');
			$routes->get('all-json', 'ProductController::getAllProductJSON');
			$routes->get('detail-json/(:any)', 'ProductController::productDetailJSON/$1');
		});

		$routes->group('customer', function ($routes) {
			$routes->get('customer-json', 'CustomerController::customerJSON');
			$routes->get('feedback-json', 'CustomerController::feedbackJSON');
		});

		$routes->group('cart', function ($routes) {
			$routes->get('detail-json/(:any)', 'ShoppingCartController::get_cartJSON/$1');
		});

		$routes->group('payment', function ($routes) {
			$routes->get('list-json', 'PurchaseController::paymentListJSON');
			$routes->get('detail/(:any)', 'PurchaseController::paymentDetailJSON/$1');
			$routes->delete('cancel-payment', 'PurchaseController::cancelPaymentJSON/');
		});
	});

	$routes->group('admin', function ($routes) {
		$routes->get('purchase-control-json', 'AdminController::purchaseControlJSON');
		$routes->put('update-status-purchase/(:any)', 'AdminController::updateStatusPurchase/$1');
	});
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
