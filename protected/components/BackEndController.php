<?php
/**
 * Created by PhpStorm.
 * User: Administrator PC
 * Date: 8/20/14
 * Time: 4:58 PM
 */
class BackEndController extends CController
{
    public $layout='column1';
    public $menu=array();
    public $breadcrumbs=array();

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'users'=>array('*'),
                'actions'=>array('login'),
            ),
            array('allow',
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
}