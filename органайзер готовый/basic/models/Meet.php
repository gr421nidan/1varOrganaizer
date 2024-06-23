<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meet".
 *
 * @property int $id
 * @property string $username
 * @property int $contact_id
 * @property string $date
 * @property string $description
 * @property string $name
 *
 * @property Contact $contact
 * @property User $username0
 */
class Meet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'contact_id', 'description', 'name'], 'required'],
            [['contact_id'], 'integer'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['username'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 50],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::class, 'targetAttribute' => ['contact_id' => 'id']],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['username' => 'username']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Руководитель',
            'contact_id' => 'Контакт',
            'date' => 'Дата и время',
            'description' => 'Описание',
            'name' => 'Название',
        ];
    }

    /**
     * Gets query for [[Contact]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contact::class, ['id' => 'contact_id']);
    }

    /**
     * Gets query for [[Username0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsername0()
    {
        return $this->hasOne(User::class, ['username' => 'username']);
    }
}
