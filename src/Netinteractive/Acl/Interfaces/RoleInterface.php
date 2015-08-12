<?php
namespace Netinteractive\Acl\Interfaces;

interface RoleInterface {
    public function hasAccess($resource);

    public function grantAccess($resource);

    public function forbidAccess($resource);
} 