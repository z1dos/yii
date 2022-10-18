<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property int $id
 * @property string $date
 * @property string $text
 * @property int $id_user
 * @property int $id_theme
 *
 * @property Theme $theme
 * @property User $user
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['text', 'id_user', 'id_theme'], 'required'],
            [['text'], 'string'],
            [['id_user', 'id_theme'], 'integer'],
            [['id_theme'], 'exist', 'skipOnError' => true, 'targetClass' => Theme::class, 'targetAttribute' => ['id_theme' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'text' => 'Text',
            'id_user' => 'Id User',
            'id_theme' => 'Id Theme',
        ];
    }

    /**
     * Gets query for [[Theme]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTheme()
    {
        return $this->hasOne(Theme::class, ['id' => 'id_theme']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
