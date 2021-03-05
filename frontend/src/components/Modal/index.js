import React, {useState, useEffect} from 'react';
import { Modal, Col, ListGroup, Row} from 'react-bootstrap'
import { Link, useHistory, useParams } from 'react-router-dom'
import api from '../../services/api'
import './style.css'


function Modale () {
    const history = useHistory()

    const [show, setShow] = useState(true);

    const [gest_contrato, setGest_contrato] = useState([])

    let { id } = useParams()

    useEffect(() => {
        api.get(`gestao_de_contrato/${id}`)
            .then(resp => setGest_contrato(resp.data))
    }, [])


    const handleClose = () => {
        setShow(false)
        history.push('/')
    };
    const handleShow = () => setShow(true);

    return (
        <div className="modal_container">
            {gest_contrato.map(ctr => (
                <Modal show={show} centered size="xl" onHide={handleClose}>
                    <Modal.Header closeButton>
                        <Modal.Title className="Title"> Informações Completa </Modal.Title>
                    </Modal.Header>
                    <h4>Contratante</h4>
                    <Row>
                        <Col>
                            <Modal.Body> 
                                <ListGroup>
                                    <ListGroup.Item><strong className="Description">Razão Social -</strong>{ctr.cte_razao_social}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Cnpj -</strong>{ctr.cte_cnpj}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Endereço -</strong>{ctr.cte_endereco}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Telefone -</strong>{ctr.cte_telefone}</ListGroup.Item>
                                </ListGroup>
                            </Modal.Body>
                        </Col>
                    </Row>
                    <h4>Contratado</h4>
                    <Row>
                        <Col>
                            <Modal.Body> 
                                <ListGroup>
                                    <ListGroup.Item><strong className="Description">Razão Social -</strong>{ctr.cto_razao_social}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Cnpj -</strong>{ctr.cto_cnpj}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Endereço -</strong>{ctr.cto_endereco}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Telefone -</strong>{ctr.cto_telefone}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Tipo de Contrato -</strong>{ctr.tipo_do_contrato}</ListGroup.Item>
                                </ListGroup>
                            </Modal.Body>
                        </Col>
                        <Col>
                            <Modal.Body> 
                                <ListGroup>
                                    <ListGroup.Item><strong className="Description">Carencia -</strong>{ctr.carencia}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Inic-Vigencia -</strong>{ctr.i_vigencia}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Fim-Vigencia -</strong>{ctr.f_vigencia}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Valores -</strong>{ctr.valores}</ListGroup.Item>
                                    <ListGroup.Item><strong className="Description">Prazo -</strong>{ctr.prazos}</ListGroup.Item>
                                </ListGroup>
                            </Modal.Body>
                        </Col>
                    </Row>
                    <Row>
                        <Col>
                            <Modal.Body className="status-ct">
                                <ListGroup variant="flush">
                                    <ListGroup.Item className="text-success"><strong className="Description">Status -</strong>{ctr.status}</ListGroup.Item>
                                </ListGroup>
                            </Modal.Body>
                        </Col>
                    </Row>
                    <Modal.Footer>
                        <Link className="btn btn-danger" variant="secondary" onClick={handleClose}>
                            Close
                        </Link>
                    </Modal.Footer>
                </Modal>    
            ))}
        </div>
    )
}

export default Modale;