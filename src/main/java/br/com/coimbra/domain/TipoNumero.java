package br.com.coimbra.domain;

public enum TipoNumero {

	PR("PR", "Preferencial"), OP1("OP", "Opcional 1");

	private String sigla;
	private String descricao;

	public String getSigla() {
		return sigla;
	}

	public String getDescricao() {
		return descricao;
	}

	TipoNumero(String sigla, String descricao) {
		this.sigla = sigla;
		this.descricao = descricao;
	}

}
