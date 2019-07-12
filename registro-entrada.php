<?php

require_once 'assets/php/database.php';
require_once 'assets/php/funcionario.php';
require_once 'assets/php/equipamento.php';
require_once 'assets/php/entrada.php';
    
   
$entrada = new Entrada();
if(isset($_POST['enviar'])){
    
	$entrada->setLote($_POST['lote']);
	$entrada->setData($_POST['data']);
	$entrada->setHorario($_POST['horario']);
    $entrada->setObs($_POST['obs']);
    $entrada->setFuncionario_idfuncionario($_POST['registroF']);
    $entrada->setEquipamento_idequipamento($_POST['idequipamento']);

	
	if($entrada->insert() == 1){
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
                        <li class="nav-link active">
                            <a class="nav-link" href="registro-entrada.php">
                                <p>Registro de entrada</p>
                            </a>
                        </li>
                        <li >
                                <a class="nav-link" href="registro-saida.php">
                                    <p>Registro de saída</p>
                                </a>
                            </li>
                        <li>
                            <a class="nav-link" href="visualiza-estoque.php">
                                <p>Visualizar Estoque</p>
                            </a>
                        </li>
                        <li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Registrar entrada de equipamentos</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="registro-entrada.php">
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Lote</label>
                                                <input type="text" name="lote" class="form-control"
                                                    placeholder="Numeração do lote">
                                            </div>
                                        </div>
                                        <div class="col-md-6 px-1">
                                            <div class="form-group">
                                                <label>Registro do funcionário que retirou</label>
                                                <input type="text" name="registroF" class="form-control" placeholder="Registro do funcionário responsável">
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-3 pl-1">
                                            <div class="form-group">
                                                <label>Quantidade</label>
                                                <input type="number" name="quantidade" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 pl-1">
                                            <div class="form-group">
                                                <label>ID do quipamento</label>
                                                <input type="number" name="idequipamento" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 pr-1">
                                            <div class="form-group">
                                                <label>Data</label>
                                                <input type="date" name="data" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>Horário</label>
                                                    <input type="time" name="horario" class="form-control">
                                                </div>
                                            </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Observações</label>
                                                <textarea rows="4" cols="80" name="obs" class="form-control"
                                                    placeholder="Digite algum problema durante o recebimento, ou alguma observação a ser feita."
                                                    ></textarea>
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