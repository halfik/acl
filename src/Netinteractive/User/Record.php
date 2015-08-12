<?php namespace Netinteractive\Acl\User;

use Netinteractive\Acl\Interfaces\UserInterface;
use Netinteractive\Elegant\Model\Record AS BaseRecord;

class Record extends BaseRecord implements UserInterface
{
    public function init()
    {
        $this->setBlueprint( Blueprint::getInstance() );
        return $this;
    }

    public function addRole($roleName){

    }

    public function removeRole($roleName){

    }

    public function getRoles(){

    }

    public function hasAccess($resource){

    }
} 