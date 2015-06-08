<?
	session_start();
	unset($_SESSION['notaTurmaId']);
	if(!$_SESSION['logado']){
		$msg = "Sessão expirada.";
		header("Location: /acount/?msg=$msg");
	}
	define("TITULO","Visualizar Turma");
	switch($_SESSION['autenticacao']){
		case "administracao":
			header("Location: /acount/admin/");
		break;
		case "aluno":
			header("Location: /acount/adminal/");
		break;
	}
	
	$turmaId = @$_POST['escolher-turma'];
	$trTemp = "";
	
	//Conecção ao Banco de Dados
	$conexao = @mysql_connect("localhost", "root", "");
	if (!$conexao) {
		exit("Site Temporariamente fora do ar");}
	
	mysql_select_db("infnetgrid", $conexao);
	
	$query = "SELECT `nomeTurma`, `idTurma`
			  FROM `turma`
			  WHERE
			  `idTurma` = '$turmaId'";
	
	$resultadoPesquisa = @mysql_query($query, $conexao);
	$turma = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC);
	$_SESSION['notaTurmaId'] = $turma['idTurma'];
	
	$query = "SELECT aluno.`nomeAluno`, aluno.`matricula`, `av1`, `av2`, `av3`
			  FROM `turma_aluno`
			  JOIN `aluno` ON aluno.`matricula` = turma_aluno.`alunoMatricula`
			  WHERE
			  `turmaID` = '$turmaId'
			  ORDER BY aluno.`nomeAluno`";

	$resultadoPesquisa = @mysql_query($query, $conexao);
	$numeroPesquisa = @mysql_num_rows($resultadoPesquisa);
	if ($numeroPesquisa >= 1){
		$contador = 0;
		while($aluno = mysql_fetch_array($resultadoPesquisa, MYSQL_ASSOC)){
			$aluno['nomeAluno'] = utf8_encode($aluno['nomeAluno']);
			if($aluno['av1'] < 0){
				$aluno['av1'] = "";
			}
			if($aluno['av2'] < 0){
				$aluno['av2'] = "";
			}
			if($aluno['av3'] < 0){
				$aluno['av3'] = "";
			}
			
			$trTemp .= "<tbody>
					<td>{$aluno['nomeAluno']}</td>
					<td>
						<input class='form-control' type='text' id='nota-av1-{$aluno['matricula']}' name='nota-av1-{$aluno['matricula']}' placeholder='Digite a Nota da AV1' value='{$aluno['av1']}'/>
					</td>
					<td>
						<input class='form-control' type='text' id='nota-av2-{$aluno['matricula']}' name='nota-av2-{$aluno['matricula']}' placeholder='Digite a Nota da AV2' value='{$aluno['av2']}' />
					</td>
					<td>
						<input class='form-control' type='text' id='nota-pf-{$aluno['matricula']}' name='nota-pf-{$aluno['matricula']}' placeholder='Digite a Nota da PF' value='{$aluno['av3']}' />
					</td>
					<td>
						<input class='form-control' type='text' id='nota-comentario' name='nota-comentario' placeholder='Digite um Comentario'  />
					</td>
					<td>
						<div class='todo-list-item pull-left action-buttons'>
							<a href='lancar_nota.php?matricula={$aluno['matricula']}&av1={$aluno['av1']}&av2={$aluno['av2']}&av3={$aluno['av3']}' title='Lançar' class='trash'><span class='glyphicon glyphicon-ok'></span></a>
						</div> 
				    </td>
				</tbody>";
		}
	}else{
		$trTemp .= "Turma sem alunos vinculados";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Tiago Henrique, Yasmin Farias, Nyelson Gomes, Renan Oliveira, Ramon Portela, Roberto Souza" /> 
  	<meta name="keywords" content="faculdade, alunos, home" />
  	<meta name="description" content="Sistema de Gestão Acadêmica, Avaliações e Administração de Curso em uma Instituição." />
	<title><?=TITULO?> | Painel de Controle do Professor - SGA</title>

    <? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</head>

<body onLoad="SidebarActive('lancar-notas');">
	<? include("../../includes/server/include-login-prof-header-sidebar.php"); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/acount/adminprof/"><span class="glyphicon glyphicon-home"></span></a></li>
				<li>Selecionar Turma</li>
                <li><?=TITULO?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?= $turma['nomeTurma'] ?></div>
                    <div class="table-responsive panel-body">
                        <form method="post" action="notas.php" id="form-lacar-nota" >
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th data-field="disciplina" data-align="right">Nome do Aluno</th>
                                        <th data-field="av1">1ª Avaliação</th>
                                        <th data-field="av2">2ª Avaliação</th>
                                        <th data-field="av3">Prova Final</th>
                                        <th data-field="pf">Comentário</th>
                                        <th data-field="lancar">Confirmar</th>
                                    </tr>
                                </thead>
                               <?= $trTemp ?>
                            </table>
                        <input type="submit" class="btn btn-primary" id="btn-nota-lancar" value="Voltar" />
                        </form>
                  </div> <!-- table-responsive panel-body -->
            </div> <!-- panel panel-default  -->
        </div> <!-- col-md-12 -->
	</div> <!--/.main-->

	<? include("../../includes/server/include-login-css-js-favicon.php"); ?>
</body>

</html>
