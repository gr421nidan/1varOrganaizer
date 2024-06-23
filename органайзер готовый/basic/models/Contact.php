<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $name
 * @property string|null $surname
 * @property string $address
 * @property string $tel
 *
 * @property Meet[] $meets
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'tel'], 'required'],
            [['name', 'surname'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 50],
            [['tel'], 'string', 'max' => 11, 'min' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя или Название',
            'surname' => 'Фамилия',
            'address' => 'Адресс',
            'tel' => 'Номер телефона',
        ];
    }

    /**
     * Gets query for [[Meets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeets()
    {
        return $this->hasMany(Meet::class, ['contact_id' => 'id']);
    }
}
