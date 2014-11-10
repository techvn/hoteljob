<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 11/10/14
 * Time: 4:18 PM
 */
class Menu extends CWidget {
    public $list = array();

    public function run() {
        $this->render('Menu', array(
            'menu' => $this->list
        ));
    }
}