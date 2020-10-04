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

    function create($data = [])
    {
        if (count($data) == 0) {
            return;
        }
        // auto gen values and fiels from a array
        $result = gen_insert_fields_form_array($data);

        $query = "insert into `{$this->table}`"
        . " ({$result->field_string}) "
        . "values ({$result->value_string})";
        try {
            $this->db->beginTransaction();
            $sth = $this->db->prepare($query);
            $sth->execute($result->bind_values);
            $insert_id = $this->db->lastInsertId();
            $this->db->commit();
            return $insert_id;
        } catch (PDOExecption $e) {
            $this->db->rollback();
            exit("Error!: " . $e->getMessage());
        }
    }

    // update a record by id
    function update($id, $data = [])
    {
        if (!$id || count($data) == 0) {
            return;
        }

        // auto gen values and fiels from a array
        $result = gen_update_fields_form_array($data);
        $query = "update `{$this->table}` set {$result->field_string}";

        try {
            $this->db->beginTransaction();
            $sth = $this->db->prepare($query);
            $sth->execute($result->bind_values);
            $this->db->commit();
            return true;
        } catch (PDOExecption $e) {
            $this->db->rollback();
            exit("Error!: " . $e->getMessage());
        }
        return false;
    }
}