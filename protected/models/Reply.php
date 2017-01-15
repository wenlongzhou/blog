<?php

/**
 * This is the model class for table "reply".
 *
 * The followings are the available columns in table 'reply':
 * @property integer $id
 * @property string $nickname
 * @property string $img
 * @property string $content
 * @property integer $article_id
 * @property string $prev
 * @property string $create_time
 */
class Reply extends CActiveRecord
{
    public $captcha;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('captcha','captcha', 'message'=>'验证码错误！'),
			array('nickname, img, article_id', 'required'),
			array('article_id', 'numerical', 'integerOnly'=>true),
			array('nickname', 'length', 'max'=>50),
			array('img', 'length', 'max'=>255),
			array('prev', 'length', 'max'=>25),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nickname, img, content, article_id, prev, create_time', 'safe', 'on'=>'search'),
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
			'nickname' => 'Nickname',
			'img' => 'Img',
			'content' => 'Content',
			'article_id' => 'Article',
			'prev' => 'Prev',
			'create_time' => 'Create Time',
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
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('article_id',$this->article_id);
		$criteria->compare('prev',$this->prev,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reply the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getNickByPrev($p){
        $r = Reply::model()->findByPk($p);
        return $r->nickname;
    }

    public static function fieldMap($array,$map){
        foreach($array as $k => $v){
            if(in_array($k,$map)){
                $array[$map[$k]] = $v;
                unset($array[$k]);
            }
        }
        p($array);
        return $array;
    }
}
