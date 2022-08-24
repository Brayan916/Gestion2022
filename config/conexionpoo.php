<?php
require_once 'conf.php';
class Conectar
{
    public $_bd;

 function __construct() {
        $this->_bd=new mysqli(server,user,pass,bd);
        

        if ($this->_bd->connect_errno){

            echo "fallo a conectar".$this->_bd->connect_errno;
            return;
        }
       

    }

}