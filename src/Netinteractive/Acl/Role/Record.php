<?php namespace Netinteractive\Acl\Role;

use Netinteractive\Acl\Interfaces\RoleInterface;
use Netinteractive\Elegant\Model\Record AS BaseRecord;

class Record extends BaseRecord implements RoleInterface
{
    public function init()
    {
        $this->setBlueprint(Blueprint::getInstance());
        return $this;
    }

    public function grantAccess($resource){

    }

    public function forbidAccess($resource){

    }

    public function hasAccess($resource){

    }
} 