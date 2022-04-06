<?php

class cnx{
    private $dns;
    private $user;
    private $password;
    private $conn;

// Realizamos la conexion
    function __construct()
    {
        $keys = $this->datoscnx();

        foreach($keys as $key => $value){
            $this->dns = $value['dns'];
            $this->user = $value['user'];
            $this->password = $value['password'];
        }

        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::MYSQL_ATTR_FOUND_ROWS => true
        );

        try{
            $this->conn = new PDO($this->dns,$this->user,$this->password, $opciones);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, );
            // if ($this->conn) {
            //     echo "Conexion Exitosa";
            // };
        }
        catch(PDOException $e){
            echo "PDO error ".$e->getMessage();
            die();
        }
    }

//Conectamos con el archivo config
    private function datoscnx(){
        $locfile = dirname(__FILE__);
        $jsondata = file_get_contents($locfile . "/" . "config" );
        return json_decode($jsondata, true);
    }

    
//Consulta de Datos

//Consulta de Datos con Procedimientos Alamcenados
    public function getDataPa($sql)
    {
        $data = array();
        $result = $this->conn->query($sql);    
        $err = $this->conn->errorInfo();

        if ($err[0] === '00000' || $err[0] === '01000') {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                array_push($data, $row);
            }
        }else{
            throw new Exception($err[2]);
        }
        return $data;

        // $row = $result->fetch(PDO::FETCH_ASSOC);
        // return $row;
        
    }
    



//Cerrar Conexion
    public function close()
    {
        $this->conn = null;
    }
 
}

?>