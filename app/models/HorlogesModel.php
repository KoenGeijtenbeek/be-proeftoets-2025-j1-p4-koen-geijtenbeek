<?php

class HorlogesModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllHorloges()
    {
        $sql = "SELECT HRLS.Id
                       ,HRLS.Merk
                       ,HRLS.Model
                       ,FORMAT(HRLS.Prijs, 0, 'de_DE') as Prijs

                FROM   Horloges as HRLS
                
                ORDER BY HRLS.Prijs DESC
                
                LIMIT 5";

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE 
                FROM Horloges
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Horloges (Merk, Model, Prijs)
                VALUES (:merk, :model, :prijs)";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_INT);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getHorlogeById($Id)
    {
        $sql = "SELECT  Id
                       ,Merk
                       ,Model
                       ,Prijs
                FROM   Horloges
                WHERE  Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $Id, PDO::PARAM_INT);
        return $this->db->single();
    }

}