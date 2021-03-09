package br.com.coimbra.service;

import java.time.LocalDate;
import java.util.List;

import br.com.coimbra.domain.Contrato;


public interface ContratoService {
	
	void salvar(Contrato contrato);
	
	void editar(Contrato contrato);
	
	void excluir(Long id);
	
	Contrato buscarPorId(Long id);
	
	List <Contrato> buscarTodos();

	List <Contrato> buscarPorCliente(Long id);

	List <Contrato> buscaPorDataInsercao(LocalDate dtinsercao);

	List <Contrato> buscaPorVigencia(LocalDate dtvigencia);

	List <Contrato> buscaPorPrazo(LocalDate dtprazo);

	List <Contrato> buscarPorStatus(Long id);

}
