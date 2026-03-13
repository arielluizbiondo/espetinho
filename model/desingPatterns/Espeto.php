<?php
    
    require_once __DIR__ . '/../desingPatterns/Record.php';
    require_once __DIR__ . '/../desingPatterns/Transaction.php';

class Espeto extends Record{
    
    public function select($tableName){
        $conn = Transaction::get();
        $prepare = $conn->prepare("SELECT * FROM " . $tableName);
        $prepare->execute();
        return $prepare->fetchAll();
    }
    public function delete($id){
        $conn = Transaction::get();
        $prepare = $conn->prepare("DELETE FROM {$this->tableName} WHERE id = :id");
        return $prepare->execute([":id" => $id]);
    }
    public function insert($tableName) {
        $this->tableName = $tableName;
        unset($this->data['tableName']);
        $sql = "INSERT INTO {$tableName} (". implode(', ', array_keys($this->data)) .") 
        values(:".implode(", :", array_keys($this->data)).")";
        // var_dump($sql);
        // $sql = str_replace('tableName', '', $sql);
        
        $conn = Transaction::get();
        $prepare = $conn->prepare($sql);
        $prepare->execute($this->data);
    }
    public function selectById($idCadastroEspetinho)
    {
        $conn = Transaction::get();
        $sql = $conn->prepare("SELECT * FROM cadastroespetinho WHERE idCadastroEspetinho = :idCadastroEspetinho"); 
        $sql->bindParam(':idCadastroEspetinho', $idCadastroEspetinho);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function update(){
        $sql = "UPDATE {$this->tableName} set ";
        foreach(array_keys($this->data) as $dados){
            if($dados != 'id'){
                $sql .= " {$dados} = :{$dados}, ";
            }
        }
        $sql = rtrim($sql, ',');
        $sql .= " WHERE id = :id;";
        $conn = Transaction::get();
         $prepare = $conn->prepare($sql);
         return $prepare->execute($this->data);
    }
}

?>