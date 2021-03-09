package br.com.coimbra.web.controller;

import java.time.LocalDate;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import br.com.coimbra.domain.Cliente;
import br.com.coimbra.domain.Contrato;
import br.com.coimbra.domain.Status;
import br.com.coimbra.domain.TipoContrato;
import br.com.coimbra.service.ClienteService;
import br.com.coimbra.service.ContratoService;

@Controller
@RequestMapping("/contratos")
public class ContratoController {

	@Autowired
	private ContratoService contratoService;

	@Autowired
	private ClienteService clienteService;

	@GetMapping("/cadastrar")
	public String cadastrar(Contrato contrato) {
		return "/contrato/cadastro";
	}

	@GetMapping("/listar")
	public String listar(ModelMap model) {
		model.addAttribute("contratos", contratoService.buscarTodos());
		return "/contrato/lista";
	}

	@PostMapping("/salvar")
	public String salvar(Contrato contrato, RedirectAttributes attr) {
		contratoService.salvar(contrato);
		attr.addFlashAttribute("success", "Contrato inserido com sucesso!");
		return "redirect:/contratos/cadastrar";
	}

	@GetMapping("/editar/{id}")
	public String preEditar(@PathVariable("id") Long id, ModelMap model) {
		model.addAttribute("contrato", contratoService.buscarPorId(id));
		return "/contrato/cadastro";
	}

	@PostMapping("/editar")
	public String editar(Contrato contrato, RedirectAttributes attr) {
		contratoService.editar(contrato);
		attr.addFlashAttribute("success", "Contrato editado com sucesso.");
		return "redirect:/contratos/cadastrar";
	}

	@GetMapping("/excluir/{id}")
	public String excluir(@PathVariable("id") Long id, RedirectAttributes attr) {
		contratoService.excluir(id);
		attr.addFlashAttribute("success", "Contrato removido com sucesso.");
		return "redirect:/contratos/listar";
	}
	
	//Buscando os filtros
	@GetMapping("/buscar/lcliente")
	public String getPorCliente(@RequestParam("id") Long id, ModelMap model) {
		model.addAttribute("contratos", contratoService.buscarPorCliente(id));
		return "/contrato/lista";
	}
	
	@GetMapping("/buscar/dtinsercao")
	public String getPorDataCliente(@RequestParam("dtinsercao")
									@DateTimeFormat(iso = DateTimeFormat.ISO.DATE) LocalDate dtinsercao,
									ModelMap model) {
		model.addAttribute("contratos", contratoService.buscaPorDataInsercao(dtinsercao));
		return "/contrato/lista";
	}
	
	@GetMapping("/buscar/dtvigencia")
	public String getPorVigencia(@RequestParam("dtvigencia")
									@DateTimeFormat(iso = DateTimeFormat.ISO.DATE) LocalDate dtvigencia,
									ModelMap model) {
		model.addAttribute("contratos", contratoService.buscaPorVigencia(dtvigencia));
		return "/contrato/lista";
	}
	
	@GetMapping("/buscar/dtprazo")
	public String getPorPrazo(@RequestParam("dtprazo")
									@DateTimeFormat(iso = DateTimeFormat.ISO.DATE) LocalDate dtprazo,
									ModelMap model) {
		model.addAttribute("contratos", contratoService.buscaPorPrazo(dtprazo));
		return "/contrato/lista";
	}
	
	@GetMapping("/buscar/lstatus")
	public String getPorStatus(@RequestParam("id") Long lstatus, ModelMap model) {
		model.addAttribute("contratos", contratoService.buscarTodos());
		return "/contrato/lista";
	}
	
	//Fim filtros
	
	@ModelAttribute("ccontratos")
	public List<Contrato> getContratos(){
		return contratoService.buscarTodos();
	}
	
	@ModelAttribute("clientes")
	public List<Cliente> getClientes() {
		return clienteService.buscarTodos();
	}

	// Carregando Enum
	@ModelAttribute("tipoContrato")
	public TipoContrato[] getTipoContratos() {
		return TipoContrato.values();
	}

	@ModelAttribute("status")
	public Status[] getStatus() {
		return Status.values();
	}

}
