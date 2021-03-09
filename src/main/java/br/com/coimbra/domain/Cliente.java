package br.com.coimbra.domain;

import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.JoinColumn;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;
import javax.persistence.Table;
import javax.validation.constraints.NotBlank;
import javax.validation.constraints.NotNull;

@SuppressWarnings("serial")
@Entity
@Table(name = "CLIENTES")
public class Cliente extends AbstractEntity<Long> {

	@NotBlank(message = "CNPJ obrigatório.")
	@Column(nullable = false, length = 25, unique = true)
	private String cnpj;

	@NotBlank(message = "Razão Social obrigatório.")
	@Column(name = "name", nullable = true, unique = true, length = 60)
	// @Column(nullable = false, length = 60)
	private String razao_social;

	@NotNull(message = "Selecione o tipo de cliente.")
	@Column(nullable = false, length = 30)
	@Enumerated(EnumType.STRING)
	private TipoCliente tipo_cliente;

	@Column(nullable = false)
	private String telefone;

	@OneToOne(cascade = CascadeType.ALL)
	@JoinColumn(name = "fk_id_endereco")
	private Endereco endereco;

	@OneToMany(mappedBy = "cliente")
	// @ManyToOne
	// @JoinColumn(name = "fk_id_contrato")
	private List<Contrato> contrato;

	public String getCnpj() {
		return cnpj;
	}

	public void setCnpj(String cnpj) {
		this.cnpj = cnpj;
	}

	public String getRazao_social() {
		return razao_social;
	}

	public void setRazao_social(String razao_social) {
		this.razao_social = razao_social;
	}

	public TipoCliente getTipo_cliente() {
		return tipo_cliente;
	}

	public void setTipo_cliente(TipoCliente tipo_cliente) {
		this.tipo_cliente = tipo_cliente;
	}

	public String getTelefone() {
		return telefone;
	}

	public void setTelefone(String telefone) {
		this.telefone = telefone;
	}

	public Endereco getEndereco() {
		return endereco;
	}

	public void setEndereco(Endereco endereco) {
		this.endereco = endereco;
	}

	public List<Contrato> getContrato() {
		return contrato;
	}

	public void setContrato(List<Contrato> contrato) {
		this.contrato = contrato;
	}

}
