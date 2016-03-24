<?php namespace Netinteractive\Acl\Middleware;

use Closure;
use Netinteractive\Acl\Exceptions\NoAccessException;

class Route
{
    /**
     * Before middleware
     * @param $request
     * @param callable $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles = $this->getRoles();
        $route = $request->route();

        /**
         * sprawdzamy czy mamy uprawnienia (po nazwie akcji lub aliasie)
         */
        $access = false;
        foreach ($roles AS $role){
            if ( $role->hasAccess( array($route->getActionName()), false) ){
                $access = true;
                break;
            }
            elseif ($role->hasAccess( array($route->getName()), false)){
                $access = true;
                break;
            }
        }

        if (!$access){
            throw new NoAccessException($route);
        }



        return $next($request);
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        $user = \App::make('sentry')->getUser();
        if ($user){
            $userRoles = $user->getRoles();
            if ($userRoles){
                return $userRoles;
            }
        }

        $groupProvider = \App::make('sentry')->getRoleProvider();
        $defaultRole= $groupProvider->findByCode('guest');

        return array($defaultRole);
    }
}