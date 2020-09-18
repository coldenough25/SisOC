import { MigrationInterface, QueryRunner, Table } from 'typeorm';

export default class CreateUsers1586897376222 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: 'setor',
        columns: [
          {
            name: 'id',
            type: 'serial',
            isPrimary: true,
          },
          {
            name: 'sigla',
            type: 'varchar',
          },
          {
            name: 'nome',
            type: 'varchar',
          },
          {
            name: 'email',
            type: 'varchar',
          },
        ],
      }),
    );

    await queryRunner.createTable(
      new Table({
        name: 'ocorrencia_tipo',
        columns: [
          {
            name: 'id',
            type: 'serial',
            isPrimary: true,
          },
          {
            name: 'nome',
            type: 'varchar',
          },
          {
            name: 'descricao',
            type: 'varchar',
          },
          {
            name: 'setor_id',
            type: 'integer',
          },
        ],
        foreignKeys: [
          {
            name: 'SetorOcorrencia',
            referencedColumnNames: ['id'],
            referencedTableName: 'setor',
            columnNames: ['setor_id'],
            onDelete: 'RESTRICT',
            onUpdate: 'CASCADE',
          },
        ],
      }),
    );

    await queryRunner.createTable(
      new Table({
        name: 'usuario_tipo',
        columns: [
          {
            name: 'id',
            type: 'serial',
            isPrimary: true,
          },
          {
            name: 'nome',
            type: 'varchar',
          },
          {
            name: 'descricao',
            type: 'varchar',
          },
        ],
      }),
    );

    await queryRunner.createTable(
      new Table({
        name: 'usuario',
        columns: [
          {
            name: 'id',
            type: 'serial',
            isPrimary: true,
          },
          {
            name: 'nome',
            type: 'varchar',
          },
          {
            name: 'ra_siape',
            type: 'varchar',
          },
          {
            name: 'email',
            type: 'varchar',
            isUnique: true,
          },
          {
            name: 'senha',
            type: 'varchar',
            isUnique: true,
          },
          {
            name: 'usuario_tipo_id',
            type: 'integer',
          },
          {
            name: 'created_at',
            type: 'timestamp',
            default: 'now()',
          },
          {
            name: 'updated_at',
            type: 'timestamp',
            default: 'now()',
          },
        ],
        foreignKeys: [
          {
            name: 'UsuarioTipo',
            referencedColumnNames: ['id'],
            referencedTableName: 'usuario_tipo',
            columnNames: ['usuario_tipo_id'],
            onDelete: 'RESTRICT',
            onUpdate: 'CASCADE',
          },
        ],
      }),
    );

    await queryRunner.createTable(
      new Table({
        name: 'ocorrencia',
        columns: [
          {
            name: 'id',
            type: 'serial',
            isPrimary: true,
          },
          {
            name: 'descricao',
            type: 'varchar',
          },
          {
            name: 'situacao',
            type: 'char',
            length: '1',
          },
          {
            name: 'datahora',
            type: 'timestamp with time zone',
          },
          {
            name: 'ocorrencia_tipo_id',
            type: 'integer',
          },
          {
            name: 'created_at',
            type: 'timestamp',
            default: 'now()',
          },
          {
            name: 'updated_at',
            type: 'timestamp',
            default: 'now()',
          },
        ],
        foreignKeys: [
          {
            name: 'OcorrenciaTipo',
            referencedColumnNames: ['id'],
            referencedTableName: 'ocorrencia_tipo',
            columnNames: ['ocorrencia_tipo_id'],
            onDelete: 'RESTRICT',
            onUpdate: 'CASCADE',
          },
        ],
      }),
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable('usuario');
  }
}
