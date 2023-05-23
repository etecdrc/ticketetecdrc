<?php 
namespace App\Models;
use \PDO;
class DB 
{
    private $host = 'localhost';// Nome da Máquina ou IP do servidor de banco de dados 
    private $user = 'root';     // Nome de usuário de acesso ao servidor de banco de dados 
    private $pass = 'root';     // Senha de acesso do usuário de acesso ao servidor de banco de dados 
    private $dbname = 'ela'; // Nome do banco de dados 

    public function connect()
    {
        $conn_str = "mysql:host=$this->host;dbname=$this->dbname";  //String de conexão com o banco de dados
        $conn = new PDO($conn_str, $this->user, $this->pass);  //INstanciando um objeto de conexão ao banco de dados 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Trocando o modo de mensagem de erro 

        return $conn;  // Retornando a conexão com o banco para quem mandou chamar este método 
    }
}
