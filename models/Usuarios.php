<?php 
class Usuarios extends Model {

    public function verificarLogin() {
        if(!isset($_SESSION['Login']) || (isset($_SESSION['Login']) && empty($_SESSION['Login']))) {
            header('location: '.BASE_URL.'login');
            exit;

        }

    }

    public function logar($email,$senha) {
        
        $sql = ("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            $_SESSION['Login'] = $sql['id'];
            header('location: '.BASE_URL);

        }else {
            return "Email e/ou Senha errados!";
        }

    }

    public function cadastrar($email,$nome,$senha,$sexo) {

        $sql = ("SELECT * FROM usuarios WHERE email = '$email'");
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            return "email já cadastrado!";

        }else {

            $sql = ("INSERT INTO usuarios SET email = '$email', nome = '$nome', senha = md5('$senha'), sexo = '$sexo'");
            $sql = $this->db->query($sql);

            $id = $this->db->LastInsertId();
            $_SESSION['Login'] = $id;
            
            header('location: '.BASE_URL);

        }

    }

    public function getNome($id) {
           
        $sql = ("SELECT nome FROM usuarios WHERE id = '$id'");
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            return $sql['nome'];
        }else {
            return '';
        }

    }

    public function getDados($id) {
        $array = array();

        $sql = ("SELECT * FROM usuarios WHERE id = '$id'");
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }

    public function updatePerfil($array = array()) {

        if(count($array) > 0) {
            $sql = "UPDATE usuarios SET ";
            foreach($array as $campo => $valor) {
                $campos[] = $campo." = '".$valor."'";
            }

            $sql .= implode(',', $campos);

            $sql .= " WHERE id = '".($_SESSION['Login'])."'";

            $this->db->query($sql);
        }

    }

    public function getSugestoes($limit = 5) {

        $array = array();
        $meuId = $_SESSION['Login'];

        $r = new Relacionamentos();
        $ids = $r->getIdsFriends($_SESSION['Login']);

        if(count($ids) == 0) {
            $ids[] = $meuId;
        }

        $sql = ("
        SELECT 
            usuarios.id,
            usuarios.nome
        FROM 
            usuarios 
        WHERE 
            usuarios.id != '$meuId' AND 
            usuarios.id NOT IN (".implode(',', $ids).")
        ORDER BY RAND()
        LIMIT $limit
        ");

        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;

    }

    public function busca($id, $q) {
        $array = array();
        $q = addslashes($q);

        $sql = ("SELECT * FROM usuarios WHERE nome LIKE '%$q%'");
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;

    }

           

}