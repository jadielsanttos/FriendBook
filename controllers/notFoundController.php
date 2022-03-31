<?php
class notFoundController extends Controller {

    public function __construct() {
        parent::__construct();
        $u = new Usuarios();
        $u->verificarLogin();
    }

    public function index() {
        $data = array();
        
        $this->loadView('page_404', $data);
    }

}