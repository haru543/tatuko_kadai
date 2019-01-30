<?php


class Model{
    private $params;
    private $tableName;

    public function __construct($tableName, $data){
        //ここの2つで$paramsと$tableNameに、フォームから飛んで来た
        // 値が代入される（privateで書いてある部分)
        // register.phpのnew Model()の()の中に書いたデータが
        // そのままparams,tableNameにそれぞれ代入される
        // そうすることで、store関数の中で、paramsやtableNameの中のデータを実際に
        // 使えるようにする
        $this->params = $data;
        $this->tableName = $tableName;
    }

    public function store(){

        $cols   = array_keys($this->params);//配列のkeyを取得 classname,capacity
        $values = array_values($this->params);//配列のvalueを取得 dev11,50
        
        $sql = implode(' ', [
            'INSERT INTO',
            quote_sql($this->tableName),
            '('.implode(', ', array_map('quote_sql', $cols)).')',
            'VALUES',
            '('.implode(', ', array_pad([], count($values), '?')).')',
        ]);

        $pdo = db();
        $prepare = $pdo->prepare($sql);
        $result = $prepare->execute($values);

        if (!$result) {
            echo "エラー";
            exit();
        }
        return db()->lastInsertId('id');
    }

}

?>