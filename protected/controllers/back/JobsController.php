<?php

class JobsController extends Controller
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
        // ----------------
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
        $model = new Jobs;

        // Load list job type, major, time, salary ....
        $jobTypes = JobType::model()->findAll(array('index' => 'id'));
        $jobMajors = JobMajor::model()->findAll(array('index' => 'id'));
        $jobTimes = JobTimes::model()->findAll(array('index' => 'id'));
        $jobSalaries = JobSalary::model()->findAll(array('order' => 'id,type', 'index' => 'id'));
        $currencies = Currency::model()->findAll(array('index' => 'id'));
        $jobLevels = JobLevel::model()->findAll(
            array('index' => 'id')
        );
        $countries = Locations::model()->findAll(
            array(
                'order' => 'pos,name',
                'index' => 'id'
            )
        );

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Jobs'])) {
            $req = Yii::app()->request;
            $model->attributes = $_POST['Jobs'];
            // Load more attribute
            $model->setAttribute('created_time', Date('Y-m-d'));
            // Re-format end time
            if (count(preg_split('/\//', $model->getAttribute('end_time'))) == 3) {
                if (Yii::app()->language == 'vi') {
                    list($day, $month, $year) = preg_split('/\//', $model->getAttribute('end_time'));
                } else {
                    list ($month, $day, $year) = preg_split('/\//', $model->getAttribute('end_time'));
                }
                $model->setAttribute('end_time', $year . '-' . $month . '-' . $day);
            } else {
                if (empty($model->attributes['end_time'])) {
                    $model->setAttribute('end_time', date('Y-m-d'));
                } else {
                    // Add end time invalid
                    $model->addError('end_time', Yii::t('jobs', 'End time invalid'));
                }
            }
            $salary_data = $req->getPost('tb_salary');
            if (array_key_exists($salary_data, $jobSalaries)) {
                $model->setAttribute('salary_from', $jobSalaries[$salary_data]->from);
                $model->setAttribute('salary_type', $jobSalaries[$salary_data]->type);
            } else {
                // Load custom salary
                $model->setAttribute('salary_from', preg_replace('/[\.,]/', '', $req->getPost('salary_from')));
                $model->setAttribute('salary_to', preg_replace('/[\.,]/', '', $req->getPost('salary_to')));
                $model->setAttribute('salary_type', $req->getPost('ddl_currency'));
            }

            /* echo '<pre>';
             print_r($model->hasErrors());
             die();*/

            // Insert multi location of this job
            /*$builder = Yii::app()->db->schema->commandBuilder;
            $command = $builder->createMultipleInsertCommand(JobLocations::model()->tableSchema->rawName, $data);
            $command -> execute();*/

            if (!$model->hasErrors()) {
                if ($model->save()) {
                    // Insert multi location for this job
                    $work_locations = $req->getPost('ddl_location');
                    if (is_array($work_locations)) {
                        $sqlCommand = "INSERT IGNORE INTO " . JobLocations::model()->tableSchema->rawName . "(`jobs_id`, `locations_id`) VALUES";
                        $job_id = $model->id;
                        $comma = '';
                        foreach ($work_locations as $k => $w) {
                            $sqlCommand .= $comma . "($job_id, $w)";
                            $comma = ',';
                        }
                        $command = Yii::app()->db->createCommand($sqlCommand);
                        $command->execute();
                    }
                    $this->redirect(array('admin'));
                }
            }

            list($y, $m, $d) = preg_split('/-/', $model->end_time);
            $model->end_time = date($d . '/' . $m . '/' . $y);
        }

        $this->render('create', array(
            'model' => $model,
            'jobTypes' => $jobTypes,
            'jobTimes' => $jobTimes,
            'jobMajors' => $jobMajors,
            'jobSalaries' => $jobSalaries,
            'currencies' => $currencies,
            'jobLevels' => $jobLevels,
            'countries' => $countries
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
        // Change data view
        $model->end_time = date(Yii::app()->language == 'vi' ? 'd/m/Y' : 'm/d/Y', strtotime($model->end_time));

        // Load list job type, major, time, salary ....
        $jobTypes = JobType::model()->findAll(array('index' => 'id'));
        $jobMajors = JobMajor::model()->findAll(array('index' => 'id'));
        $jobTimes = JobTimes::model()->findAll(array('index' => 'id'));
        $jobSalaries = JobSalary::model()->findAll(array('order' => 'id,type', 'index' => 'id'));
        $currencies = Currency::model()->findAll(array('index' => 'id'));
        $jobLevels = JobLevel::model()->findAll(array('index' => 'id'));
        $countries = Locations::model()->findAll(
            array(
                'order' => 'pos,name',
                'index' => 'id'
            )
        );
        $jobLocations = JobLocations::model()->findAll(array(
            'condition' => '`jobs_id`=' . $model->id,
        ));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Jobs'])) {
            // Delete all current locations of this job
            $command = Yii::app()->db->createCommand("DELETE FROM " . JobLocations::model()->tableSchema->rawName
                . " WHERE `jobs_id`={$model->id}");
            $command->execute();

            $req = Yii::app()->request;
            $model->attributes = $_POST['Jobs'];

            // Load more attribute
            $model->setAttribute('created_time', Date('Y-m-d'));
            // Re-format end time
            if (count(preg_split('/\//', $model->getAttribute('end_time'))) == 3) {
                if (Yii::app()->language == 'vi') {
                    list($day, $month, $year) = preg_split('/\//', $model->getAttribute('end_time'));
                } else {
                    list ($month, $day, $year) = preg_split('/\//', $model->getAttribute('end_time'));
                }
                $model->setAttribute('end_time', $year . '-' . $month . '-' . $day);
            } else {
                if (empty($model->attributes['end_time'])) {
                    $model->setAttribute('end_time', date('Y-m-d'));
                } else {
                    // Add end time invalid
                    $model->addError('end_time', Yii::t('jobs', 'End time invalid'));
                }
            }
            $salary_data = $req->getPost('tb_salary');
            if (array_key_exists($salary_data, $jobSalaries)) { // Fix by template salary
                $model->setAttribute('salary_from', $jobSalaries[$salary_data]->from);
                $model->setAttribute('salary_to', $jobSalaries[$salary_data]->to);
                $model->setAttribute('salary_type', $jobSalaries[$salary_data]->type);
            } else {
                // Load custom salary
                $model->setAttribute('salary_from', $req->getPost('salary_from'));
                $model->setAttribute('salary_from', preg_replace('/[\.,]/', '', $req->getPost('salary_from')));
                $model->setAttribute('salary_to', preg_replace('/[\.,]/', '', $req->getPost('salary_to')));
            }

            if (!$model->hasErrors()) {
                if ($model->save()) {
                    // Insert multi location for this job
                    $work_locations = $req->getPost('ddl_location');
                    if (is_array($work_locations)) {
                        $sqlCommand = "INSERT IGNORE INTO " . JobLocations::model()->tableSchema->rawName . "(`jobs_id`, `locations_id`) VALUES";
                        $job_id = $model->id;
                        $comma = '';
                        foreach ($work_locations as $k => $w) {
                            $sqlCommand .= $comma . "($job_id, $w)";
                            $comma = ',';
                        }
                        $command = Yii::app()->db->createCommand($sqlCommand);
                        $command->execute();
                    }
                    $this->redirect(array('admin'));
                }
            }

            list($y, $m, $d) = preg_split('/-/', $model->end_time);
            $model->end_time = date($d . '/' . $m . '/' . $y);
        }

        $this->render('update', array(
            'model' => $model,
            'jobTypes' => $jobTypes,
            'jobTimes' => $jobTimes,
            'jobMajors' => $jobMajors,
            'jobSalaries' => $jobSalaries,
            'currencies' => $currencies,
            'jobLevels' => $jobLevels,
            'countries' => $countries,
            'jobLocations' => $jobLocations
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
        // ----------------
        $dataProvider = new CActiveDataProvider('Jobs');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Jobs('search');
        // Load list job type, major, time, salary ....
        $jobTypes = JobType::model()->findAll(array('index' => 'id'));
        $jobMajors = JobMajor::model()->findAll(array('index' => 'id'));
        $jobTimes = JobTimes::model()->findAll(array('index' => 'id'));
        $jobSalaries = JobSalary::model()->findAll(array('order' => 'id,type', 'index' => 'id'));
        $currencies = Currency::model()->findAll(array('index' => 'id'));
        $jobLevels = JobLevel::model()->findAll(array('index' => 'id'));

        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Jobs']))
            $model->attributes = $_GET['Jobs'];

        $this->render('admin', array(
            'model' => $model,
            'jobTypes' => $jobTypes,
            'jobTimes' => $jobTimes,
            'jobMajors' => $jobMajors,
            'jobSalaries' => $jobSalaries,
            'currencies' => $currencies,
            'jobLevels' => $jobLevels
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Jobs the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Jobs::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Jobs $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'jobs-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
