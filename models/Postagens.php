<?php 
class Postagens extends Model {

    public function addPost($post_msg, $foto) {

        $usuario = $_SESSION['Login'];
        $tipo = 'texto';
        $url = '';

        if(count($foto) > 0) {
             $tipos = array('image/jpeg', 'image/jpg', 'image/png');
             if(in_array($foto['type'], $tipos)) {
                 $tipo = 'foto';
                 $url = md5(time().rand(0,999));
                 switch($foto['type']) {
                    case 'image/jpeg':
                    case 'image/jpg':
                        $url .= '.jpg';
                        break;
                    case 'image/png':
                        $url .= '.png';
                        break;
                 }
    
                 move_uploaded_file($foto['tmp_name'], 'assets/images/posts/'.$url);

             }
        }

        $sql = ("INSERT INTO posts SET id_usuario = '$usuario', data_criacao = NOW(), tipo = '$tipo', texto = '$post_msg', url = '$url', id_grupo = '0'");
        $sql = $this->db->query($sql);

    }

    public function getFeed() {
        $array = array();

        $r = new Relacionamentos();
        $ids = $r->getIdsFriends($_SESSION['Login']);
        $ids[] = $_SESSION['Login']; 

        $sql = ("SELECT
        *, 
        (select usuarios.nome FROM usuarios WHERE usuarios.id = posts.id_usuario) as nome,
        (select count(*) FROM posts_likes WHERE posts_likes.id_post = posts.id) as likes,
        (select count(*) FROM posts_likes WHERE posts_likes.id_post = posts.id and 
        posts_likes.id_usuario = '".$_SESSION['Login']."') as liked
        FROM posts
        WHERE id_usuario IN (".implode(',',$ids).") 
        ORDER BY data_criacao DESC");
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            
            foreach ($array as $post) {
				$post['comentarios'] = $this->buscarComentarios($post['id']);
				$posts[] = $post;
			}
           
        }

        //print_r($array);

        if($array) {
            return $posts;

        }else {
            return $array;
        }
      

    }

    public function isLiked($id, $id_usuario) {
        $sql = ("SELECT * FROM posts_likes WHERE id_post = '$id' AND id_usuario = '$id_usuario'");
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function removeLike($id, $id_usuario) {
        $sql = ("DELETE FROM posts_likes WHERE id_post = '$id' AND id_usuario = '$id_usuario'");
        $sql = $this->db->query($sql);
    }

    public function addLike($id, $id_usuario) {
        $sql = ("INSERT INTO posts_likes SET id_post = '$id' AND id_usuario = '$id_usuario'");
        $sql = $this->db->query($sql);
    }


    public function addComentario($id, $id_usuario, $txt) {
        $sql = ("INSERT INTO posts_comentarios SET id_post = '$id', id_usuario = '$id_usuario', data_criacao = NOW(), texto = '$txt'");
        $sql = $this->db->query($sql);

    }

    public function buscarComentarios($id_post) {
        $array = array();

		$sql = "SELECT *,
        (select usuarios.nome from usuarios where usuarios.id = posts_comentarios.id_usuario) AS nome,
        texto FROM posts_comentarios WHERE id_post = '$id_post'";
        $sql = $this->db->query($sql);

        $array = $sql->fetchAll();

		return $array;
       
    }

}