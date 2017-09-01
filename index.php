<!DOCTYPE html>
<html>

<head>
	<title>Mini Sistema de Contato</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<?php include('includes/style.php') ?>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class="menu active"><i class="fa fa-home"></i> <span>Home</span></a></li>
						<li>
							<a href="#subPages" id="pages" data-toggle="collapse" class="menu collapsed"><i class="fa fa-users"></i> <span>Contato</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a data-menu="novo" href="javascript:;" class="opcao">Novo</a></li>
									<li><a data-menu="lista" href="javascript:;" class="opcao">Listar</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">


					<div class="row">
						<div class="col-md-12">

							<?php include('view/lista.php') ?>

							<?php include('view/novo.php') ?>

						</div>
					</div>


				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>

		<div class="modal fade" id="modal-contato" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel">Contato</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-3">
								<label>Código</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
									<input class="form-control" id="id-view" placeholder="Id" type="text" readonly>
								</div>
							</div>
							<div class="col-md-9">
								<label>Nome Completo</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input class="form-control" id="nome-view" placeholder="Nome Completo" type="text">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>E-Mail</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-at"></i></span>
									<input class="form-control" id="email-view" placeholder="E-Mail Pessoal" type="text">
								</div>
							</div>
							<div class="col-md-6">
								<label>Telefone</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-phone"></i></span>
									<input class="form-control" id="telefone-view" placeholder="Telefone" type="text">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<p><span class="label label-default">Lista Telefones</span></p>
								<select id="add-tipo-telefone" class="form-control form-group">
									<option selected>Selecione o Tipo</option>
									<option value="1">Celular</option>
									<option value="2">Residencial</option>
									<option value="3">Trabalho</option>
								</select>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-phone"></i></span>
									<input class="form-control" id="add-telefone" placeholder="Telefone" type="text">
								</div>
								<div class="form-group text-right"><a href="javascript:;" id="btn-add-tel" class="btn btn-primary btn-sm">Adicionar</a></div>
								<div id="lista-telefones" style="overflow: hidden; height: 300px;"></div>
							</div>
							<div class="col-md-6">
								<p><span class="label label-default">Lista E-Mails</span></p>
								<select id="add-tipo-email" class="form-control form-group">
									<option selected>Selecione o Tipo</option>
									<option value="1">E-Mail Pessoal</option>
									<option value="2">E-Mail Trabalho</option>
								</select>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-at"></i></span>
									<input class="form-control" id="add-email" placeholder="E-Mail" type="text">
								</div>
								<div class="form-group text-right"><a href="javascript:;" id="btn-add-email" class="btn btn-primary btn-sm">Adicionar</a></div>
								<div id="lista-emails" style="overflow: hidden; height: 300px;"></div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<div class="col-md-6">
							<div class="col-md-6" id="info-alteracao"></div>
						</div>
						<div class="col-md-6">
							<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	
	</div>
	<!-- END WRAPPER -->

	<?php include('includes/script.php') ?>
	
</body>

</html>
