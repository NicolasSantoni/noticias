<?php
/**
* Classe responsável pela conexão no banco de dados.
* @author Nicolas Jimenez Santoni <nicolas-jsantoni@educar.rs.gov.br>
* @version 1.0
* @copyright (c) 2020, Nicolas Jimenez Santoni CIMOL
* @access public
* @package NicolasJS63-B
* @subpackage Conexao
* @example Classe conexao.
*/
class Conexao {
    /**
    * Váriavel usada na conexão do banco de dados
    * @access public
    * @name $instance
    */
    public static $instance;
    /**
    * Função que realiza a conexão no banco de dados
    * @access public
    * @return self::$instance
    */
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance =new PDO(SGBD.":host=".HOST_DB.";dbname=".DB."",USER_DB,PASS_DB);
        }
        return  self::$instance;
    }
}
