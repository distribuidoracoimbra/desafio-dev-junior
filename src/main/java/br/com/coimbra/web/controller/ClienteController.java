package br.com.coimbra.web.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import br.com.coimbra.domain.Cliente;
import br.com.coimbra.domain.Status;
import br.com.coimbra.domain.TipoCliente;
import br.com.coimbra.domain.UF;
import br.com.coimbra.service.ClienteService;

@Controller
@RequestMapping("/clientes")
public class ClienteController {

	@Autowired
	private ClienteService clienteService;

	/*@Autowired
	private ContratoService contratoService;*/

	@GetMapping("/cadastrar")
	public String cadastrar(Cliente cliente) {
		return "/cliente/cadastro";
	}

	@GetMapping("/listar")
	public String listar(ModelMap model) {
		model.addAttribute("clientes", clienteService.buscarTodos());
		return "/cliente/lista";
	}

	@PostMapping("/salvar")
	public String salvar(Cliente cliente, RedirectAttributes attr) {
		clienteService.salvar(cliente);
		attr.addFlashAttribute("success", "Cliente inserido com sucesso!");
		return "redirect:/clientes/cadastrar";
	}

	@GetMapping("/editar/{id}")
	public String preEditar(@PathVariable("id") Long id, ModelMap model) {
		model.addAttribute("cliente", clienteService.buscarPorId(id));
		return "/cliente/cadastro";
	}
	
	/*
	@GetMapping("/editar/{id}/contratos")
	public String mandandoCliente(@PathVariable("cliente") Long id, ModelMap model) {
		model.addAttribute("contrato", contratoService.buscarPorId(id));
		return "/contrato/cadastro";
	}*/

	@PostMapping("/editar")
	public String editar(Cliente cliente, RedirectAttributes attr) {
		clienteService.editar(cliente);
		attr.addFlashAttribute("success", "Cliente editado com sucesso.");
		return "redirect:/clientes/cadastrar";
	}

	@GetMapping("/excluir/{id}")
	public String excluir(@PathVariable("id") Long id, RedirectAttributes attr) {
		clienteService.excluir(id);
		attr.addFlashAttribute("success", "Cliente removido com sucesso.");
		return "redirect:/clientes/listar";
	}

	@ModelAttribute("ufs")
	public UF[] getUFs() {
		return UF.values();
	}

	@ModelAttribute("tipoCliente")
	public TipoCliente[] getCliente() {
		return TipoCliente.values();
	}

	@ModelAttribute("estadoCliente")
	public Status[] getStatus() {
		return Status.values();
	}

}
