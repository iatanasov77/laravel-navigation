<?php

Route::group(['middleware' => 'web', 'prefix' => 'navigation', 'namespace' => 'Modules\Navigation\Http\Controllers'], function()
{
    Route::resource( 'menus', 'MenusController', [ 'as' => 'admin.navigation'] );
});
