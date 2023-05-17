<?php


// "localhost"
// "root"
// "1191997"
// "student"
//  student_data


class Database{
       private string $DB_HOST;
       private string $DB_USER;
       private string $DB_PASSWORD;
       private string $DB_DATABASE;
    
      public function __construct(string $DB_HOST,string $DB_USER,string $DB_PASSWORD,string $DB_DATABASE){
        $this->DB_HOST = $DB_HOST ;
        $this->DB_USER = $DB_USER;
        $this->DB_PASSWORD = $DB_PASSWORD ;
        $this->DB_DATABASE = $DB_DATABASE;
       }
      public function connect_to_db(){

        try {
            $dsn ="mysql:dbname=$this->DB_DATABASE;host=127.0.0.1;port=3306;";
            $db = new PDO($dsn, $this->DB_USER, $this->DB_PASSWORD );
             return $db;
    
            } catch (Exception $e){
                    echo $e->getMessage();
        }
       }
       
      public function insert($tablename,$Name,$email,$password,$image)
        {
            if($this->connect_to_db()){
                $db=$this->connect_to_db();
                $query="Insert INTO `{$tablename}` (`name`, `email`,`password`,`image`) Values(:name,:email,:password,:image)";
                $stmt=$db->prepare($query);
                $stmt->bindParam(":name", $Name, PDO::PARAM_STR);
                $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                $stmt->bindParam(":password", $password, PDO::PARAM_STR);
                $stmt->bindParam(":image", $image, PDO::PARAM_STR);
                $stmt->execute();
                var_dump($stmt->rowCount());
                var_dump($db->lastInsertId());  
            }
        
        }

     public function update($tablename,$id,$Name,$email,$password,$image)
      {
        $db=$this->connect_to_db();
        $update_query="UPDATE `{$tablename}`
        SET `name` = :name,
            `email` = :email,
            `password` = :password,
            `image` = :image WHERE `id`=:id ";
        $stmt = $db->prepare($update_query);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":name", $Name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->bindParam(":image", $image, PDO::PARAM_STR);
        $stmt->execute(); 
      }

       public function delete($tablename,$id)
        {
            $db=$this->connect_to_db();
            $query="DELETE FROM  `{$tablename}` WHERE `id`=:id ";
            $stmt = $db->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->execute(); 
        }


       public function select($tablename)
        {
            $db=$this->connect_to_db();
            $query = "select * from `{$tablename}`";
            $select_stmt = $db->prepare($query);
            $res=$select_stmt->execute();
            $data = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $data;
        }











    }



    


    //  $p = new Database("localhost","root","1191997","student");


    //   $p->delete("student_data","11");

    //  $x = $p->connect_to_db();
    //  var_dump($x);





















