const conect = require('../Database/connection')
const crypto = require('crypto');
const { stat } = require('fs');

var name = 'hashContrato';
var hash = crypto.createHash('md5').update(name).digest('hex')

module.exports = {
    async index(req, res){
        const {tipo_do_contrato} = req.query
        const {status} = req.query
        const {i_vigencia} = req.query

        if (tipo_do_contrato == '' && status == ''&& i_vigencia == '') {
            const Gestao_de_contrato = await conect('Gestao_de_contrato')
                .select('*')
            return res.json(Gestao_de_contrato)
        }   

        const Gestao_de_contrato = await conect('Gestao_de_contrato')
            .where({tipo_do_contrato})
            .andWhere({i_vigencia})
            .andWhere({status})
            .select('*')

        return res.json(Gestao_de_contrato)

    },
    
    async create(req, res){
        
        const {
            cte_razao_social, cte_cnpj, cte_endereco, cte_telefone, 
            cto_razao_social, cto_cnpj, cto_endereco, cto_telefone,
            tipo_do_contrato,
            carencia, i_vigencia, f_vigencia, valores, prazos,
            status
        } = req.body

        await conect('Gestao_de_contrato').insert({
            hash,
            cte_razao_social, cte_cnpj, cte_endereco, cte_telefone, 
            cto_razao_social, cto_cnpj, cto_endereco, cto_telefone,
            tipo_do_contrato,
            carencia, i_vigencia, f_vigencia, valores, prazos,
            status
        })

        return res.json({ 'success': 'Cadastro Comcluído com sucesso'})
    },

    async list(req, res){
        
        const { id } = req.params

        const gestao_de_contrato = await conect('Gestao_de_contrato').where('id', id)

        return res.json(gestao_de_contrato)
    },
}