<?php
class DB{

    private $host = '91.216.107.248';
    private $username = 'weeno661594';
    private $password = 'cosmeticbio';
    private $database = 'weeno661594';
    public $db;

    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
        if ($host != null)
        {
          $this->host = $host;
          $this->username = $username;
          $this->password = $password;
          $this->database = $database;
        }
        try
        {
            $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username,
            $this->password, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            ));
        }
        catch(PDOException $e)
        {
          die('<h1>Impossible de se connecter a la base de donnee</h1>');
        }
    }

    public function getBdd()
    {
        return $this->db;
    }

    public function requete($sql)
    {
        $req =$this->db->prepare($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function insert($sql)
    {
        $req =$this->db->prepare($sql);
        $req->execute();
        //return $req->fetch(PDO::FETCH_OBJ);
    }

    public function delete($sql)
    {
        $req =$this->db->prepare($sql);
        $req->execute();
        //return $req->fetch(PDO::FETCH_OBJ);
    }

    public function query($sql, $data = array())
    {
        $req =$this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}
