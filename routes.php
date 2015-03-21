<?php

/**
 * Your package routes would go here
 */

Route::group(['prefix' => 'webpay'], function() {
	// Route::get('Compra', ['as' => 'tbk_demo', 'uses' => '\rotvulpix\transbank\Controllers\DemoController@Compra']);
	// Route::get('webpay', ['as' => 'tbk_demo_checkout', 'uses' => '\rotvulpix\transbank\Controllers\DemoController@WebPay']);
	Route::post('cierre', ['as' => 'tbk_cierre', 'uses' => '\rotvulpix\transbank\Controllers\WebPayController@cierre']);
	Route::post('exito', ['as' => 'tbk_exito', 'uses' => '\rotvulpix\transbank\Controllers\WebPayController@exito']);
	Route::post('fracaso', ['as' => 'tbk_fracaso', 'uses' => '\rotvulpix\transbank\Controllers\WebPayController@fracaso']);
});