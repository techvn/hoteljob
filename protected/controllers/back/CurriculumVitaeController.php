<?php

class CurriculumVitaeController extends Controller
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
        // ----
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
        $model = new CurriculumVitae;
        $experience_model = new CurriculumvitaeExperienceWorking;
        $degree_model = new CurriculumvitaeDegree();
        $skillLanguage_model = new CurriculumvitaeSkillLanguage();
        $otherSkill_model = new CurriculumvitaeOtherSkill();
        $jobWish_model = new CurriculumvitaeJobWish();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        // Load list
        $members = Members::model()->findAll(array('order' => 'uname', 'index' => 'id'));
        $jobMajors = JobMajor::model()->findAll(
            array(
                'order' => (Yii::app()->language == 'vi' ? 'title' : 'title_en'),
                'index' => 'id'
            )
        );
        $jobTypes = JobType::model()->findAll(
            array(
                'order' => (Yii::app()->language == 'vi' ? 'title' : 'title_en'),
                'index' => 'id'
            )
        );
        $languageSkill = LanguageSkill::model()->findAll(array('index' => 'id'));
        $companyScopes = CompanyScope::model()->findAll(array('index' => 'id'));
        $skillLevel = SkillLevel::model()->findAll(array('index' => 'id'));
        $academic = Academic::model()->findAll(array('order' => 'pos,id', 'index' => 'id'));
        $curriculumPrivate = CurriculumPrivate::model()->findAll(array('index' => 'id'));
        $currency = Currency::model()->findAll(array('condition' => 'status=1', 'index' => 'id'));
        $jobLevels = JobLevel::model()->findAll(array('index' => 'id'));
        $locations = Locations::model()->findAll(
            array(
                //'condition' => 'parent_id=1',
                'order' => 'pos,name',
                'index' => 'id'
            )
        );
        /*$jobWish = CurriculumvitaeJobWish::model()->findAll(
            array('order' => 'id', 'index' => 'id')
        );*/
        $current_languages = [];
        $current_jobwishes = [];
        $current_degrees = [];
        $current_experiences = [];

        if (isset($_POST['CurriculumVitae'])) {
            $model->attributes = $_POST['CurriculumVitae'];
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('create', array(
            'model' => $model,
            'members' => $members,
            'model_experience' => $experience_model,
            'model_degree' => $degree_model,
            'model_skillLanguage' => $skillLanguage_model,
            'model_otherSkill' => $otherSkill_model,
            'model_jobWish' => $jobWish_model,
            // List data templates
            'jobTypes' => $jobTypes,
            'jobMajors' => $jobMajors,
            'languageSkill' => $languageSkill,
            'companyScopes' => $companyScopes,
            'skillLevel' => $skillLevel,
            'academic' => $academic,
            'curriculumPrivate' => $curriculumPrivate,
            'currency' => $currency,
            'jobLevels' => $jobLevels,
            'locations' => $locations,
            // Current data
            'current_languages' => $current_languages,
            'current_jobwishes' => $current_jobwishes,
            'current_degrees' => $current_degrees,
            'current_experiences' => $current_experiences
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

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CurriculumVitae'])) {
            $model->attributes = $_POST['CurriculumVitae'];
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('update', array(
            'model' => $model,
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
        // ------------------
        $dataProvider = new CActiveDataProvider('CurriculumVitae');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new CurriculumVitae('search');
        // Load list
        $members = Members::model()->findAll(array('order' => 'uname', 'index' => 'id'));
        $jobMajors = JobMajor::model()->findAll(
            array(
                'order' => (Yii::app()->language == 'vi' ? 'title' : 'title_en'),
                'index' => 'id'
            )
        );
        $jobTypes = JobType::model()->findAll(
            array(
                'order' => (Yii::app()->language == 'vi' ? 'title' : 'title_en'),
                'index' => 'id'
            )
        );

        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['CurriculumVitae']))
            $model->attributes = $_GET['CurriculumVitae'];

        $this->render('admin', array(
            'model' => $model, 'members' => $members, 'jobMajors' => $jobMajors, 'jobTypes' => $jobTypes
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return CurriculumVitae the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = CurriculumVitae::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CurriculumVitae $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'curriculum-vitae-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
