package br.com.coimbra.domain;

public enum TipoCliente {

	C("C", "Contrantante"), CC("CC", "Contratado"), CCC("CCC", "Contratante e Contratado");

	private String sigla;

	private String descricao;

	public String getSigla() {
		return sigla;
	}

	public String getDescricao() {
		return descricao;
	}

	TipoCliente(String sigla, String descricao) {
		this.sigla = sigla;
		this.descricao = descricao;
	}

}
