package br.com.coimbra.domain;

public enum Status {

	E("E", "Em Edição"), A("A", "Ativo"), C("C", "Cancelado");

	private String sigla;

	private String descricao;

	public String getSigla() {
		return sigla;
	}

	public String getDescricao() {
		return descricao;
	}

	Status(String sigla, String descricao) {
		this.sigla = sigla;
		this.descricao = descricao;
	}

}
