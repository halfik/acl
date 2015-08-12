<?php namespace Netinteractive\Acl;

use Netinteractive\Acl\Interfaces\UserInterface;
use Netinteractive\Acl\Interfaces\RegisterProviderInterface;
use Netinteractive\Acl\Interfaces\AuthProviderInterface;
use Netinteractive\Elegant\Model\MapperInterface;
use App;

class Acl{

    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * @var AuthProviderInterface
     */
    protected $authProvider;

    /**
     * @var MapperInterface
     */
    protected $userMapper;

    /**
     * @var MapperInterface
     */
    protected $roleMapper;

    /**
     * @var MapperInterface
     */
    protected $permissionMapper;

    /**
     * @var RegisterProviderInterface
     */
    protected $registerProvider;

    public function __construct()
    {
        $this->authProvider=App('ni.acl.auth.provider');
        $this->registerProvider=App('ni.acl.register.provider');
        $this->userMapper=App::make('ni.elegant.model.mapper.db',array('ni.acl.user'));
        $this->roleMapper=App::make('ni.elegant.model.mapper.db',array('ni.acl.role'));
        $this->permissionMapper=App::make('ni.elegant.model.mapper.db',array('ni.acl.permission'));
        $this->user=$this->userMapper->where('login','=','guest')->first();
    }

    public function setUserMapper(MapperInterface $mapper){
        $this->userMapper=$mapper;
        return $this;
    }

    public function setRoleMapper(MapperInterface $mapper){
        $this->roleMapper=$mapper;
        return $this;
    }

    public function setPermissionMapper(MapperInterface $mapper){
        $this->permissionMapper=$mapper;
        return $this;
    }

    /**
     * @param AuthProviderInterface $authProvider
     * @return $this
     */
    public function setAuthProvider(AuthProviderInterface $authProvider)
    {
        $this->authProvider=$authProvider;
        return $this;
    }

    /**
     * @param RegisterProviderInterface $registerProvider
     * @return $this
     */
    public function setRegisterProvider(RegisterProviderInterface $registerProvider)
    {
        $this->registerProvider=$registerProvider;
        return $this;
    }

    /**
     * @param UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user=$user;
        return $this;
    }

    /**
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    public function getUserMapper(){
        return $this->userMapper;
    }

    public function getRoleMapper(){
        return $this->roleMapper;
    }

    public function getPermissionMapper(){
        return $this->permissionMapper;
    }


    public function register($credentials)
    {
        $this->getRegisterProvider()->register($credentials);
        return $this;
    }

    public function authorize($credentials){
        $this->getAuthProvider()->authorize($credentials);
    }

    public function logOut(){

    }

    public function logIn(UserInterface $User){
        $this->setUser($User);
    }


    /**
     * @return AuthProviderInterface
     */
    public function getAuthProvider(){
        return $this->authProvider;
    }

    /**
     * @return RegisterProviderInterface
     */
    public function getRegisterProvider(){
        return $this->registerProvider;
    }

}
