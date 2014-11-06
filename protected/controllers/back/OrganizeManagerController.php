<?php

class OrganizeManagerController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->redirect(array('admin'));
        // ---------
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new OrganizeData;
        // Load members
        $members = Members::model()->findAll(array('order' => 'uname', 'index' => 'id'));
        $scopes = CompanyScope::model()->findAll();
        $locations = Locations::model()->findAll(array('index' => 'id', 'order' => 'pos,name'));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['OrganizeData'])) {
            $model->attributes = $_POST['OrganizeData'];
            // Add some data
            $model->setAttribute('created_time', date('Y-m-d H:i:s'));

            $current_time = $model->ended_time;
            if (count(preg_split('/\//', $model->ended_time)) == 3) {
                if (Yii::app()->language == 'vi') {
                    list($day, $month, $year) = preg_split('/\//', $model->ended_time);
                } else {
                    list ($month, $day, $year) = preg_split('/\//', $model->ended_time);
                }
                $model->setAttribute('ended_time', $year . '-' . $month . '-' . $day);
            } else {
                if (empty($model->ended_time)) {
                    $model->setAttribute('ended_time', date('Y-m-d'));
                } else
                    // Add birth invalid
                    $model->addError('ended_time', Yii::t('jobs', 'Format date not validated!'));
            }

            // Init instance of logo object
            $uploadedFile = CUploadedFile::getInstance($model, 'logo');
            if (!empty($uploadedFile))
                $model->logo = $uploadedFile;

            if (!$model->hasErrors()) {
                if ($model->save()) {
                    if (!empty($uploadedFile)) // Upload logo
                        $uploadedFile->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/logo/' . $uploadedFile);
                    $this->redirect(array('admin'));
                }
            }
            // ----------
            $model->setAttribute('ended_time', $current_time);
        }

        $this->render('create', array(
            'model' => $model, 'members' => $members, 'scopes' => $scopes, 'locations' => $locations
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        if($model->ended_time == '000-00-00 00:00:00') {
            $model->setAttribute('ended_time', '');
        } else {
            $model->setAttribute('ended_time', date(Yii::app()->language == 'vi' ? 'd/m/Y' : 'm/d/Y', strtotime($model->ended_time)));
        }
        // Load members
        $members = Members::model()->findAll(array('order' => 'uname', 'index' => 'id'));
        $scopes = CompanyScope::model()->findAll();
        $locations = Locations::model()->findAll(array('index' => 'id', 'order' => 'pos,name'));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['OrganizeData'])) {
            $model->attributes = $_POST['OrganizeData'];
            // Add some data
            $model->setAttribute('created_time', date('Y-m-d H:i:s'));

            $current_time = $model->ended_time;
            if (count(preg_split('/\//', $model->ended_time)) == 3) {
                if (Yii::app()->language == 'vi') {
                    list($day, $month, $year) = preg_split('/\//', $model->ended_time);
                } else {
                    list ($month, $day, $year) = preg_split('/\//', $model->ended_time);
                }
                $model->setAttribute('ended_time', $year . '-' . $month . '-' . $day);
            } else {
                if (empty($model->ended_time)) {
                    $model->setAttribute('ended_time', date('Y-m-d'));
                } else
                    // Add birth invalid
                    $model->addError('ended_time', Yii::t('jobs', 'Format date not validated!'));
            }

            // Init instance of logo object
            $uploadedFile = CUploadedFile::getInstance($model, 'logo');
            if (!empty($uploadedFile))
                $model->logo = $uploadedFile;

            if (!$model->hasErrors()) {
                if ($model->save()) {
                    if (!empty($uploadedFile)) // Upload logo
                        $uploadedFile->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/logo/' . $uploadedFile);
                    $this->redirect(array('admin'));
                }
            }
            // ----------
            $model->setAttribute('ended_time', $current_time);
        }

        $this->render('update', array(
            'model' => $model, 'members' => $members, 'scopes' => $scopes, 'locations' => $locations
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $this->redirect(array('admin'));
        // ----------
        $dataProvider = new CActiveDataProvider('OrganizeData');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new OrganizeData('search');
        // Load members
        $members = Members::model()->findAll(array('order' => 'uname', 'index' => 'id'));

        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['OrganizeData']))
            $model->attributes = $_GET['OrganizeData'];

        $this->render('admin', array(
            'model' => $model, 'members' => $members
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return OrganizeData the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = OrganizeData::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param OrganizeData $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'organize-data-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
