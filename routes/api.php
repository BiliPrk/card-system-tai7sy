<?php
Route::post('admin/login', 'Admin\\Login@login')->middleware('api'); Route::post('admin/login/logout', 'Admin\\Login@logout')->middleware('api'); Route::post('admin/login/verify', 'Admin\\Login@getVerify')->middleware('api'); Route::group(array('prefix' => 'admin', 'middleware' => array('auth', 'api')), function () { Route::post('login/info', 'Admin\\Login@info'); Route::post('login/password', 'Admin\\Login@changePassword'); Route::post('dashboard', 'Admin\\Dashboard@index'); Route::any('system/info', 'Admin\\System@info'); Route::any('system/theme', 'Admin\\System@theme'); Route::any('system/order', 'Admin\\System@order'); Route::any('system/vcode', 'Admin\\System@vcode'); Route::any('system/email', 'Admin\\System@email'); Route::any('system/sms', 'Admin\\System@sms'); Route::any('system/storage', 'Admin\\System@storage'); Route::post('system/email/test', 'Admin\\System@emailTest'); Route::post('system/order/clean', 'Admin\\System@orderClean'); Route::post('pay', 'Admin\\Pay@get'); Route::get('pay/stat', 'Admin\\Pay@stat'); Route::post('pay/sort', 'Admin\\Pay@sort'); Route::post('pay/fee_system', 'Admin\\Pay@fee_system'); Route::post('pay/fee', 'Admin\\Pay@fee'); Route::post('pay/edit', 'Admin\\Pay@edit'); Route::post('pay/comment', 'Admin\\Pay@comment'); Route::post('pay/enable', 'Admin\\Pay@enable'); Route::post('pay/delete', 'Admin\\Pay@delete'); Route::post('category', 'Merchant\\Category@get'); Route::post('category/sort', 'Merchant\\Category@sort'); Route::post('category/edit', 'Merchant\\Category@edit'); Route::post('category/enable', 'Merchant\\Category@enable'); Route::post('category/delete', 'Merchant\\Category@delete'); Route::post('product', 'Merchant\\Product@get'); Route::post('product/sort', 'Merchant\\Product@sort'); Route::post('product/set_count', 'Merchant\\Product@set_count'); Route::post('product/category', 'Merchant\\Product@category_change'); Route::post('product/edit', 'Merchant\\Product@edit'); Route::post('product/enable', 'Merchant\\Product@enable'); Route::post('product/delete', 'Merchant\\Product@delete'); Route::post('product/count/sync', 'Merchant\\Product@count_sync'); Route::post('file/upload', 'Merchant\\File@upload_merchant'); Route::post('card', 'Merchant\\Card@get'); Route::post('card/add', 'Merchant\\Card@add'); Route::post('card/edit', 'Merchant\\Card@edit'); Route::any('card/export', 'Merchant\\Card@export'); Route::post('card/delete', 'Merchant\\Card@trash'); Route::post('card/trash/delete', 'Merchant\\Card@deleteTrashed'); Route::post('card/trash/restore', 'Merchant\\Card@restoreTrashed'); Route::post('card/trash/restore/all', 'Merchant\\Card@restoreAll'); Route::post('card/delete/all', 'Merchant\\Card@deleteAll'); Route::post('coupon', 'Merchant\\Coupon@get'); Route::post('coupon/create', 'Merchant\\Coupon@create'); Route::post('coupon/edit', 'Merchant\\Coupon@edit'); Route::post('coupon/enable', 'Merchant\\Coupon@enable'); Route::post('coupon/delete', 'Merchant\\Coupon@delete'); Route::post('order', 'Merchant\\Order@get'); Route::get('order/export', 'Merchant\\Order@export'); Route::post('order/info', 'Merchant\\Order@info'); Route::post('order/remark', 'Merchant\\Order@remark'); Route::post('order/set_send_status', 'Merchant\\Order@set_send_status'); Route::post('order/ship', 'Merchant\\Order@ship'); Route::post('log', 'Merchant\\Log@get'); Route::get('order/stat', 'Merchant\\Order@stat'); Route::post('order/delete', 'Admin\\Order@delete'); Route::post('order/freeze', 'Admin\\Order@freeze'); Route::post('order/unfreeze', 'Admin\\Order@unfreeze'); Route::post('order/set_paid', 'Admin\\Order@set_paid'); Route::post('web/cache/clear', 'Admin\\Dashboard@clearCache'); Route::get('web/logs', '\\Rap2hpoutre\\LaravelLogViewer\\LogViewerController@index'); Route::get('version', 'Admin\\Dashboard@version'); Route::get('version/check_update', 'Admin\\Dashboard@checkUpdate'); }); Route::group(array('prefix' => 'shop', 'middleware' => array('api')), function () { Route::post('verify', 'Shop\\VerifyCode@getVerify'); Route::post('product', 'Shop\\Product@get'); Route::post('product/password', 'Shop\\Product@verifyPassword'); Route::post('coupon', 'Shop\\Coupon@info'); Route::any('buy', 'Shop\\Pay@buy'); Route::post('record/get', 'Shop\\Order@get'); }); Route::post('qrcode/query/{pay_id}', 'Shop\\Pay@qrQuery')->middleware('api');