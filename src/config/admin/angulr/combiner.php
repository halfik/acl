<?php
return array(
    #key is a skin name
    'default' => array(
        'js' => array(
            'backend'=>array(
                'paths'=>array(
                    array(
                        'combine' => true,
                        'tag' => 'back',
                        'path' =>  'packages/netinteractive/acl/aclCtrl.js',
                        'after' => 'main.js'
                    ),
                )
            )
        )
    )
);