<?php

   Route::group(['prefix' => 'api/v1'], function () {
   
   Route::post('google/test', 'Google\Spreadsheet\Controllers\Datasheets@test');
   
});