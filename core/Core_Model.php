<?php

class Core_Model
{

    protected $db;

    function __construct()
    {
        $this->conecctDB();
    }

    function conecctDB()
    {
        $database_path = BASE_PATH . '/config/database.php';

        if (!file_exists($database_path)) {
            exit("File database not found $database_path");
        }

        $config = require($database_path);

        $host = $config['host'];
        $user = $config['user'];
        $password = $config['password'];
        $dbname = $config['dbname'];

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->exec("set names utf8");
        } catch (Exception $e) {
            exit("Conncettion fail: " . $e->getMessage());
        }
    }
}