<?php namespace Netinteractive\Acl\Http\Controllers;

use Illuminate\Routing\Controller;

/**
 * Class AclController
 * @package Netinteractive\Acl\Http\Controllers
 */
class AclController extends Controller
{
    /**
     * Zwraca liste rol
     * @param array $params
     * @return mixed
     */
    public function index( array $params=array() )
    {
        $params['roleList'] = \App::make('sentry.role')->findAll();

        return \Response::build($params);
    }

    /**
     * Edycja uprawnien
     * @param array $params
     */
    public function edit($params)
    {
        $role = \App::make('sentry.role')->findById($params['id']);
        if ($role){
            $params['role'] = $role->toArray(true);
        }
        
        $params['resources'] = \Config::get('packages.netinteractive.acl.resources');

        
        return \Response::build($params);
    }


}