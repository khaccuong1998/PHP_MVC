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
    function update($a = [])
    {
        $query = "update `{$this->table}` set email= :email, name = :name, updated_at = :updated_at where id = :id";
        $sth = $this->db->prepare($query);
        $sth->execute([
            ':id' => $a[0],
            ':name' => $a[1],
            ':email' => $a[2],
            ':updated_at' => $a[3]
        ]);
        $sth->closeCursor();
        return 1;
    }
    function insert($a = [])
    {
        $query = "insert into `{$this->table}` (email, name) values (:email, :name)";
        $sth = $this->db->prepare($query);
        $sth->execute([
            ':name' => $a[0],
            ':email' => $a[1],
        ]);
        $sth->closeCursor();
        return 1;
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