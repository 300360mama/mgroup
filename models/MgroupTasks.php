<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "mgroup_tasks".
 *
 * @property integer $id
 * @property string $text_task
 * @property string $date
 * @property string $time
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 */
class MgroupTasks extends ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mgroup_tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text_task', 'date_task',  'user_id', ], 'required'],
            [['date_task'], 'safe'],
            [['user_id'], 'integer'],
            [['text_task'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'text_task' => 'Заполните форму',
            'date_task' => 'Дата',

        ];
    }
}
