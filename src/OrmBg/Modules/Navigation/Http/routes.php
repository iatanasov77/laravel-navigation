<?php

Route::group(['middleware' => 'web', 'prefix' => 'ormbg/navigation', 'namespace' => 'Modules\Navigation\Http\Controllers'], function()
{
    Route::resource( 'menus', 'MenusController', [ 'as' => 'admin.navigation'] );
});
