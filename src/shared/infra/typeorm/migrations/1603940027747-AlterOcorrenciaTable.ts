import {
  MigrationInterface,
  QueryRunner,
  TableColumn,
  TableForeignKey,
} from 'typeorm';

export default class AlterOcorrenciaTable1603940027747
  implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.addColumn(
      'ocorrencia',
      new TableColumn({ name: 'criador', type: 'integer', isNullable: true }),
    );

    await queryRunner.addColumn(
      'ocorrencia',
      new TableColumn({ name: 'alvo', type: 'varchar', isNullable: true }),
    );

    await queryRunner.createForeignKey(
      'ocorrencia',
      new TableForeignKey({
        name: 'CriadorUsuarioOcorrencia',
        columnNames: ['criador'],
        referencedColumnNames: ['id'],
        referencedTableName: 'usuario',
        onUpdate: 'CASCADE',
        onDelete: 'RESTRICT',
      }),
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropForeignKey('ocorrencia', 'CriadorUsuarioOcorrencia');
    await queryRunner.dropColumn('ocorrencia', 'alvo');
    await queryRunner.dropColumn('ocorrencia', 'criador');
  }
}
