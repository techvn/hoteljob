<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 8/20/14
 * Time: 4:57 PM
 */
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        // Put back-end settings there.
        'sourceLanguage' => '00',
        'language' => 'vi',
        'components' => array(
            // ...
            'user' => array(
                'class' => 'WebUser',
            )
        ),
        'modules' => array(
            'elfinder'
        )
    )
);