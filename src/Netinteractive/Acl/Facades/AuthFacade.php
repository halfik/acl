<?php
namespace Netinteractive\Acl\Facades;
use Illuminate\Support\Facades\Facade;

class AuthFacade extends Facade {

    protected static function getFacadeAccessor() { return 'auth'; }

}