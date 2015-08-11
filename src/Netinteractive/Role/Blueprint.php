<?php namespace Netinteractive\Acl\Role;

use Netinteractive\Elegant\Model\Blueprint AS BaseBluePrint;
use Netinteractive\Elegant\Search\Searchable;

class Blueprint extends BaseBluePrint
{
    protected function init()
    {
        $this->table = 'role';
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
            'name' => array(
                'title' => _('Nazwa'),
                'type' => 'string',
                'sortable' => true,
                'searchable' => Searchable::text('name'),
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