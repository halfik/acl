<?php namespace Netinteractive\Acl\Exceptions;

/**
 * Class NoAccessException
 * @package Netinteractive\Acl\Exceptions
 */
class NoAccessException extends \Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        $route= Route::getCurrentRoute();
        $message.="\ndenied with route ".$route->getUri();
        $message.="\n".$route->getActionName()."[".$route->getName()."]";
        $user = \App::make('sentry')->getUser();

        if ( !empty($user) && $user->isActivated()){
            $message.="\nwith rights: ".print_r($user->getMergedPermissions(),1);
        }else{
            $message.=' without active user';
        }
        parent::__construct($message, $code, $previous);

    }
}