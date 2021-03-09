package br.com.coimbra.domain;

public enum TipoContrato {

	EMP("EMP", "Empréstimo"), 
	ARR("ARR", "Arrendamento"), 
	SLS("SLS", "Seguro e Locação de Serviços"),
	EQU("EQU", "Equipamentos");

	private String sigla;

	private String descricao;

	public String getSigla() {
		return sigla;
	}

	public void setSigla(String sigla) {
		this.sigla = sigla;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	TipoContrato(String sigla, String descricao) {
		this.sigla = sigla;
		this.descricao = descricao;
	}

}
