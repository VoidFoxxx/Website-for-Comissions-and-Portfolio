<?php

    class Commissions extends Database
    {
        private $db;

        public function __construct()
        {
            $this->db = $this->connect();
        }

        public function sendCommission($inputs)
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
                return true;
            }
            catch(PDOException $e)
            {
                echo($e->getMessage());
            }
        }
    }
?>