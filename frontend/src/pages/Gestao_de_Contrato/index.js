import React, {useState} from 'react';
import { useHistory } from 'react-router-dom'
import Header from '../../components/Header'
import Api from '../../services/api'
import InputMask from "react-input-mask";
import './style.css'
import { Form, Col } from 'react-bootstrap';

function Emprestimos() {

    const [cte_razao_social, setCte_razaoSocial] = useState('')
    const [cte_cnpj, setCte_cnpj] = useState('')
    const [cte_endereco, setCte_Endereco] = useState('')
    const [cte_telefone, setCte_telefone] = useState('')
    const [cto_razao_social, setCto_razaoSocial] = useState('')
    const [cto_cnpj, setCto_cnpj] = useState('')
    const [cto_endereco, setCto_Endereco] = useState('')
    const [cto_telefone, setCto_telefone] = useState('')

    const [tipo_do_contrato, setTipo_do_contrato] = useState('Emprestimo')

    const [carencia, setCarencia] = useState('')
    const [i_vigencia, setIvigencia] = useState('')
    const [f_vigencia, setFvigencia] = useState('')
    const [valores, setValores] = useState('')
    const [prazos, setPrazos] = useState('')

    const [status, setStatus] = useState('Em Edição')

    const history = useHistory();

    async function handlerProjet(e){
        e.preventDefault()

        const data = {
            cte_razao_social,cte_cnpj,cte_endereco,cte_telefone,
            cto_razao_social,cto_cnpj,cto_endereco,cto_telefone,
            tipo_do_contrato,
            carencia, i_vigencia, f_vigencia, valores, prazos,
            status,
        }

        console.log(data)

        try {
            const res = await Api.post('Cgestao_de_contrato', data)
            alert('Cadastro com Sucesso')
            history.push('/')
        } catch (error) {
            alert('Um erro ocorreu no processo, tente novamente mais tarde')
        }
    }

    return(
        <div className="Container">
            <Header />
            <form onSubmit={handlerProjet}>
                <div className="container ct_os">
                    <div className="Title text-center">
                        <h3>Criação da Gestão de Contrato</h3>
                    </div>
                    <div className="Container_cte_cto">
                        <div className="container_form">
                            <div className="row g-2 bx-form">
                                <fieldset>
                                    <legend>Contratante</legend>
                                    <div className="row g-2 cx-form">
                                    <div className="col-md-7">
                                        <label for="razao_social" class="form-label">Razão Social</label>
                                        <input type="text" value={cte_razao_social} onChange={e => setCte_razaoSocial(e.target.value)} class="form-control" id="razao_social" required/>
                                    </div>
                                    <div className="col-md-5">
                                        <label for="cnpj" class="form-label">CNPJ</label>
                                        <InputMask type="text" mask="99.999.999/9999-99" value={cte_cnpj} onChange={e => setCte_cnpj(e.target.value)} class="form-control" id="cnpj" required/>
                                    </div>
                                    </div>
                                    <div className="row g-2 cx-form">
                                        <div className="col-md-6">
                                            <label for="razao_social" class="form-label">Endereço</label>
                                            <input type="text" value={cte_endereco} onChange={e => setCte_Endereco(e.target.value)} class="form-control" id="razao_social" required/>
                                        </div>
                                    </div>
                                    <div className="row g-2 cx-form">
                                        <div className="col-md-6">
                                            <label for="cnpj" class="form-label">Telefone</label>
                                            <InputMask  type="text" mask="(99) 9 9999 9999" value={cte_telefone} onChange={e => setCte_telefone(e.target.value)} class="form-control" id="cnpj" required/>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div className="container_form">
                            <div className="row g-2 bx-form">
                                <fieldset>
                                    <legend>Contratado</legend>
                                    <div className="row g-2 cx-form">
                                    <div className="col-md-7">
                                        <label for="razao_social" class="form-label">Razão Social</label>
                                        <input type="text" value={cto_razao_social} onChange={e => setCto_razaoSocial(e.target.value)} class="form-control" id="razao_social" required/>
                                    </div>
                                    <div className="col-md-5">
                                        <label for="cnpj" class="form-label">CNPJ</label>
                                        <InputMask type="text" mask="99.999.999/9999-99" value={cto_cnpj} onChange={e => setCto_cnpj(e.target.value)} class="form-control" id="cnpj" required/>
                                    </div>
                                    </div>
                                    <div className="row g-2 cx-form">
                                        <div className="col-md-6">
                                            <label for="razao_social" class="form-label">Endereço</label>
                                            <input type="text" value={cto_endereco} onChange={e => setCto_Endereco(e.target.value)} class="form-control" id="razao_social" required/>
                                        </div>
                                    </div>
                                    <div className="row g-2 cx-form">
                                        <div className="col-md-6">
                                            <label for="cnpj" class="form-label">Telefone</label>
                                            <InputMask  type="text" mask="(99) 9 9999 9999" onChange={e => setCto_telefone(e.target.value)} class="form-control" id="cnpj" required/>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div className="container ct_container">
                        <div className="ct_objeto">
                            <div className="row">
                                <div className="container_box">
                                    <legend>Objeto & Seguro </legend>
                                    <div class="row ct_tipo_do_contrato">
                                        <Form.Group as={Col} controlId="formGridState">
                                            <Form.Label >Tipo de Contrato</Form.Label>
                                            <Form.Control as="select" value={tipo_do_contrato} onChange={e => setTipo_do_contrato(e.target.value)} defaultValue="Em Edição" required>
                                                <option>Emprestimo</option>
                                                <option>Arrendamento</option>
                                                <option>Seguro</option>
                                                <option>Locação de Serviços e Equipamentos</option>
                                            </Form.Control>
                                        </Form.Group>
                                    </div>
                                </div>
                                <div className="bx-form">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="formGroupExampleInput" class="form-label">Carêcia</label>
                                            <input type="date" value={carencia} onChange={e => setCarencia(e.target.value)} class="form-control" placeholder="Tempo de Carência" aria-label="Tempo_carencia" required/>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="formGroupExampleInput" class="form-label">Inicio da Vigência</label>
                                            <input type="date" value={i_vigencia} onChange={e => setIvigencia(e.target.value)} class="form-control" placeholder="Vigência" aria-label="i_vigencia" required/>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="formGroupExampleInput" class="form-label">Fim da Vigência</label>
                                            <input type="date" value={f_vigencia} onChange={e => setFvigencia(e.target.value)} class="form-control" placeholder="Vigência" aria-label="f_vigencia" required/>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="formGroupExampleInput" class="form-label">Valor</label>
                                            <InputMask type="text" mask="99.999,99" value={valores} onChange={e => setValores(e.target.value)} class="form-control" placeholder="Valor" aria-label="Valor" required/>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="formGroupExampleInput" class="form-label">Prazo</label>
                                            <input type="date" value={prazos} onChange={e => setPrazos(e.target.value)} class="form-control" placeholder="Prazo" aria-label="Prazo" required/>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div class="col-md-3 ct_status">
                                            <Form.Group as={Col} controlId="formGridState">
                                                <Form.Label >Status</Form.Label>
                                                <Form.Control as="select" value={status} onChange={e => setStatus(e.target.value)} defaultValue="Em Edição" required>
                                                    <option>Em Edição</option>
                                                    <option>Ativo</option>
                                                    <option>Cancelado</option>
                                                </Form.Control>
                                            </Form.Group>                                        
                                        </div>
                                    </div>
                                    <div className="row button_submit">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    )
}

export default Emprestimos;