<?php
class homeController extends Controller {

    public function __construct() {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }

    public function index() {
        $u = new Usuarios();
        $p = new Postagens();
        $r = new Relacionamentos();

        $data = array(
            'usuario_nome'=>''
        );

        $data['usuario_nome'] = $u->getNome($_SESSION['Login']);

        if(isset($_POST['post']) && !empty($_POST['post'])) {
            $post_msg = addslashes($_POST['post']);
            $foto = array();

            if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])) {
                $foto = $_FILES['foto'];
            }
            
            $p->addPost($post_msg, $foto); 
        }

        $data['sugestoes'] = $u->getSugestoes(3);
        $data['solicitacoes'] = $r->getSolicitacoes();
        $data['total_amigos'] = $r->getTotalAmigos($_SESSION['Login']);
        $data['feed'] = $p->getFeed();
        
        $this->loadTemplate('home', $data);
    }

}