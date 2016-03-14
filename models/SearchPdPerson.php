<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PdPerson;

/**
 * SearchPdPerson represents the model behind the search form about `app\models\PdPerson`.
 */
class SearchPdPerson extends PdPerson
{
    
     public $q;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age', 'hn'], 'integer'],
            [['code', 'name', 'tel', 'regdate', 'hn_y','q'], 'safe'],
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
        $query = PdPerson::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'age' => $this->age,
            'regdate' => $this->regdate,
            'hn' => $this->hn,
            'hn_y'=>$this->hn_y,
        ]);

        $query->orFilterWhere(['like', 'code', $this->q])
            ->orFilterWhere(['like', 'name', $this->q])
                ->orFilterWhere(['like', 'hn_y', $this->q])
            ->orFilterWhere(['like', 'tel', $this->q]);
           

        return $dataProvider;
    }
}
