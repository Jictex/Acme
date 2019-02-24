<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property string $id
 * @property string $place_id
 * @property string $lat
 * @property string $lng
 * @property string $county_code
 * @property int $is_county
 *
 * @property PlaceLang[] $placeLangs
 * @property Trip[] $fromTrips
 * @property Trip[] $toTrips
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['place_id', 'lat', 'lng', 'county_code', 'is_county'], 'required'],
            [['is_county'], 'integer'],
            [['place_id', 'lat', 'lng'], 'string', 'max' => 45],
            [['county_code'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'place_id' => Yii::t('app', 'Place ID'),
            'lat' => Yii::t('app', 'Lat'),
            'lng' => Yii::t('app', 'Lng'),
            'county_code' => Yii::t('app', 'County Code'),
            'is_county' => Yii::t('app', 'Is County'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaceLangs()
    {
        return $this->hasMany(PlaceLang::className(), ['place_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromTrips()
    {
        return $this->hasMany(Trip::className(), ['from' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToTrips()
    {
        return $this->hasMany(Trip::className(), ['to' => 'id']);
    }
}
