<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PdVn;

/**
 * PdVnSearch represents the model behind the search form about `app\models\PdVn`.
 */
class PdVnSearch extends PdVn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['code', 'name', 'tel', 'today', 'time', 'pttype', 'price', 'hn', 'hn_y'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = PdVn::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
$thisday=  date("Y-m-d");
        $query->andFilterWhere([
            'id' => $this->id,
            'today' => $thisday,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'pttype', $this->pttype])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'hn_y', $this->hn_y]);

        return $dataProvider;
    }
}
