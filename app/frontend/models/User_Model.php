<?php

class User_Model extends Base_model
{
    protected $table = 'users';

    function check_mail($email)
    {
        $query = "select * from `{$this->table}` where email = :email";
        $sth = $this->db->prepare($query);
        $sth->execute([
            ':email' => $email
        ]);
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $sth->closeCursor();
        $check = count($data);
        if ($check > 0) return 1;
        else return 0;
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
    function add()
    {
        echo "add user";
    }
}