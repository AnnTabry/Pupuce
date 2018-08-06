<?php
class DBConnect
{

    private $server = "mysql:host=localhost;dbname=pupuce";

    private $user = "root";

    private $pass = "Koal@1603";

    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    protected $con;

    /* Function for opening connection */
    public function openConnection()
    {
        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;
        } catch (PDOException $e) {
            echo "Petit probleme de connexion: " . $e->getMessage();
        }
    }

    /* Function for closing connection */
    public function closeConnection()
    {
        $this->con = null;
    }
}
?>