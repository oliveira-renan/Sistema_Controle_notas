<?
	session_start();
	define("TITULO","Vincular Módulo à Professor");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('vinc-prof');">
	<? include("../../includes/server/include-login-admin-header-sidebar.php"); ?>
		
	<section class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/index.php" title="Página Inicial da SGA" ><span class="glyphicon glyphicon-home"></span></a></li>
				<li><?=TITULO?></li>
			</ol>
		</div><!-- row -->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?=TITULO?></h1>
			</div>
		</div><!-- row -->
		
        <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Dados da Vinculação</div> <!-- panel-heading -->
					<div class="panel-body">
						<form class="form-horizontal" action="vincular_prof_exe.php" method="post" id="form-vincular-prof">
                            <div class="form-group" id="div-vincular-prof-prof">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Professor</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-prof-prof" 
                                    name="vincular-prof-prof" title="Escolha o Professor" >
                                        <option value="Professor#1">Professor #1</option>
                                        <option value="Professor#2">Professor #2</option>
                                        <option value="Professor#3">Professor #3</option>
                                        <option value="Professor#4">Professor #4</option>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-prof-prof -->
                            
                            <div class="form-group" id="div-vincular-prof-modulo">
                                <label class="col-md-4 control-label">
                                	<span>Selecione o Módulo</span>
                                </label>
                                <div class="col-md-8">
                                    <select class="form-control" id="vincular-prof-modulo" 
                                    name="vincular-prof-modulo" title="Escollha o Módulo" >
                                        <option value="Modulo#1">Módulo #1</option>
                                        <option value="Modulo#2">Módulo #2</option>
                                        <option value="Modulo#3">Módulo #3</option>
                                        <option value="Modulo#4">Módulo #4</option>
                                    </select>
                                </div> <!-- col-md-8 -->
                            </div> <!-- div-vincular-prof-modulo -->
                            
                            <div class="col-md-12 widget-right" id="div-btn-vinc-prof-enviar">
                                <input type="button" id="btn-vinc-prof-enviar" value="Vincular" class="btn btn-default btn-md pull-right"  onClick="botoesEnviar('#','#',());"/>
                            </div> <!-- div-btn-vinc-prof-enviar -->
                        </form>
					</div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
           </div> <!-- col-md-8 -->
	    </div> <!-- row -->
	</section> <!-- main -->
</body>

</html>
