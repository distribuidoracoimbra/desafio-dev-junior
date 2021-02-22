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
				<input type="text" class="form-control" name="razaosocialCe" value="<?=$obEmpresaCe->razaosocial?>">
			</div>
		</div>

		<div class="col-sm">
			<div class="form-group">
				<label>CNPJ</label>
				<input type="text" class="form-control" id="cnpj" name="cnpjCe" value="<?=$obEmpresaCe->getCnpj()?>">
				</div>
			</div>

		</div>

	<div class="row">

		<div class="col-sm">
				<div class="form-group">
					<label>Endereço</label>
					<input type="text" class="form-control" name="enderecoCe" value="<?=$obEmpresaCe->getEndereco()?>">
				</div>
			</div>

			<div class="col-sm">
				<div class="form-group">
					<label>Telefone</label>
					<input type="text" class="form-control" id="telefone" name="telefoneCe" value="<?=$obEmpresaCe->getTelefone()?>">
				</div>
			</div>

	</div>


	<h3 class="mt-3">Contratado</h3>

	<div class="row">

		<div class="col-sm">
			<div class="form-group">
				<label>Razão Social</label>
				<input type="text" class="form-control" name="razaosocialCo" value="<?=$obEmpresaCo->razaosocial?>">
			</div>
		</div>

		<div class="col-sm">
			<div class="form-group">
				<label>CNPJ</label>
					<input type="text" class="form-control" id="cnpj2" name="cnpjCo" value="<?=$obEmpresaCo->getCnpj()?>">
				</div>
			</div>

		</div>


	<div class="row">

		<div class="col-sm">
				<div class="form-group">
					<label>Endereço</label>
					<input type="text" class="form-control" name="enderecoCo" value="<?=$obEmpresaCo->getEndereco()?>">
				</div>
			</div>

			<div class="col-sm">
				<div class="form-group">
					<label>Telefone</label>
					<input type="text" class="form-control" name="telefoneCo" id="telefone" value="<?=$obEmpresaCo->getTelefone()?>">
				</div>
			</div>

	</div>

	<h3 class="mt-3">Tipo de Contrato</h3>

			<div class="form-group">

			<div>

		<div class="row">	

			<div class="col-sm">
				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="tcontrato" value="e" <?=$obContrato->tcontrato == 'e' ? 'checked' :''?>> Empréstimo
					</label>
				</div>
			</div>

			<div class="col-sm">
				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="tcontrato" value="a" <?=$obContrato->tcontrato == 'a'? 'checked':''?> > Arrendamento
					</label>
				</div>
			</div>

		</div>

		<div class="row">	

			<div class="col-sm">
				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="tcontrato" value="s" <?=$obContrato->tcontrato == 's'? 'checked':''?> > Seguro e Locação de Serviços
					</label>
				</div>
			</div>

			<div class="col-sm">
				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="tcontrato" value="q" <?=$obContrato->tcontrato == 'q'? 'checked':''?> > Equipamentos
					</label>
				</div>
			</div>

		</div>

		<h3 class="mt-3">Condições Financeiras</h3>

	<div class="row">

		<div class="col-sm">
				<div class="form-group">
					<label>Carência</label>
					<input type="date" class="form-control" name="carencia" value="<?=$obContrato->getCarencia()?>">
				</div>
			</div>

			<div class="col-sm">
				<div class="form-group">
					<label>Vigência</label>
					<input type="date" class="form-control" name="vigencia" value="<?=$obContrato->getVigencia()?>">
				</div>
			</div>

		<div class="col-sm">
				<div class="form-group">
					<label>Valores</label>
					<input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true"  name="valores" value="<?=$obContrato->getValores()?>">
				</div>
			</div>

			<div class="col-sm">
				<div class="form-group">
					<label>Prazo</label>
					<input type="number" class="form-control" min="1" max="28" name="prazo" value="<?=$obContrato->getPrazo()?>">
				</div>
			</div>

	</div>

		<h3 class="mt-3">Status</h3>

			<div class="form-group">

			<div>
				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="status" value="e" checked> Em Edição
					</label>
				</div>

				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="status" value="a"> Ativo 
					</label>
				</div>

				<div class="form-check form-check-inline">
					<label class="form-control">
						<input type="radio" name="status" value="c"> Cancelado
					</label>
				</div>
			</div>
		</div>

	</div>
		<div class="form-group">
				<button type="submit" class="btn btn-success">Enviar</button>
			</div>

	</form>
</main>
