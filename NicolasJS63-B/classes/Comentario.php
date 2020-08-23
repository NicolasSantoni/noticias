<?php
/**
* Classe responsável pela gestão de comentários, os criando e deletando no banco de dados.
* @author Nicolas Jimenez Santoni <nicolas-jsantoni@educar.rs.gov.br>
* @version 1.0
* @copyright (c) 2020, Nicolas Jimenez Santoni CIMOL
* @access public
* @package NicolasJS63-B
* @subpackage Comentario
* @example Classe comentario.
*/
class Comentario{
    /**
    * Váriavel que recebe id da tabela comentario do banco de dados.
    * @access private
    * @name $id
    */
    private $id;
    /**
    * Váriavel que recebe comentario da tabela comentario do banco de dados.
    * @access private
    * @name $comentario
    */
    private $comentario;
    /**
    * Váriavel que recebe data da tabela comentario do banco de dados.
    * @access private
    * @name $data
    */
    private $data;
    /**
    * Váriavel que recebe noticia_id da tabela comentario do banco de dados.
    * @access private
    * @name $noticia
    */
    private $noticia;
    /**
    * Váriavel que recebe usuario_id da tabela comentario do banco de dados.
    * @access private
    * @name $usuario
    */
    private $usuario;
    /**
    * Função para setar o campo id
    * @access public
    * @param int $id
    */
    public function setId($id){
        $this->id=$id;
    }
    /**
    * Função para obter o campo id
    * @access public
    * @return $this->id
    */
    public function getId(){
        return $this->id;
    }
    /**
    * Função para setar o campo comentario
    * @access public
    * @param String $comentario
    */
    public function setComentario($comentario){
        $this->comentario=$comentario;
    }
    /**
    * Função para obter o campo comentario
    * @access public
    * @return $this->comentario
    */
    public function getComentario(){
        return $this->comentario;
    }
    /**
    * Função para setar o campo data
    * @access public
    * @param date $data
    */
    public function setData($data){
        $this->data=$data;
    }
    /**
    * Função para obter o campo data
    * @access public
    * @return $this->data
    */
    public function getData(){
        return $this->data;
    }
    /**
    * Função para setar o campo noticia_id
    * @access public
    * @param int $noticia
    */
    public function setNoticia($noticia){
        $this->noticia=$noticia;
    }
    /**
    * Função para obter o campo noticia_id
    * @access public
    * @return $this->noticia
    */
    public function getNoticia(){
        return $this->noticia;
    }
    /**
    * Função para setar o campo usuario_id
    * @access public
    * @param int $usuario
    */
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    /**
    * Função para obter o campo usuario_id
    * @access public
    * @return $this->usuario
    */
    public function getUsuario(){
        return $this->usuario;
    }
    /**
    * Função para salvar um comentario na tabela
    * @access public
    * @param int $noticia_id
    * @param String $comentario
    * @param int $usuario_id
    */
    public function salvar($noticia_id, $comentario, $usuario_id){
        $conexao = Conexao::getInstance();
        $sql = 'INSERT INTO comentario (comentario, data, noticia_id, usuario_id) VALUES("'.$comentario.'","'.date('Y/m/d').'","'.$noticia_id.'","'.$usuario_id.'")';
        if ($conexao->query($sql)){
            return true;
        }
        else {
            return false;
        }
    }
    /**
    * Função para deletar um comentario na tabela
    * @access public
    * @param int $id
    */
    public function deletar($id){
      $conexao = Conexao::getInstance();
      $sql = 'DELETE FROM comentario WHERE id='.$id;
      if ($conexao->query($sql)){
        echo "<script>alert('Comentário deletado!');</script>";
        header("location:".HOME_URI."noticia");
      }
      else{
        echo "<script>alert('Ocorreu um erro!');</script>";
      }
    }
}
