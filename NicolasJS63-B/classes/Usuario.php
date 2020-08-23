<?php
/**
* Classe responsável pela gestão de usuários, os criando, editando e deletando no banco de dados, além de os listar na página.
* @author Nicolas Jimenez Santoni <nicolas-jsantoni@educar.rs.gov.br>
* @version 1.0
* @copyright (c) 2020, Nicolas Jimenez Santoni CIMOL
* @access public
* @package NicolasJS63-B
* @subpackage Usuario
* @example Classe usuario.
*/
class Usuario{
    /**
    * Váriavel que recebe id da tabela usuario do banco de dados.
    * @access private
    * @name $id
    */
    private $id;
    /**
    * Váriavel que recebe nome da tabela usuario do banco de dados.
    * @access private
    * @name $nome
    */
    private $nome;
    /**
    * Váriavel que recebe email da tabela usuario do banco de dados.
    * @access private
    * @name $email
    */
    private $email;
    /**
    * Váriavel que recebe senha da tabela usuario do banco de dados.
    * @access private
    * @name $senha
    */
    private $senha;
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
    * Função para setar o campo nome
    * @access public
    * @param int $nome
    */
    public function setNome($nome){
        $this->nome=$nome;
    }
    /**
    * Função para obter o campo nome
    * @access public
    * @return $this->nome
    */
    public function getNome(){
        return $this->nome;
    }
    /**
    * Função para setar o campo email
    * @access public
    * @param int $email
    */
    public function setEmail($email){
        $this->email=$email;
    }
    /**
    * Função para obter o campo email
    * @access public
    * @return $this->email
    */
    public function getEmail(){
        return $this->email;
    }
    /**
    * Função para setar o campo senha
    * @access public
    * @param int $senha
    */
    public function setSenha($senha){
        $this->senha=$senha;
    }
    /**
    * Função para obter o campo senha
    * @access public
    * @return $this->senha
    */
    public function getSenha(){
        return $this->senha;
    }
    /**
    * Função que verifica se o usuário está logado, se sim, o usuário é direcionado à função listar(), se não, o usuário é direcionado à função login()
    * @access public
    */
    public function index(){
        if (!isset($_SESSION['user'])){
            $this->login();
        }
        else {
            $this->listar();
        }

    }
    /**
    * Função que direciona o usuário à uma página com a lista dos usuários
    * @access public
    */
    public function listar(){
        include HOME_DIR."view/paginas/usuarios/listar.php";
    }
    /**
    * Função que direciona o usuário à uma página com um formulário para criar um usuário
    * @access public
    */
    public function criar(){
        include HOME_DIR."view/paginas/usuarios/form_usuario.php";
    }
    /**
    * Função que cria um novo usuário no banco de dados com as informações dadas pelo usuário atual
    * @access public
    */
    public function salvar(){
        $conexao = Conexao::getInstance();
        $sql = 'INSERT INTO usuario (nome, email, senha, primvez, admin) VALUES ("'.$_POST['nome'].'","'.$_POST['email'].'","'.md5('info63b').'",'.'1'.','.$_POST['tipo'].')';
        if ($conexao->query($sql)){
          echo "<script>alert('Cadastro feito com sucesso! Sua senha é info63b, troque-a ao logar.');</script>";
          include HOME_DIR."view/paginas/usuarios/listar.php";
        }
        else{
          echo "<script>alert('Ocorreu um erro!');</script>";
          include HOME_DIR."view/paginas/usuarios/form_usuario.php";
        }
    }
    /**
    * Função que mostra a id do usuário escolhido
    * @access public
    * @param int $id
    */
    public function exibir($id){
        echo "O id do usuario é".$id;
    }
    /**
    * Função que direciona o usuário à uma página para se fazer o login
    * @access public
    */
    public function login(){
        echo "<script>alert('Usuário ainda não logado. Preencha os campos corretamente!');</script>";
        include HOME_DIR."view/paginas/usuarios/entrar.php";
    }
    /**
    * Função que direciona o usuário à uma página para mudar sua senha
    * @access public
    */
    public function senha(){
        include HOME_DIR."view/paginas/usuarios/senha_padrao.php";
    }
    /**
    * Função que edita o usuário escolhido pelo usuário atual, o levando para um formulário e, então, atualizando suas informações no banco de dados
    * @access public
    * @param int $id
    */
    public function editar($id){
      include HOME_DIR."view/paginas/usuarios/editar.php";
      if (!empty( $_POST )) {
        $conexao = Conexao::getInstance();
        $sql = 'UPDATE usuario SET nome = "'.$_POST['nome'].'", email = "'.$_POST['email'].'", admin = "'.$_POST['tipo'].'" WHERE id = '.$id;
        if ($conexao->query($sql)){
            echo "<script>alert('Usuário editado com sucesso!');</script>";
            header('Location:'.HOME_URI);
        }
        else{
          echo "<script>alert('Ocorreu um erro!');</script>";
          include HOME_DIR."view/paginas/usuarios/editar.php";
        }
      }
    }
    /**
    * Função que deleta o usuário escolhido pelo usuário atual
    * @access public
    * @param int $id
    */
    public function deletar($id){
        $conexao = Conexao::getInstance();
        $sql = 'DELETE FROM usuario WHERE id='.$id;
        if ($conexao->query($sql)){
          echo "<script>alert('Usuário deletado!');</script>";
        }
        else{
          echo "<script>alert('Ocorreu um erro!');</script>";
        }
        include HOME_DIR."view/paginas/usuarios/listar.php";
    }
    /**
    * Função que troca a senha do usuário atual, atualizando o campo do mesmo no banco de dados
    * @access public
    */
    public function trocar_senha(){
      $_SESSION['user']->primvez = 0;
        $conexao = Conexao::getInstance();
        $sql = 'UPDATE usuario SET senha = "'.md5($_POST['senha']).'" WHERE id = '.$_SESSION['user']->id;
        if ($conexao->query($sql)){
            if ($_SESSION['user']->primvez){
                $sql = 'UPDATE usuario SET primvez = '.'0'.' WHERE id = '.$_SESSION['user']->id;
                $conexao->query($sql);
                $_SESSION['user']->primvez = 0;
            }
            echo "<script>alert('Senha alterada com sucesso!');</script>";
            header('Location:'.HOME_URI);
        }
        else{
          echo "<script>alert('Ocorreu um erro!');</script>";
          include HOME_DIR."view/paginas/usuarios/trocarsenha.php";
        }
    }
    /**
    * Função que verifica se as informações inseridas pertencem à algum usuário presente no banco de dados e, caso seja encontrado, faz login com o usuário de mesmas informações
    * @access public
    */
    public function autenticar(){
        $conexao = Conexao::getInstance();
        $email = $_POST['email'];
        $sql = 'SELECT senha FROM usuario WHERE email="'.$email.'"';
        $resultado = $conexao->query($sql);
        $senha = $resultado->fetch(PDO::FETCH_OBJ);
        if (!$senha) {
            $msg['msg'] = "Usuário ainda não logado. Preencha os campos corretamente!";
            $msg['class'] = "danger";
            $_SESSION['msg'] = $msg;
            $this->login();
        }
        else {
            if (md5($_POST['senha']) === $senha->senha){
                $sql = 'SELECT * FROM usuario WHERE email="'.$email.'"';
                $resultado = $conexao->query($sql);
                $_SESSION['user'] = $resultado->fetch(PDO::FETCH_OBJ);
                header('Location:'.HOME_URI);
            }
            else{
                $this->login();
            }
        }
    }
    /**
    * Faz logout do usuário logado atualmente
    * @access public
    */
    public function logout(){
        session_destroy();
        header('Location:'.HOME_URI);
    }
}
