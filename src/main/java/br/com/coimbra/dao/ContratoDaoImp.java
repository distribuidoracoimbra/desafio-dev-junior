package br.com.coimbra.dao;

import java.time.LocalDate;
import java.util.List;

import org.springframework.stereotype.Repository;

import br.com.coimbra.domain.Contrato;

@Repository
public class ContratoDaoImp extends AbstractDao<Contrato, Long> implements ContratoDao{

	@Override
	public List<Contrato> findByClienteId(Long id) {
		return createQuery("select c from Contrato c where c.cliente.id = ?1",id);
	}

	@Override
	public List<Contrato> findByDataInsercao(LocalDate dtinsercao) {
		String jpql = new StringBuilder("select c from Contrato c ").append("where c.data_insercao  = ?1 ")
										.append("order by c.data_insercao asc").toString();
		return createQuery(jpql, dtinsercao);
	}

	@Override
	public List<Contrato> findByVigencia(LocalDate dtvigencia) {
		String jpql = new StringBuilder("select c from Contrato c ").append("where c.data_vigencia  = ?1 ")
				.append("order by c.data_vigencia asc").toString();
		return createQuery(jpql, dtvigencia);
	}

	@Override
	public List<Contrato> findByPrazo(LocalDate dtprazo) {
		String jpql = new StringBuilder("select c from Contrato c ").append("where c.data_prazo  = ?1 ")
				.append("order by c.data_prazo asc").toString();
		return createQuery(jpql, dtprazo);
	}

	@Override
	public List<Contrato> findByStatus(Long id) {
		return createQuery("select c from Contrato c where c.id.status.descricao = ?1",id);

	}

}
