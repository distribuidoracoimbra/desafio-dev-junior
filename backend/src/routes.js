const express = require('express');

const Gestao_de_contrato = require('./Controller/Controller_gestao_de_contrato')

const routes = express.Router()

routes.get('/gestao_de_contrato', Gestao_de_contrato.index)
routes.post('/Cgestao_de_contrato', Gestao_de_contrato.create)

routes.get('/gestao_de_contrato/:id', Gestao_de_contrato.list)

module.exports = routes;
