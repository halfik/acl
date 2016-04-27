<?php namespace Netinteractive\Acl\Http\Controllers;

use Illuminate\Routing\Controller;

/**
 * Class AclController
 * @package Netinteractive\Acl\Http\Controllers
 */
class AclController extends Controller
{

    public function index( array $params=array() )
    {
        return \Response::build($params);
    }
}