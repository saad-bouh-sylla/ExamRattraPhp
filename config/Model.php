<?php 
class Model {
    protected string $table;
    protected \PDO $pdo;
    public function __construct()
     {
       
         try {
            $this->pdo=new \PDO("mysql:host=localhost:3306;dbname=hospis_221",
            "root",
            "root");
         } catch (\Throwable $th) {
                  die("Erreur de Connexion");
           }
         
         
    }

    
    public function findAll():array{
        $sql="select * from $this->table" ;
       
        $stm= $this->pdo->query($sql);
        return $stm->fetchAll(\PDO::FETCH_CLASS,get_called_class());
    }

    public function findById(int $id):self{
    
    $sql="select * from $this->table where id=:x";
   
    $stm= $this->pdo->prepare($sql);
    $stm->setFetchMode(\PDO::FETCH_CLASS,get_called_class());
    $stm->execute(["x"=>$id]);
    return  $stm->fetch();
    }

    public function remove(int $id):int{
   
    $sql="delete from $this->table where id=:x";
    
    $stm= $this->pdo->prepare($sql);
    $stm->execute(["x"=>$id]);
    return  $stm->rowCount() ;
    }

  
}