<?php

namespace frontend\modules\registration\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\registration\models\Register;

/**
 * RegisterSearch represents the model behind the search form of `frontend\modules\registration\models\Register`.
 */
class RegisterSearch extends Register
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sid'], 'integer'],
            [['cid'], 'safe'],
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
        $query = Register::find();

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
            'sid' => $this->sid,
        ]);

        $query->andFilterWhere(['like', 'cid', $this->cid]);

        return $dataProvider;
    }
}
