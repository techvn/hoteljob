<?php

/**
 * This is the model class for table "tbl_news".
 *
 * The followings are the available columns in table 'tbl_news':
 * @property integer $id
 * @property string $title
 * @property string $brief
 * @property string $thumb
 * @property integer $organize_id
 * @property string $content
 * @property integer $status
 * @property string $created_time
 * @property string $public_time
 * @property string $unpublic_time
 * @property string $tag
 * @property integer $viewed
 * @property string $file
 * @property string $title_en
 * @property string $brief_en
 * @property string $content_en
 * @property string $tag_en
 * @property integer $news_category_id
 */
class BaseNews extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, news_category_id', 'required'),
			array('organize_id, status, viewed, news_category_id', 'numerical', 'integerOnly'=>true),
			array('title, file, title_en', 'length', 'max'=>100),
			array('brief, thumb, tag', 'length', 'max'=>255),
			array('brief_en, tag_en', 'length', 'max'=>225),
			array('content, created_time, public_time, unpublic_time, content_en', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, brief, thumb, organize_id, content, status, created_time, public_time, unpublic_time, tag, viewed, file, title_en, brief_en, content_en, tag_en, news_category_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'brief' => 'Brief',
			'thumb' => 'Thumb',
			'organize_id' => 'Organize',
			'content' => 'Content',
			'status' => 'Status',
			'created_time' => 'Created Time',
			'public_time' => 'Public Time',
			'unpublic_time' => 'Unpublic Time',
			'tag' => 'Tag',
			'viewed' => 'Viewed',
			'file' => 'File',
			'title_en' => 'Title En',
			'brief_en' => 'Brief En',
			'content_en' => 'Content En',
			'tag_en' => 'Tag En',
			'news_category_id' => 'News Category',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('brief',$this->brief,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('organize_id',$this->organize_id);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('public_time',$this->public_time,true);
		$criteria->compare('unpublic_time',$this->unpublic_time,true);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('viewed',$this->viewed);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('brief_en',$this->brief_en,true);
		$criteria->compare('content_en',$this->content_en,true);
		$criteria->compare('tag_en',$this->tag_en,true);
		$criteria->compare('news_category_id',$this->news_category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseNews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
