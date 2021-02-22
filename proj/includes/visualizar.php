<main>

	<section>
		<a href="index.php">
			<button class="btn btn-success">Voltar</button>
		</a>
	</section>

	<h2 class="mt-3"><?=TITLE?></h2>

	<form method="post">

<div class="container">

	<h3 class="mt-3">Contratante</h3>

	<div class="row">

		<div class="col-sm">
			<div class="form-group">
				<label>Razão Social</label>
				<input type="text" class="form-control" readonly="readonly" name="razaosocialCe" value="<?=$obEmpresaCe->razaosocial?>">
			</div>
		</div>

		<div class="col-sm">
			<div class="form-group">
				<label>CNPJ</label>
				<input type="text" class="form-control" readonly="readonly" id="cnpj" name="cnpjCe" value="<?=$obEmpresaCe->getCnpj()?>">
				</div>
			</div>

		</div>

	<div class="row">

		<div class="col-sm">
				<div class="form-group">
					<label>Endereço</label>
					<input type="text" readonly="readonly" class="form-control" name="enderecoCe" value="<?=$obEmpresaCe->getEndereco()?>">
				</div>
			</div>

			<div class="col-sm">
				<div class="form-group">
					<label>Telefone</label>
					<input type="text" class="form-control" readonly="readonly" id="telefone" name="telefoneCe" value="<?=$obEmpresaCe->getTelefone()?>">
				</div>
			</div>

	</div>


	<h3 class="mt-3">Contratado</h3>

	<div class="row">

		<div class="col-sm">
			<div class="form-group">
				<label>Razão Social</label>
				<input type="text" class="form-control" readonly="readonly" name="razaosocialCo" value="<?=$obEmpresaCo->razaosocial?>">
			</div>
		</div>

		<div class="col-sm">
			<div class="form-group">
				<label>CNPJ</label>
					<input type="text" class="form-control" readonly="readonly" id="cnpj2" name="cnpjCo" value="<?=$obEmpresaCo->getCnpj()?>">
				</div>
			</div>

		</div>


	<div class="row">

		<div class="col-sm">
				<div class="form-group">
					<label>Endereço</label>
					<input type="text" class="form-control" readonly="readonly" name="enderecoCo" value="<?=$obEmpresaCo->getEndereco()?>">
				</div>
			</div>

			<div class="col-sm">
				<div class="form-group">
					<label>Telefone</label>
					<input type="text" class="form-control" readonly="readonly" name="telefoneCo" id="telefone" value="<?=$obEmpresaCo->getTelefone()?>">
				</div>
			</div>

	</div>

		<h3 class="mt-3">Condições Financeiras</h3>

	<div class="row">

		<div class="col-sm">
				<div class="form-group">
					<label>Carência</label>
					<input type="date" class="form-control" readonly="readonly" name="carencia" value="<?=$obContrato->getCarencia()?>">
				</div>
			</div>

			<div class="col-sm">
				<div class="form-group">
					<label>Vigência</label>
					<input type="date" class="form-control" readonly="readonly" name="vigencia" value="<?=$obContrato->getVigencia()?>">
				</div>
			</div>

		<div class="col-sm">
				<div class="form-group">
					<label>Valores</label>
					<input type="text" class="form-control" readonly="readonly" data-mask="#.##0,00" name="valores" data-mask-reverse="true" value="<?=$obContrato->getValores()?>">
				</div>
			</div>

			<div class="col-sm">
				<div class="form-group">
					<label>Prazo</label>
					<input type="number" class="form-control" readonly="readonly" id="prazo" name="prazo" value="<?=$obContrato->getPrazo()?>">
				</div>
			</div>

	</div>

		<h3 class="mt-3">Status</h3>

			<div class="form-group">

			<div>
				<div class="form-check form-check-inline">
					<label class="form-control">
					<input type="radio" name="status" value="e" <?=$obContrato->getStatus() == 'e' ? "checked" : "disabled"?>> Em Edição
					</label>
				</div>

				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="status" value="a"<?=$obContrato->getStatus() == 'a' ? "checked" : "disabled"?>> Ativo 
					</label>
				</div>

				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="status" value="c" <?=$obContrato->getStatus() == 'c' ? "checked" : "disabled"?>> Cancelado
					</label>
				</div>
			</div>
		</div>

	</div>
	</form>
</main>
