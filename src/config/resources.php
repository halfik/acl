<?php
return array(
    #Panel Admninistracyjny
    array(
        'name' => _('Panel Administracyjny'),
        'value' =>'DashboardsController',
        'roles' => array('admin'),
        'childs'=>array(
            array(
                'name'=> _('Dostęp'),
                'value' => 'DashboardController@index'
            ),
        )
    ),
);