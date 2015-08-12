<?php
namespace Netinteractive\Acl\Facades;
use Illuminate\Support\Facades\Facade;

class AclFacade extends Facade {

    protected static function getFacadeAccessor() { return 'ni.acl'; }

}