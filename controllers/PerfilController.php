<?php
class PerfilController extends Controller {

    public function __construct() {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }

    public function index() {
        $_SESSION['msg'] = '';
        $data = array(
            'usuario_nome'=>''
        );

        $u = new Usuarios();


        if(isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $bio = addslashes($_POST['bio']);

            $u->updatePerfil(array(
                'nome'=>$nome,
                'bio'=>$bio
            ));


            if(isset($_POST['senha']) && !empty($_POST['senha'])) {
                $senha = md5($_POST['senha']);

                $u->updatePerfil(array(
                    'senha' => $senha
                ));
            }
        }


        $data['usuario_nome'] = $u->getNome($_SESSION['Login']);

        $data['info'] = $u->getDados($_SESSION['Login']);

        $this->loadTemplate('perfil', $data);
    }

}