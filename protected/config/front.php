<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 8/20/14
 * Time: 4:56 PM
 */
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        // Put front-end settings there
        // (for example, url rules).
        'sourceLanguage' => '00',
        'language' => 'vi',
    )
);