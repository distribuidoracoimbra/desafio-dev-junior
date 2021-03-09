package br.com.coimbra.service;

import java.time.LocalDate;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import br.com.coimbra.dao.ContratoDao;
import br.com.coimbra.domain.Contrato;

@Service
@Transactional(readOnly = false)
public class ContratoServiceImpl implements ContratoService {

	@Autowired
	private ContratoDao dao;

	@Override
	public void salvar(Contrato contrato) {
		dao.save(contrato);
	}

	@Override
	public void editar(Contrato contrato) {
		dao.update(contrato);
	}

	@Override
	public void excluir(Long id) {
		dao.delete(id);
	}

	@Override
	@Transactional(readOnly = true)
	public Contrato buscarPorId(Long id) {
		return dao.findById(id);
	}

	@Override
	@Transactional(readOnly = true)
	public List<Contrato> buscarTodos() {
		return dao.findAll();
	}

	@Override
	public List<Contrato> buscarPorCliente(Long id) {
		return dao.findByClienteId(id);
	}

	@Override
	public List<Contrato> buscaPorDataInsercao(LocalDate dtinsercao) {
		return dao.findByDataInsercao(dtinsercao);
	}

	@Override
	public List<Contrato> buscaPorVigencia(LocalDate dtvigencia) {
		return dao.findByVigencia(dtvigencia);
	}

	@Override
	public List<Contrato> buscaPorPrazo(LocalDate dtprazo) {
		return dao.findByPrazo(dtprazo);
	}

	@Override
	public List<Contrato> buscarPorStatus(Long id) {
		dao.findByStatus(id);
		return null;
	}

	
}
