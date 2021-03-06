<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer">
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Montserrat:wght@300;400;600;700&family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
    	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
		<title>FriendBook</title>
	</head>
	<body>

		<section>
			<div class="container">
				<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
				
				<div class="logo">
					<a href="<?php echo BASE_URL; ?>" id="link-logo">FriendBook</a>
					<form action="<?php echo BASE_URL; ?>busca" method="GET">
						<input type="text" name="q" placeholder="Procurar amigo...">
					</form>
				</div>
			
				<div class="col-md-3 text-end">
					<div class="menu-opener" id="menu-opener">
						<i class="fa-solid fa-bars" onclick="abrirMenu()"></i>
					</div>

					<div class="btn-group" id="menu">
						<button type="button" id="btn-dropdown" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							<?php echo $viewData['usuario_nome']; ?>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>perfil">Editar perfil</a></li>
							<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
						</ul>
					</div>

				</div>


				<div class="menu-mobile" id="menu-mobile"> 
					<ul>
						<li><a href="<?php echo BASE_URL; ?>perfil">Editar perfil</a></li>
						<li><a href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
					</ul>
				</div>

					
				</header>
			</div>
		</section>
			


		<div class="container">
		<?php
		$this->loadViewInTemplate($viewName, $viewData);
		?>
		</div>

		<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
	</body>
</html>