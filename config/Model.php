<?php 
class Model {
    protected string $table;
    protected \PDO $pdo;
    public function __construct()
     {
        //1.Connecter au SGBD
         // 2.Choisir la base de Travail
         //3306 => port de Mysql sur Windows
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
        //query ==> requete sans parametres
        $stm= $this->pdo->query($sql);
        return $stm->fetchAll(\PDO::FETCH_CLASS,get_called_class());
    }

    public function findById(int $id):self{
    //$sql="select * from categorie where id=$id" ;Jamais
    $sql="select * from $this->table where id=:x";//Requete preparee
    //prepare ==> requete avec parametres
    $stm= $this->pdo->prepare($sql);
    $stm->setFetchMode(\PDO::FETCH_CLASS,get_called_class());
    $stm->execute(["x"=>$id]);
    return  $stm->fetch();
    }

    public function remove(int $id):int{
    //$sql="select * from categorie where id=$id" ;Jamais
    $sql="delete from $this->table where id=:x";//Requete preparee
    //prepare ==> requete avec parametres
    $stm= $this->pdo->prepare($sql);
    $stm->execute(["x"=>$id]);
    return  $stm->rowCount() ;
    }

  
}