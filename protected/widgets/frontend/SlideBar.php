<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 11/10/14
 * Time: 3:40 PM
 */
class SlideBar extends CWidget {
    public $list = array();

    public function run() {
        $this->render('slidebar', array(
            'banners' => $this->list
        ));
    }
}