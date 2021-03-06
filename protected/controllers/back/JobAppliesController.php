<?php

class JobAppliesController extends Controller
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
        // ------------
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
        $model = new JobApplies;
        $members = Members::model()->findAll(array('index' => 'id'));
        $jobs = Jobs::model()->findAll(array('select' => 'id,title,title_en', 'index' => 'id'));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['JobApplies'])) {
            $model->attributes = $_POST['JobApplies'];
            $current_time = $model->applied_time;
            // Convert some data: applied time
            if (count(preg_split('/\//', $model->attributes['applied_time'])) == 3) {
                if (Yii::app()->language == 'vi') {
                    list($day, $month, $year) = preg_split('/\//', $model->attributes['applied_time']);
                } else {
                    list ($month, $day, $year) = preg_split('/\//', $model->attributes['applied_time']);
                }
                $model->applied_time = $year . '-' . $month . '-' . $day;
            } else {
                if (empty($model->attributes['applied_time'])) {
                    $model->applied_time = date('Y-m-d');
                } else
                    // Add birth invalid
                    $model->addError('applied_time', Yii::t('jobs', 'Format date not validated!'));
            }
            // Validate email
            if (!filter_var($model->email, FILTER_VALIDATE_EMAIL)) {
                $model->addError('email', Yii::t('application', 'Invalid email!'));
            }

            // Upload logo
            $uploadedFile = CUploadedFile::getInstance($model, 'cv_link');
            $model->cv_link = $uploadedFile;

            if (!$model->hasErrors()) {
                if ($model->save()) {
                    $uploadedFile->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/files/' . $uploadedFile);
                    $this->redirect(array('admin'));
                }
            }
            // If has error, convert date to view
            $model->setAttribute('applied_time', $current_time);
        }

        $this->render('create', array(
            'model' => $model, 'members' => $members, 'jobs' => $jobs
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
        $members = Members::model()->findAll(array('index' => 'id'));
        // Change data view
        $model->applied_time = date(Yii::app()->language == 'vi' ? 'd/m/Y' : 'm/d/Y', strtotime($model->applied_time));

        $jobs = Jobs::model()->findAll(array('select' => 'id,title,title_en', 'index' => 'id'));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['JobApplies'])) {
            $model->attributes = $_POST['JobApplies'];
            $current_time = $model->applied_time;
            // Convert some data: applied time
            if (count(preg_split('/\//', $model->attributes['applied_time'])) == 3) {
                if (Yii::app()->language == 'vi') {
                    list($day, $month, $year) = preg_split('/\//', $model->attributes['applied_time']);
                } else {
                    list ($month, $day, $year) = preg_split('/\//', $model->attributes['applied_time']);
                }
                $model->applied_time = $year . '-' . $month . '-' . $day;
            } else {
                if (empty($model->attributes['applied_time'])) {
                    $model->applied_time = date('Y-m-d');
                } else
                    // Add birth invalid
                    $model->addError('applied_time', Yii::t('jobs', 'Format date not validated!'));
            }
            // Validate email
            if (!filter_var($model->email, FILTER_VALIDATE_EMAIL)) {
                $model->addError('email', Yii::t('application', 'Invalid email!'));
            }

            // Upload logo
            $uploadedFile = CUploadedFile::getInstance($model, 'cv_link');
            if (!empty($uploadedFile))
                $model->cv_link = $uploadedFile;

            if (!$model->hasErrors()) {
                if ($model->save()) {
                    if (!empty($uploadedFile))
                        $uploadedFile->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/files/' . $uploadedFile);
                    $this->redirect(array('admin'));
                }
            }
            // If has error, convert date to view
            $model->setAttribute('applied_time', $current_time);
        }

        $this->render('update', array(
            'model' => $model, 'members' => $members, 'jobs' => $jobs
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
        $dataProvider = new CActiveDataProvider('JobApplies');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new JobApplies('search');
        $members = Members::model()->findAll(array('index' => 'id'));
        $jobs = Jobs::model()->findAll(array('select' => 'id,title,title_en', 'index' => 'id'));

        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['JobApplies']))
            $model->attributes = $_GET['JobApplies'];

        $this->render('admin', array(
            'model' => $model, 'members' => $members, 'jobs' => $jobs
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return JobApplies the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = JobApplies::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param JobApplies $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'job-applies-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
