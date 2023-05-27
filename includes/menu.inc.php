<!DOCTYPE html>
<html lang="pt-AO">

	<head>
		<title>File Upload » <?= $title ?? 'Início' ?></title>

		<!-- Meta Tags -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="DorivaTech" />
		<meta name="keywords" content="dorivatech" />
		<meta name="description" content="DorivaTech" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>" />
		<link rel="stylesheet" href="<?= asset('css/bootstrap-icons.min.css') ?>" />
	</head>

	<body>
		<nav class="navbar navbar-expand-lg bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">PDF Upload</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<?php if(auth()): ?>
							<li class="nav-item">
								<a href="#" class="nav-link">Ver PDFs</a>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">Sair</a>
							</li>
						<?php else: ?>
							<li class="nav-item">
								<a href="#" class="nav-link"  data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sessão</a>
							</li>
							
							<li class="nav-item">
								<a href="#" class="nav-link"  data-bs-toggle="modal" data-bs-target="#registerModal">Criar conta</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</nav>