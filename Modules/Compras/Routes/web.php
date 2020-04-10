<?php
Route::resource('proveedor','ProveedorController');
Route::get('provincia/{id}/buscar', 'ProveedorController@getprovincias');
Route::get('distrito/{id}/buscar','ProveedorController@getdistritos');
