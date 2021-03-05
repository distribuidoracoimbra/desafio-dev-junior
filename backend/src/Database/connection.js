const knex = require('knex')
const conf = require('../../knexfile')

const conect = knex(conf.development)

module.exports = conect