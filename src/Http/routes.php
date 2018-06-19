<?php

Route::group(['middleware' => 'web', 'prefix' => 'navigation', 'namespace' => 'IA\Laravel\Modules\Navigation\Http\Controllers'], function()
{
    Route::resource( 'menus', 'MenusController', [ 'as' => 'admin.navigation'] );
});
