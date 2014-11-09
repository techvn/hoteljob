<?php

class MembersController extends Controller
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
                //'users' => array('admin'),
                'roles' => array('admin') // Call Yii::app()->user->checkAccess()
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
        $model = new Members;
        $locations = Locations::model()->findAll(
            array(
                /*'condition' => '`parent_id`=:parent_id',
                'params' => array(':parent_id' => Locations::LOCATION_VN),*/
                'order' => '`pos` ASC, `name` ASC',
                'index' => 'id'
            )
        );
        // Load group
        $memberGroup = MembersGroup::model()->findAll(
            array(
                'index' => 'id'
            )
        );
        // Load list how you know me
        $knowMe = KnowMe::model()->findAll(
            array(
                'order' => 'pos,id',
                'index' => 'id'
            )
        );
        // Load list security question
        $securityQues = SecurityQues::model()->findAll(
            array(
                'condition' => '`status`=:status',
                'params' => array(':status' => 1),
                'order' => 'pos,id',
                'index' => 'id'
            )
        );

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Members'])) {
            $model->attributes = $_POST['Members'];

            // Check member name exist
            $hasMember  = Members::model()->findAllByAttributes(array('uname' => $model->uname));
            if(count($hasMember) > 0) {
                $model->addError('uname', Yii::t('application', 'Username has been existed'));
            }

            $current_time = $model->birth;
            // Convert some data: birth
            if (count(preg_split('/\//', $model->attributes['birth'])) == 3) {
                if (Yii::app()->language == 'vi') {
                    list($day, $month, $year) = preg_split('/\//', $model->attributes['birth']);
                } else {
                    list ($month, $day, $year) = preg_split('/\//', $model->attributes['birth']);
                }
                $model->birth = $year . '-' . $month . '-' . $day;
            } else {
                if (empty($model->attributes['birth'])) {
                    $model->birth = date('Y-m-d');
                } else
                    // Add birth invalid
                    $model->addError('birth', Yii::t('member_attribute', 'Birthday invalid'));
            }
            // Add created time
            $model->created_time = date('Y-m-d');
            // Encode md5 password
            $model->pwd = md5($model->pwd);
            // Upload avatar
            $uploadedFile = CUploadedFile::getInstance($model, 'avatar');
            if (!empty($uploadedFile))
                $model->avatar = $uploadedFile;

            if (!$model->hasErrors()) {
                if ($model->save()) {
                    // Upload avatar
                    if (!empty($uploadedFile))
                        $uploadedFile->saveAs(Yii::getPathOfAlias('webroot') . Yii::app()->params['avatarDir'] . $uploadedFile);
                    $this->redirect(array('admin'));
                    //$this->redirect(array('view', 'id' => $model->id));
                }
            }

            /*echo '<pre>';
            print_r($model); die();*/
            // If has error, convert date to view
            $model->setAttribute('birth', $current_time);
        }

        $this->render('create', array(
            'model' => $model,
            'locations' => $locations,
            'memberGroup' => $memberGroup,
            'knowMe' => $knowMe,
            'securityQues' => $securityQues
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
        $model->birth = date(Yii::app()->language == 'vi' ? 'd/m/Y' : 'm/d/Y', strtotime($model->birth));
        //$model->pwd = '';

        $locations = Locations::model()->findAll(
            array(
                /*'condition' => '`parent_id`=:parent_id',
                'params' => array(':parent_id' => Locations::LOCATION_VN),*/
                'order' => '`pos` ASC, `name` ASC',
                'index' => 'id'
            )
        );
        // Load group
        $memberGroup = MembersGroup::model()->findAll(
            array(
                'index' => 'id'
            )
        );
        // Load list how you know me
        $knowMe = KnowMe::model()->findAll(
            array(
                'order' => 'pos,id',
                'index' => 'id'
            )
        );
        // Load list security question
        $securityQues = SecurityQues::model()->findAll(
            array(
                'condition' => '`status`=:status',
                'params' => array(':status' => 1),
                'order' => 'pos,id',
                'index' => 'id'
            )
        );

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Members'])) {
            $current_pass = $model->pwd;
            $model->attributes = $_POST['Members'];
            // Convert some data: birth
            if (count(preg_split('/\//', $model->attributes['birth'])) == 3) {
                if (Yii::app()->language == 'vi') {
                    list($day, $month, $year) = preg_split('/\//', $model->attributes['birth']);
                } else {
                    list ($month, $day, $year) = preg_split('/\//', $model->attributes['birth']);
                }
                $model->birth = $year . '-' . $month . '-' . $day;
            } else {
                if (empty($model->attributes['birth'])) {
                    $model->birth = date('Y-m-d');
                } else
                    // Add birth invalid
                    $model->addError('birth', Yii::t('member_attribute', 'Birthday invalid'));
            }
            // Add created time
            $model->created_time = date('Y-m-d');
            // Encode md5 password, if not enter new pass, we will take old pass of this member
            if (!empty($model->pwd)) {
                $model->pwd = md5($model->pwd);
            } else {
                $model->pwd = $current_pass;
            }
            // Upload avatar
            $uploadedFile = CUploadedFile::getInstance($model, 'avatar');
            if (!empty($uploadedFile))
                $model->avatar = $uploadedFile;

            if (!$model->hasErrors()) {
                if ($model->save()) {
                    // Upload avatar
                    if (!empty($uploadedFile))
                        $uploadedFile->saveAs(Yii::getPathOfAlias('webroot') . Yii::app()->params['avatarDir'] . $uploadedFile);

                    Yii::app()->user->setState('avatar', $model->avatar);
                    // Redirect page
                    $this->redirect(array('admin'));
                }
            }
        }

        // Empty password field
        $model->pwd = '';

        $this->render('update', array(
            'model' => $model,
            'locations' => $locations,
            'memberGroup' => $memberGroup,
            'knowMe' => $knowMe,
            'securityQues' => $securityQues,
            'update' => true
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
        // Load location
        $locations = Locations::model()->findAll();
        // Load group
        $memberGroup = MembersGroup::model()->findAll();
        // Load list how you know me
        $knowMe = KnowMe::model()->findAll();

        $dataProvider = new CActiveDataProvider('Members');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'locations' => $locations,
            'memberGroup' => $memberGroup,
            'knowMe' => $knowMe
        ));
    }

    public function actionData($id) {
        $model = $this->load($id);
        $country = Locations::model()->findAll(array(
            'condition' => '`parent_id`=0 OR `parent_id` IS NULL', 'order' => 'pos,name', 'index'=>'id'
        ));
        // Render html
        $this->renderPartial('data', array('model'=>$model, 'country'=>$country));
    }
    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $locations = Locations::model()->findAll(
            array(
                /*'condition' => '`parent_id`=:parent_id',
                'params' => array(':parent_id' => Locations::LOCATION_VN),*/
                'order' => '`pos` ASC, `name` ASC',
                'index' => 'id'
            )
        );
        // Load group
        $memberGroup = MembersGroup::model()->findAll(
            array(
                'index' => 'id'
            )
        );
        // Load list how you know me
        $knowMe = KnowMe::model()->findAll(
            array(
                'order' => 'pos,id',
                'index' => 'id'
            )
        );

        $model = new Members('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Members']))
            $model->attributes = $_GET['Members'];

        $this->render('admin', array(
            'model' => $model,
            'locations' => $locations,
            'memberGroup' => $memberGroup,
            'knowMe' => $knowMe
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Members the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Members::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Members $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'members-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
