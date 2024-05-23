<?php

class MainModel extends model
{
    public function getSimpleData()
    {
        $query = $this->db->prepare("Select * from users");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
}
