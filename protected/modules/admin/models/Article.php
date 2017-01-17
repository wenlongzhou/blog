<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $md_content
 * @property string $path
 * @property integer $browse
 * @property string $update_time
 * @property integer $tag_id
 */
class Article extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
    public function rules(){
        return array(
            array('title,content,tag_id','required'),
            array('title', 'checktitle' ,'on'=>'create'),
        );
    }

	/**
	 * @return array relational rules.
	 */
    public function relations(){
        return array(
            'labels'=>array(self::BELONGS_TO,'Label','id')
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => '标题',
			'content' => '内容',
			'md_content' => 'Md Content',
			'path' => 'Path',
			'browse' => 'Browse',
			'update_time' => 'Update Time',
			'tag_id' => '标签',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('md_content',$this->md_content,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('browse',$this->browse);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('tag_id',$this->tag_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    public function checktitle($attribute,$params){
        $data = $this::model()->find('title=:t',array(':t'=>$_POST['Article']['title']));
        if($data){
            $this->addError($attribute,'该标题已存在！');
        }
    }

    public static function getArticleList(){
        $data = $user = Yii::app()->db->createCommand()
            ->select('a.*,l.value')
            ->from('article a')
            ->join('label l', 'a.tag_id=l.id')
            ->queryAll();
        return $data;
    }
}
