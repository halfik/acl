<?php
namespace Netinteractive\Acl\Interfaces;

interface AuthProviderInterface {
   public function authorize(array $credentials);
} 