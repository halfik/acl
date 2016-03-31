<?php namespace Netinteractive\Acl\Commands;

use \Illuminate\Console\Command;
use Netinteractive\Acl\AclServiceProvider;
use \Symfony\Component\Console\Input\InputOption;
use \Symfony\Component\Console\Input\InputArgument;

class Grant extends Command
{


    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'ni:grant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grant access to resources';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('roleCode', InputArgument::OPTIONAL, 'Role code'),
        );
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $roleCode = $this->argument('roleCode');
        $roles = array();

        if($roleCode){
            $roles[] = $roleCode;
        }

        if(!$roles){
            $rolesList = \App::make('sentry')->getRoleProvider()->findAll();

            foreach($rolesList as $role){
                $roles[] = $role->getCode();
            }

        }
        foreach($roles as $roleCode){
            $this->grantPermissions($roleCode);
        }
    }

    /**
     * @param $roleCode
     */
    protected function grantPermissions($roleCode)
    {
        $role = \App::make('sentry')->getRoleProvider()->findByCode($roleCode);
        $permissions = array();

        $resources = \Config::get('packages.netinteractive.acl.resources');

        $this->makePermissions($permissions, $resources,$roleCode);

        $role->setPermissionsAttribute($permissions, true);
        \App::make('sentry')->getRoleProvider()->getMapper()->save($role);
    }

    /**
     * @param $permissions
     * @param $resources
     * @param $roleCode
     */
    protected function makePermissions(&$permissions, &$resources, $roleCode, $parent=null)
    {
        foreach ($resources AS &$resource){
            if (isSet($resource['roles']) && !is_array($resource['roles'])){
                $resource['roles'] = array_map('trim', explode(',', $resource['roles']));
            }

            if(!isset($resource['roles']) && $parent && isset($parent['roles'])){
                $resource['roles'] = $parent['roles'];
            }
            if(isset($resource['roles'])){
                if(in_array($roleCode,$resource['roles'])){
                    $permissions[$resource['value']] = 1;
                }
            }

            if (isSet($resource['childs']) && !empty($resource['childs'])){
                $this->makePermissions($permissions, $resource['childs'],$roleCode, $resource);
            }
        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(

        );
    }

}