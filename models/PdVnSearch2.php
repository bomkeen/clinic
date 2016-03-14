<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PdVn;

/**
 * PdVnSearch represents the model behind the search form about `app\models\PdVn`.
 */
class PdVnSearch2 extends PdVn
{
  public $q;
    /**
     * 
     * 
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['code', 'name', 'tel', 'today', 'time', 'pttype', 'price', 'hn', 'hn_y','q'], 'safe'],
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
            'today' => $this->today,
            'time' => $this->time,
        ]);

        $query->orFilterWhere(['like', 'name', $this->q])
            ->orFilterWhere(['like', 'tel', $this->q])
            ->orFilterWhere(['like', 'hn', $this->q]);
           

        return $dataProvider;
    }
}
