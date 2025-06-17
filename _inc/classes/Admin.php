<?php

    class Admin extends Database
    {
        private $db;

        public function __construct()
        {
            $this->db = $this->connect();
        }

        public function getTables()
        {
            try
            {
                
                $query =  $this->db->query("SHOW TABLES");
                $tables = $query->fetchAll(PDO::FETCH_COLUMN);
                return $tables;
            }
            catch(PDOException $e)
            {
                echo($e->getMessage());
            }
        }
        public function getTableData($table)
        {
            try
            {
                $query =  $this->db->query("SELECT * FROM $table");
                $tableData = $query->fetchAll(PDO::FETCH_ASSOC);
                return $tableData;
            }
            catch(PDOException $e)
            {
                echo($e->getMessage());
            }
        }

        public function addNewRow($inputs)
        {
            try
            {
                $table = $inputs["table"];
                unset($inputs["table"]);
                $sql = "INSERT INTO $table (";
    
                foreach($inputs as $key => $value)
                {
                    $sql .= $key."," ;
                }

                $sql = substr($sql,0,strlen($sql)-1);
                $sql .= ")" ;
                $sql .= " VALUES (" ;

                foreach($inputs as $key => $value)
                {
                    $sql .= ":".$key."," ;
                }
                $sql = substr($sql,0,strlen($sql)-1);
                $sql .= ")" ;

                $query_run = $this->db->prepare($sql);
                $query_run->execute($inputs);
            }
            catch(PDOException $e)
            {
                echo($e->getMessage());
            }
        }

        public function deleteRow($id,$table)
        {
            try
            {
                $query =  $this->db->query("DELETE FROM $table WHERE id = $id");
                return true;
            }
            catch(PDOException $e)
            {
                echo($e->getMessage());
            }
        }

        public function editRow($data)
        {
            try
            {
                $table = $data["table"];
                $id = $data["editId"];
                $sql = "UPDATE $table SET ";
                foreach($data as $key => $value)
                {
                    if ($key != "table" && $key != "editId")
                    {
                        if($value == null){
                            unset($data[$key]);
                        }else{
                            $sql .= $key." = :".$key.",";
                        }
                    }
                }
                $sql = substr($sql,0,strlen($sql)-1);
                $sql .= " WHERE id = $id";
                echo($sql);
                $query_run = $this->db->prepare($sql);
                unset($data["table"]);
                unset($data["editId"]);
                $query_run->execute($data);
            }
            catch(PDOException $e)
            {
                echo($e->getMessage());
            }
        }
        public function addNewComm($inputs)
        {
            try
            {
                $data = array(
                    'type' => $inputs["type"],
                    'description' => $inputs["description"],
                    'complexity' => $inputs["complexity"],
                    'animation' => $inputs["animation"],
                    'texture' => $inputs["texture"],
                    'bumpmap' => $inputs["bumpmap"],
                    'skeleton' => $inputs["skeleton"],
                    'user_id' => $inputs["user_id"],
                );

                $query = "INSERT INTO commissions (user_id, type, description, complexity, animation, texture, bumpmap, skeleton) VALUES (:user_id, :type, :description, :complexity, :animation, :texture, :bumpmap, :skeleton)";
                $query_run = $this->db->prepare($query);
                $query_run->execute($data);
            }
            catch(PDOException $e)
            {
                echo($e->getMessage());
            }
        }
    }
?>