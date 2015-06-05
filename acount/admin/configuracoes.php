<?
	session_start();
	define("TITULO","Configurações");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, configuracoes" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Aluno - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('configuracao-admin');">
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
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-heading">Alterar Senha</div> <!-- panel-heading -->
					<div class="panel-body">
                    	<form class="form-horizontal" id="form-alterar-senha" method="post" action="aterar_senha_exec.php">
                        	<div class="form-group" id="div-alterar-senha-antiga">
                            	<label class="col-md-3 control-label">
                                	<span>Senha Atual: </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="password" id="alterar-senha-antiga" class="form-control" 
                                    name="alterar-senha-antiga" placeholder="Digite sua Senha atual"
                                    title="Digite sua Senha atual" size="40" />
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-senha-antiga -->
                            <div class="form-group" id="div-alterar-senha-nova">
                            	<label class="col-md-3 control-label">
                                	<span>Nova Senha: </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="password" id="alterar-senha-nova" class="form-control"
                                     name="alterar-senha-nova" placeholder="Digite a sua Nova senha"
                                     title="Digite a sua Nova senha" size="40" />
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-senha-nova -->
                            <div class="form-group" id="div-alterar-senha-Confirmar">
                            	<label class="col-md-3 control-label">
                                	<span>Confirmar Senha: </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="password" id="alterar-senha-Confirmar" class="form-control" 
                                    name="alterar-senha-Confirmar" placeholder="Confirme a sua nova Senha" 
                                    title="Confirme a sua nova Senha" size="40" />
                                </div> <!-- col-md-9 -->
                            </div> <!-- div-alterar-senha-Confirmar -->
                            
                            <div class="form-group">
                                <div class="col-md-12 widget-right" id="div-btn-alterar-enviar">
                            		<input type="button" id="btn-alterar-enviar" class="btn btn-default btn-md pull-right" value="Alterar Senha"  onClick="botoesEnviar('#','#',());"/>
                            	</div> <!-- div-alterar-senha-Confirmar -->
                            </div> <!-- form-group -->
                        </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel panel-default -->
            </div> <!-- col-lg-8 -->
        </div> <!-- row -->   
	</section> <!-- main -->
</body>

</html>
