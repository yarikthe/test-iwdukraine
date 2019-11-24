<?php

Route::group([
	'namespace' => 'App\Modules\TestLukyanchuk\Controllers',
	'as' => 'testlukyanchuk.',
	], function(){

		Route::get('/testlukyanchuk', ['uses' => 'TestLukyanchukController@index']);
});