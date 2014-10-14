<?php
/**
 * Created by PhpStorm.
 * User: binhnt
 * Date: 10/13/14
 * Time: 9:49 PM
 */
class Navigator extends CWidget {
    public $list = array();

    public function run() {
        return $this->render('Navigator');
    }
}
?>