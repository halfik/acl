<?php namespace Netinteractive\Acl\Permission;

use Netinteractive\Elegant\Model\Blueprint AS BaseBluePrint;
use Netinteractive\Elegant\Search\Searchable;

class Blueprint extends BaseBluePrint
{
    protected function init()
    {
        $this->table = 'user';
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
            'role__id' => array(
                'type' => 'int',
            ),
            'resource' => array(
                'title' => _('Nazwa'),
                'type' => 'string',
                'rules' => array(
                    'any' => 'required|max:100'
                ),
                'filters' => array(
                    'fill' => array(
                        'stripTags'
                    )
                )
            ),
        );

        return parent::init();
    }
} 