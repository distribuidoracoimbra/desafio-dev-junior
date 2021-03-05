
exports.up = function (knex) {
    return knex.schema.createTable('Gestao_de_contrato', function (table) {
        table.increments('id').notNullable();
        table.string('hash').notNullable();

        table.string('cte_razao_social').notNullable();
        table.string('cte_cnpj').notNullable();
        table.string('cte_endereco').notNullable();
        table.string('cte_telefone').notNullable();

        table.string('cto_razao_social').notNullable();
        table.string('cto_cnpj').notNullable();
        table.string('cto_endereco').notNullable();
        table.string('cto_telefone').notNullable();

        table.string('tipo_do_contrato').notNullable();

        table.string('carencia').notNullable();
        table.string('i_vigencia').notNullable();
        table.string('f_vigencia').notNullable();
        table.string('valores').notNullable();
        table.string('prazos').notNullable();

        table.string('status').notNullable();
    })
};

exports.down = function (knex) {
    return knex.schema.dropTable('Gestao_de_contrato')
};
