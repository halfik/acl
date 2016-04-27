<?php
Route::group(array('prefix' => 'acl'), function(){
    Route::get('index', [
        //'middleware' => 'ni.acl',
        'as' => 'Netinteractive\Acl\Http\Controllers\AclController@index',
        'uses' => function (){
            $params = \Input::all();
            $params['view'] = 'backend.acl.index';

            return \Utils::runAction('Netinteractive\Acl\Http\Controllers\AclController@index', $params);
        }
    ]);
});


