<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "like".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $object_type
 * @property string $object_name
 */
class Like extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'like';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'object_type', 'object_name'], 'required'],
            [['user_id'], 'integer'],
            [['object_type'], 'string', 'max' => 12],
            [['object_name'], 'string', 'max' => 255],
            [['object_type'], 'validateType'],
            [['user_id', 'object_type', 'object_name'], 'unique', 'targetAttribute' => ['user_id', 'object_type', 'object_name']],
        ];
    }

    public function validateType($attribute)
    {
        if (!in_array($this->$attribute, ['repository', 'contributor'])) {
            $this->addError($attribute, 'Wrong object type.');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'object_type' => 'Object Type',
            'object_name' => 'Object Name',
        ];
    }
}
