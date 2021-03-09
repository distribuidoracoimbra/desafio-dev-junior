package br.com.coimbra.dao;

import java.time.LocalDate;
import java.util.List;

import br.com.coimbra.domain.Contrato;

public interface ContratoDao {

	void save(Contrato contrato);

	void update(Contrato contrato);

	void delete(Long id);

	Contrato findById(Long id);

	List<Contrato> findAll();

	List<Contrato> findByClienteId(Long id);

	List<Contrato> findByDataInsercao(LocalDate dtinsercao);

	List<Contrato> findByVigencia(LocalDate dtvigencia);

	List<Contrato> findByPrazo(LocalDate dtprazo);

	List<Contrato> findByStatus(Long id);
}
