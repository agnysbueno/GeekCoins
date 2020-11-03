<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    function conexaoMysql(){
        $conexao = null;
        
        $server = "localhost";
        
        $user = "root";

        $password = "";

        $database = "geekcoins";

        $conexao = mysqli_connect($server, $user, $password, $database);

        return $conexao;
    }


?>