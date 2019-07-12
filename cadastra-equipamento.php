<?php

require_once 'assets/php/database.php';
require_once 'assets/php/equipamento.php';
    
   
$equipamento = new Equipamento();
if(isset($_POST['enviar'])){
    
	$equipamento->setNome($_POST['nome']);
	$equipamento->setRegistro($_POST['registro']);
	$equipamento->setFornecedor($_POST['fornecedor']);
	$equipamento->setPreco($_POST['preco']);

	
	if($equipamento->insert() == 1){
		$result = "Equipamento inserido";
	}else{
		$error = "Erro ao inserir";
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="assets/pictures/medicine.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Registro de entrada</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
            name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    </head>

    <body>
        <div class="wrapper">
            <div class="sidebar" data-color="black" data-image="assets/img/sidebar-5.jpg">

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <h4 class="text-center">HospStock <img src="assets/pictures/medicine.png"></h4>
                    </div>
                    <ul class="nav">
                        <li>
                            <a class="nav-link" href="dashboard2.php">
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="registro-entrada.php">
                                <p>Registro de entrada</p>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="registro-saida.php">
                                <p>Registro de saída</p>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="visualiza-estoque.php">
                                <p>Visualizar Estoque</p>
                            </a>
                        </li>
                        <li class="nav-link active">
                            <a class="nav-link" href="cadastra-equipamento.php">
                                <p>Cadastrar novo equipamento</p>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="relatorio-estoque.php">
                                <p>Relatório de estoque</p>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="edit-user.php">
                                <p>Gerenciar usuários</p>
                            </a>
                        </li>
                        <li class="nav-item active active-pro">
                            <a class="nav-link active text-center" href="upgrade.php">
                                <i class="nc-icon"></i>
                                <p>Sair</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <div class="content">
                    <div class="col-md-6">
                        <div class="card ml-5 mt-5">
                            <div class="card-header">
                                <h4 class="card-title">Cadastro de equipamentos</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="cadastra-equipamento.php">
                                    <div class="row">
                                        <div class="col-md-12 pr-3">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control"
                                                    placeholder="Digite o nome do equipamento">
                                            </div>
                                        </div>
                                        <div class="col-md-12 pl-3 pr-3">
                                            <div class="form-group">
                                                <label>Registro</label>
                                                <input type="text" name="registro" class="form-control"
                                                    placeholder="Digite um registro para o equipamento">
                                            </div>
                                        </div>
                                        <div class="col-md-12 pl-3 pr-3">
                                            <div class="form-group">
                                                <label>Fornecedor</label>
                                                <input type="text" name="fornecedor" class="form-control"
                                                    placeholder="Digite o nome do fornecedor">
                                            </div>
                                        </div>
                                        <div class="col-md-12 pl-3 pr-3">
                                            <div class="form-group">
                                                <label>Preço unitário</label>
                                                <input type="text" name="preco" class="form-control"
                                                    placeholder="Insira o valor do produto">
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" value="enviar" name="enviar" class="btn btn-info btn-fill pull-right">Salvar</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
        </div>

    </body>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!--  Chartist Plugin  -->
    <script src="assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>

</html>