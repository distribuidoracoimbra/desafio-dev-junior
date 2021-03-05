import React, { useEffect, useState } from 'react';
import Header from '../../components/Header/'
import Api from '../../services/api'
import {Form, Col, Alert } from 'react-bootstrap'
import Modale from '../../components/Modal'
import {Link, useHistory} from 'react-router-dom'
import './style.css'

function Home() {
    const [show, setShow] = useState(false);
    const history = useHistory()

    let [op1, setOp1] = useState('')
    let [op2, setOp2] = useState('')
    let [op3, setOp3] = useState('')

    const Limpar = () => {
        setOp1('')
        setOp2('')
        setOp3('')
    }

    const handleClose = () => setShow(false);
    const handleShow = () => {
        <Modale />
    };

    const Pesquisa = (e) => {
        e.preventDefault()       
        
    }

    const [gest_contrato, setGest_contrato] = useState([])

    useEffect(() => {
        Api.get(`gestao_de_contrato?tipo_do_contrato=${op1}&status=${op2}&i_vigencia=${op3}`)
            .then(resp => setGest_contrato(resp.data))
            console.log(op1, op2, op3)
    }, [op1, op2, op3])



    return (
        <div className="ContainerHme">
            <Header />
            <div className="conteudo">
                <div className="header_conteudo">
                    <nav class="navbar navbar-light wid">
                        <div class="container-fluid pesquisa">
                            <Form.Group as={Col} controlId="formGridState">
                                <Form.Label>Contrato</Form.Label>
                                <Form.Control as="select" value={op1} onChange={e => setOp1(e.target.value)} defaultValue="1">
                                    <option selected disabled value=''></option>
                                    <option>Emprestimo</option>
                                    <option>Arrendamento</option>
                                    <option>Seguro</option>
                                    <option>Locação de Serviços e Equipamentos</option>
                                </Form.Control>
                            </Form.Group>
                            <Form.Group>
                                <Form.Label>Inicial Vigencia</Form.Label>
                                <input type="date" defaultValue="" value={op3} onChange={e => setOp3(e.target.value)} class="form-control" id="razao_social"/>
                            </Form.Group>
                            <Form.Group as={Col} controlId="formGridState">
                                <Form.Label>Status</Form.Label>
                                <Form.Control as="select" value={op2} onChange={e => setOp2(e.target.value)} defaultValue="">
                                    <option selected disabled value=''></option>
                                    <option selected>Em Edição</option>
                                    <option>Ativo</option>
                                    <option>Cancelado</option>
                                </Form.Control>
                            </Form.Group>
                            <Form.Group as={Col} className="bnt_limpa" controlId="formGridState">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" onClick={Limpar} class="btn btn-danger">Limpar</button>
                                </div>
                            </Form.Group>
                        </div>
                    </nav>
                </div>
                <div className="Container_box">
                    {gest_contrato.map(contrato => (
                        <div key={contrato.id} class="box_container">
                            <div class="col-sm-12 box_doc">
                                <div class="card border-dark Container_card">
                                    <div class="card-header cont_title text-center bg-transparent border-dark">{contrato.cte_razao_social}</div>
                                    <div class="card-body card-info text-success">
                                        <h5 class="card-title">{contrato.tipo_do_contrato}</h5>
                                        <label><strong>Razão Social : </strong>{contrato.cto_razao_social}</label>
                                        <label><strong>Status : </strong>{contrato.status}</label>
                                    </div>
                                    <div class="card-footer button_env text-center bg-transparent border-success">
                                        <Link className="button-env text-center" variant="primary" to={{pathname: `/Modale/${contrato.id}`}} onClick={handleShow}>
                                            Mostrar
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
                {gest_contrato.length == 0 &&
                    [
                        'danger',
                        ].map((variant, idx) => (
                        <Alert key={idx} variant={variant}>
                            Não foi possivel encontrar nenhum contrato com essas especificações
                        </Alert>
                        ))
                }
            </div>
        </div>

    )
}

export default Home