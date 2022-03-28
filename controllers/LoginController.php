<?php
class LoginController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();

        $this->loadView('login', $data);
    }

    public function entrar() {
        $data = array('erro'=>'');

        if(isset($_POST['email']) && !empty($_POST['email'])) {

            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);

            $u = new Usuarios();
            $data['erro'] = $u->logar($email,$senha);
        }

        $this->loadView('login_entrar', $data);
    }

    public function cadastrar() {
        $data = array('erro'=>'');

        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $nome = addslashes($_POST['nome']);
            $senha = addslashes($_POST['senha']);
            $sexo = addslashes($_POST['sexo']);

            $u = new Usuarios();
            $data['erro'] = $u->cadastrar($email,$nome,$senha,$sexo);
        }

        $this->loadView('login_cadastrar', $data);
    }

    public function sair() {
        unset($_SESSION['Login']);
        header('location: '.BASE_URL);
        exit;
    }

}