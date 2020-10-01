<?php
class Base_Model extends Core_Model
{

    function find_all()
    {
        $query = "select * from `{$this->table}`";
        $sth = $this->db->prepare($query);
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $sth->closeCursor();
        return $data;
    }

    function find_by_id($id)
    {
        $query = "select * from `{$this->table}` where id = :id";
        $sth = $this->db->prepare($query);
        $sth->execute([
            ':id' => $id
        ]);
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        $sth->closeCursor();
        return $data;
    }
    function delete($id)
    {
        $query = "delete from `{$this->table}` where id = :id";
        $sth = $this->db->prepare($query);
        $sth->execute([
            ':id' => $id
        ]);
        $sth->closeCursor();
        return 1;
    }
}