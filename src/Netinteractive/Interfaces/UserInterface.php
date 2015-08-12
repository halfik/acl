<?php
namespace Netinteractive\Acl\Interfaces;

interface UserInterface {
    public function hasAccess($resource);

    public function getRoles();

    public function addRole($roleName);

    public function removeRole($roleName);
} 