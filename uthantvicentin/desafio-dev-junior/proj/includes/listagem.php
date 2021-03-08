<?php
use \App\Entity\Empresa;
use \App\Entity\Contrato;


$mensagem = '';
if(isset($_GET['status'])){
	switch ($_GET['status']) {
	case 'success':
		$mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
		break;

	case 'error':
		$mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
		break;
	}
}

$obEmpresaCe = new Empresa;
$obEmpresaCo = new Empresa;

$resultados = '';
foreach($contratos as $contrato){
	$auxco = $obEmpresaCo->getEmpresa('contratado', $contrato->idco);
	$auxce = $obEmpresaCe->getEmpresa('contratante', $contrato->idce);
	$resultados .= 
		'<tr>
		<td>'.$auxce->razaosocial.'</td>
		<td>'.$auxco->razaosocial. '</td> 
		<td>'.date('d/m/Y',strtotime($contrato->getVigencia())).'</td>
		<td>'.date('d/m/Y à\s H:i:s',strtotime($contrato->getData())).'</td>
		<td>'.($contrato->getStatus() == 'e' ? 'Em ediçao' : '').
		($contrato->getStatus() == 'c' ? 'Cancelado' : '').
		($contrato->getStatus() == 'a' ? 'Ativo' : '')
		.'</td>
		<td class="text-center">
		<a href="visualizar.php?id='.$contrato->getId().'&idce='.$contrato->idce.'&idco='.$contrato->idco.'">
		<button type="button" class="btn btn-warning">Visualizar</button>
		</a>
		<a href="editar.php?id='.$contrato->getId().'&idce='.$contrato->idce.'&idco='.$contrato->idco.'">
		<button type="button" class="btn btn-primary">Editar</button>
		</a>
		<a href="excluir.php?id='.$contrato->getId().'&idce='.$contrato->idce.'&idco='.$contrato->idco.'">
		<button type="button" class="btn btn-danger">Excluir</button>
		</a>
		</td>
		</tr>';
}
	$resultados = strlen($resultados) ? $resultados : '<tr>
		<td colspan="6" class="text-center">
		Nenhum contrato encontrado
		</td>
		</tr>';

?>

<main>

	<?=$mensagem?>

	<section>
		<table class="table bg-light mt-3">
			<tr>
				<th><a href="cadastrar.php">
				<button class="btn btn-success">Novo Contrato</button>
				</a></th>
				<th><input class="form-control" type="text" id="searchContratante" onkeyup="searchFunction()" placeholder="Pesquisar por contratantes (Razão Social) ..."> 
				</th>
			</tr>
		</table>
	</section>

	<section>
		<form method="get">
			<div class="row">

				<div class="col">
					<label>Contratado</label>
					<input type="text" name="busca" class="form-control" value="<?=$busca?>">
				</div>

				<div class="col">
					<label>Operador</label>
					<select name="tvigencia" class="form-control">
						<option value="">Maior/Menor/Igual</option>
						<option value="a"<?=$filtroVigencia == 'a' ? 'selected' : ''?> >Maior</option>
						<option value="e"<?=$filtroVigencia == 'e' ? 'selected' : ''?> >Menor</option>
						<option value="i"<?=$filtroVigencia == 'i' ? 'selected' : ''?> >Igual</option>
					</select>
				</div>

				<div class="col">
					<label>Vigência</label>
					<input type="date" name="vigencia" class="form-control" value="<?=$_GET['vigencia']?>">
				</div>

				<div class="col">
					<label>Operador</label>
					<select name="tinsercao" class="form-control">
						<option value="">Maior/Menor/Igual</option>
						<option value="a"<?=$filtroInsercao == 'a' ? 'selected' : ''?> >Maior</option>
						<option value="e"<?=$filtroInsercao == 'e' ? 'selected' : ''?> >Menor</option>
						<option value="i"<?=$filtroInsercao == 'i' ? 'selected' : ''?> >Igual</option>
					</select>
				</div>

				<div class="col">
					<label>Data de Inserção</label>
					<input type="date" name="insercao" class="form-control" value="<?=$_GET['insercao']?>">
				</div>

				<div class="col">
					<label>Status</label>
					<select name="status" class="form-control">
						<option value="">Em Edição/Ativo/Cancelado</option>
						<option value="e" <?=$filtroStatus == 'e' ? 'selected' : ''?> >Em Edição</option>
						<option value="a" <?=$filtroStatus == 'a' ? 'selected' : ''?> >Ativo</option>
						<option value="c" <?=$filtroStatus == 'c' ? 'selected' : ''?> >Cancelado</option>
					</select>
				</div>

				<div class="col d-flex align-items-end">
					<button type="submit" class="btn btn-primary">Filtrar</button>
				</div>

			</div>
		</form>
	</section>

	<section>
		<table class="table bg-light mt-3" id="myItens">
			<thead>
				<tr>
					<th>Contratante</th>
					<th>Contratado</th>
					<th>Vigência</th>
					<th>Data de Inserção</th>
					<th>Status</th>
					<th class="text-center">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?=$resultados?>
			</tbody>
		</table>
	</section>


</main>
