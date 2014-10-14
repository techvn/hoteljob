<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 10/13/14
 * Time: 7:35 PM
 */
class Menu extends CWidget {
    public $list = array();

    public function run() {
        $this->render('Menu');
    }
}