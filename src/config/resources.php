<?php
return array(
    #Sample admin panel
    array(
        'name' => _('Panel Administracyjny 2'),
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