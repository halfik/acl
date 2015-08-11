<?php namespace Netinteractive\Acl;

use Netinteractive\Acl\Interfaces\UserInterface;
use Netinteractive\Acl\Interfaces\RegisterProviderInterface;
use Netinteractive\Acl\Interfaces\AuthProviderInterface;


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
     * @var RegisterProviderInterface
     */
    protected $registerProvider;

    public function __construct()
    {

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


    public function register($credentials)
    {
        $this->getRegisterProvider()->register($credentials);
        return $this;
    }

    public function authorize($credentials){
        $this->getAuthProvider()->authorize($credentials);
    }

    public function unAuthorize(){

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
