<?php
class BuscaController extends Controller {

    public function __construct() {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }

    public function index() {
        $_SESSION['erro_busca'] = '';
        $u = new Usuarios();
        $id = $_SESSION['Login'];
        $data = array(
            'usuario_nome' => ''
        );

        $data['usuario_nome'] = $u->getNome($_SESSION['Login']);

        $data['resultado'] = $u->busca($id, $_GET['q']);

        $this->loadTemplate('busca', $data);
    }

}