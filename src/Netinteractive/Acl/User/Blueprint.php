<?php namespace Netinteractive\Acl\User;

use Netinteractive\Elegant\Model\Blueprint AS BaseBluePrint;

class Blueprint extends BaseBluePrint
{
    protected function init()
    {
        $this->setStorageName('user');
        $this->primaryKey = array('id');
        $this->incrementingPk = 'id';

        $this->fields = array(
            'id' => array(
                'title' => 'Id',
                'type' => 'int',
                'sortable' => true,
                'rules' => array(
                    'any' => 'integer',
                    'update' => 'required'
                )
            ),
            'login' => array(
                'title' => _('Nazwa'),
                'type' => 'string',
                'sortable' => true,
                'rules' => array(
                    'any' => 'required|max:100'
                ),
                'filters' => array(
                    'fill' => array(
                        'stripTags'
                    )
                )
            ),

            'password' => array(
                'title' => _('Hasło'),
                'type' => 'string',
            ),

        );

        return parent::init();
    }
} 