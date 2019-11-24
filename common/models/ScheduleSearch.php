<?php

namespace billboardmanager\common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use billboardmanager\common\models\Schedule;

/**
 * ScheduleSearch represents the model behind the search form of `billboardmanager\common\models\Schedule`.
 */
class ScheduleSearch extends Schedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fkplaylist', 'fkzone', 'always'], 'integer'],
            [['start', 'end'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Schedule::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fkplaylist' => $this->fkplaylist,
            'fkzone' => $this->fkzone,
            'always' => $this->always,
            'start' => $this->start,
            'end' => $this->end,
        ]);

        return $dataProvider;
    }
}
