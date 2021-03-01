<div class="modal fade" id="myModalEmpresa"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Criar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="createEmpresa">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Dados</h4>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <label for="razao_social">Razão social: </label><label style="color: red">*</label>
                            <input type="text" id="razao_social" class="form-control" name="razao_social" placeholder="Razão social">
                        </div>
                        <div class="col-md-6">
                            <label for="cnpj">CNPJ: </label><label style="color: red">*</label>
                            <input type="text" id="cnpj" class="form-control cnpj" name="cnpj" placeholder="CNPJ">
                        </div>
                        <div class="col-md-6">
                            <label for="telefone">Telefone: </label><label style="color: red">*</label>
                            <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Telefone">
                        </div>

                        <div class="col-md-12">
                            <h4>Endereço</h4>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <label for="cep">CEP: </label><label style="color: red">*</label>
                            <input type="text" id="cep" class="form-control" name="cep" placeholder="CEP">
                        </div>

                        <div class="col-md-6" style="">
                            <label for="logradouro">Logradouro: </label><label style="color: red">*</label>
                            <input type="text" id="logradouro" class="form-control" name="logradouro" placeholder="Logradouro">
                        </div>
                        <div class="col-md-6" style="">
                            <label for="bairro">Bairro: </label><label style="color: red">*</label>
                            <input type="text" id="bairro" class="form-control" name="cor" placeholder="Bairro">
                        </div>
                        <div class="col-md-6" style="">
                            <label for="estado">Estado: </label><label style="color: red">*</label>
                            <input type="text" id="estado" class="form-control" name="estado" placeholder="Estado">
                        </div>
                        <div class="col-md-6" style="">
                            <label for="cidade">Cidade: </label><label style="color: red">*</label>
                            <input type="text" id="cidade" class="form-control" name="cidade" placeholder="Cidade">
                        </div>
                        <div class="col-md-6" style="">
                            <label for="numero">Número: </label><label style="color: red">*</label>
                            <input type="text" id="numero"  class="form-control" name="numero" placeholder="Número">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="sair">Sair</button>
                    <button type="submit" class="btn btn-primary" id="teste">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
