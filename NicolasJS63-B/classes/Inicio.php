<?php
/**
* Classe responsável pela inicialização da página.
* @author Nicolas Jimenez Santoni <nicolas-jsantoni@educar.rs.gov.br>
* @version 1.0
* @copyright (c) 2020, Nicolas Jimenez Santoni CIMOL
* @access public
* @package NicolasJS63-B
* @subpackage Inicio
* @example Classe inicio.
*/
class Inicio{
    /**
    * Função que envia o usúario para a página inicial
    * @access public
    */
    public function index(){
        include HOME_DIR."view/paginas/home.php";
    }
}

?>
