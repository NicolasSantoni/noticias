<?php
/**
* Classe responsável pela gestão de notícias, as criando, editando e deletando no banco de dados, além de as listar na página.
* @author Nicolas Jimenez Santoni <nicolas-jsantoni@educar.rs.gov.br>
* @version 1.0
* @copyright (c) 2020, Nicolas Jimenez Santoni CIMOL
* @access public
* @package NicolasJS63-B
* @subpackage Noticia
* @example Classe noticia.
*/
class Noticia{
    /**
    * Váriavel que recebe id da tabela noticia do banco de dados.
    * @access private
    * @name $id
    */
    private $id;
    /**
    * Váriavel que recebe titulo da tabela noticia do banco de dados.
    * @access private
    * @name $titulo
    */
    private $titulo;
    /**
    * Váriavel que recebe descricao da tabela noticia do banco de dados.
    * @access private
    * @name $descricao
    */
    private $descricao;
    /**
    * Váriavel que recebe comentarios da tabela noticia do banco de dados.
    * @access private
    * @name $comentarios
    */
    private $comentarios;
    /**
    * Váriavel que recebe data da tabela noticia do banco de dados.
    * @access private
    * @name $data
    */
    private $data;
    /**
    * Váriavel que recebe usuario_id da tabela noticia do banco de dados.
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
    * Função para setar o campo titulo
    * @access public
    * @param String $titulo
    */
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
    /**
    * Função para obter o campo tirulo
    * @access public
    * @return $this->titulo
    */
    public function getTitulo(){
        return $this->titulo;
    }
    /**
    * Função para setar o campo descricao
    * @access public
    * @param String $descricao
    */
    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }
    /**
    * Função para obter o campo descricao
    * @access public
    * @return $this->titulo
    */
    public function getDescricao(){
        return $this->descricao;
    }
    /**
    * Função para setar o campo comentarios
    * @access public
    * @param String $comentarios
    */
    public function setComentarios($comentarios){
        $this->comentarios=$comentarios;
    }
    /**
    * Função para obter o campo comentarios
    * @access public
    * @return $this->comentarios
    */
    public function getComentarios(){
        return $this->comentarios;
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
    * Função que direciona a função listar()
    * @access public
    */
    public function index(){
        $this->listar();
    }
    /**
    * Função que lista as notícias presentes no banco de dados
    * @access public
    */
    public function listar(){
        $conexao=Conexao::getInstance();
        $sql="SELECT id, titulo, descricao, DATE_FORMAT(data, '%d/%m/%Y') AS data,
        (SELECT nome FROM usuario WHERE id=noticia.usuario_id)AS nome_usuario
        FROM noticia
        ORDER BY id DESC LIMIT 5";
        $resultado=$conexao->query($sql);
        $noticias=null;
        while($noticia=$resultado->fetch(PDO::FETCH_OBJ)){
            $noticias[]=$noticia;
        }
        include HOME_DIR."view/paginas/noticias/noticias.php";
    }
    /**
    * Função que cria uma notícia e a armazena no banco de dados
    * @access public
    */
    public function criar(){
        $conexao=Conexao::getInstance();
        $sql = 'INSERT INTO noticia (titulo, descricao, data, usuario_id) VALUES ("'.$_POST['titulo'].'","'.$_POST['descricao'].'","'.date('Y/m/d').'",'.$_SESSION['user']->id.')';
        if ($conexao->query($sql)){
          echo "<script>alert('Notícia criada com sucesso!');</script>";
          $this->listar();
        }
        else{
          echo "<script>alert('Ocorreu um erro!');</script>";
          include HOME_DIR."addnoticias.php";
        }
    }
    /**
    * Função que busca uma determinada notícia escolhida pelo usuário no banco de dados
    * @access public
    * @param int $id
    */
    public function ver($id){
      $conexao=Conexao::getInstance();
      $sql="SELECT id, titulo, descricao, DATE_FORMAT(data, '%d/%m/%Y') AS data,
      (SELECT nome FROM usuario WHERE id=noticia.usuario_id)AS nome_usuario
      FROM noticia
      WHERE id=".$id;
      $resultado=$conexao->query($sql);
      $noticia=$resultado->fetch(PDO::FETCH_OBJ);
      include HOME_DIR."view/paginas/noticias/noticia.php";
    }
    /**
    * Função que edita uma determinada notícia escolhida pelo usuário no banco de dados
    * @access public
    * @param int $id
    */
    public function editar($id){
        include HOME_DIR."view/paginas/noticias/editar.php";
        if (!empty( $_POST )) {
          $conexao = Conexao::getInstance();
          $sql = 'UPDATE noticia SET titulo = "'.$_POST['titulo'].'", descricao = "'.$_POST['descricao'].'" WHERE id = '.$id;
          if ($conexao->query($sql)){
              echo "<script>alert('Notícia editada com sucesso!')</script>";
              header('Location:'.HOME_URI.'noticia');
          }
          else{
            echo "<script>alert('Ocorreu um erro!');</script>";
          }
        }
    }
    /**
    * Função que deleta uma determinada notícia escolhida pelo usuário no banco de dados
    * @access public
    * @param int $id
    */
    public function deletar($id){
      $conexao = Conexao::getInstance();
      $sql = 'DELETE FROM noticia WHERE id='.$id;
      if ($conexao->query($sql)){
        echo "<script>alert('Notícia deletada!');</script>";
        header('Location:'.HOME_URI.'noticia');
      }
      else{
        echo "<script>alert('Ocorreu um erro!');</script>";
      }
    }
    /**
    * Função que direciona um comentário feito pelo usuário e transfere suas informações a função salvar($noticia_id, $comentario, $usuario_id) na classe Comentario
    * @access public
    */
    public function comentar(){
        include "Comentario.php";
        $comentario = new Comentario();
        if ($comentario->salvar($_POST['noticia_id'], $_POST['comentario'], $_POST['usuario_id'])){
            $msg['msg'] = "Comentário adicionado!";
            $msg['class'] = "success";
            $_SESSION['msg'] = $msg;
        }
        else {
            $msg['msg'] = "Falha ao adicionar comentário!";
            $msg['class'] = "danger";
            $_SESSION['msg'] = $msg;
        }
        header("location:".HOME_URI."noticia/ver/".$_POST['noticia_id']);
    }

}


?>
