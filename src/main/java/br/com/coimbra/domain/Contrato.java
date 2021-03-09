package br.com.coimbra.domain;

import java.time.LocalDate;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.format.annotation.DateTimeFormat.ISO;

@SuppressWarnings("serial")
@Entity
@Table(name = "CONTRATOS")
public class Contrato extends AbstractEntity<Long> {
	
	// @NumberFormat(style = Style.CURRENCY, pattern = "#.###.##0,00")
	// @Column(nullable = false, columnDefinition = "DECIMAL(12,2) DEFAULT 0.00")
	private String valor;
	
	@DateTimeFormat(iso = ISO.DATE)
	@Column(name = "data_vigencia", nullable = false, columnDefinition = "DATE")
	private LocalDate data_vigencia;

	@DateTimeFormat(iso = ISO.DATE)
	@Column(name = "data_prazo", nullable = false, columnDefinition = "DATE")
	private LocalDate data_prazo;

	
	@DateTimeFormat(iso = ISO.DATE)
	@Column(name = "data_insercao", nullable = false, columnDefinition = "DATE")
	private LocalDate data_insercao;

	@Column(length = 10)
	private String carencia;

	@Column(nullable = false, length = 3)
	@Enumerated(EnumType.STRING)
	private TipoContrato tipoContrato;

	@Column(nullable = false, length = 1, columnDefinition = "varchar(1) default 'E' ")
	@Enumerated(EnumType.STRING)
	private Status status;

	@ManyToOne
	@JoinColumn(name = "fk_id_cliente")
	private Cliente cliente;

	public String getValor() {
		return valor;
	}

	public void setValor(String valor) {
		this.valor = valor;
	}

	public LocalDate getData_vigencia() {
		return data_vigencia;
	}

	public void setData_vigencia(LocalDate data_vigencia) {
		this.data_vigencia = data_vigencia;
	}

	public LocalDate getData_prazo() {
		return data_prazo;
	}

	public void setData_prazo(LocalDate data_prazo) {
		this.data_prazo = data_prazo;
	}

	public LocalDate getData_insercao() {
		return data_insercao;
	}

	public void setData_insercao(LocalDate data_insercao) {
		LocalDate.now();
		this.data_insercao = data_insercao;
	}

	public String getCarencia() {
		return carencia;
	}

	public void setCarencia(String carencia) {
		this.carencia = carencia;
	}

	public TipoContrato getTipoContrato() {
		return tipoContrato;
	}

	public void setTipoContrato(TipoContrato tipoContrato) {
		this.tipoContrato = tipoContrato;
	}

	public Status getStatus() {
		return status;
	}

	public void setStatus(Status status) {
		this.status = status;
	}

	public Cliente getCliente() {
		return cliente;
	}

	public void setCliente(Cliente cliente) {
		this.cliente = cliente;
	}

	public Contrato() {
		super();
	}

}
