import path from 'path';
import { injectable, inject } from 'tsyringe';

import IMailProvider from '@shared/container/providers/MailProvider/models/IMailProvider';
import AppError from '@shared/errors/AppError';

import IOcorrenciaRepository from '../repositories/IOcorrenciaRepository';
import ICriarOcorrenciaDTO from '../dtos/ICriarOcorrenciaDTO';
import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';
import IOcorrenciaTipoRepository from '../repositories/IOcorrenciaTipoRepository';

@injectable()
export default class CriarOcorrencia {
  constructor(
    @inject('OcorrenciaRepository')
    private repository: IOcorrenciaRepository,
    @inject('OcorrenciaTipoRepository')
    private OcTipoRepo: IOcorrenciaTipoRepository,
    @inject('MailProvider')
    private mailProvier: IMailProvider,
  ) {}

  public async execute({
    datahora,
    descricao,
    situacao,
    ocorrencia_tipo_id,
  }: ICriarOcorrenciaDTO): Promise<Ocorrencia> {
    const mailTemplate = path.resolve(
      __dirname,
      '..',
      'templates',
      'setor_ocorrencia.hbs',
    );

    const ocorrencia = await this.repository.create({
      datahora,
      descricao,
      situacao,
      ocorrencia_tipo_id,
    });

    const ocTipo = await this.OcTipoRepo.findById(ocorrencia_tipo_id);
    if (!ocTipo) throw new AppError('Setor não encontrado');
    const { setor } = ocTipo;

    await this.mailProvier.send({
      to: {
        name: setor.nome,
        email: setor.email,
      },
      subject: 'Nova ocorrência registrada',
      templateData: {
        templateFile: mailTemplate,
        variables: {
          setor: setor.nome,
          link: `http://localhost:3000/ocorrencia/editar/${ocorrencia.id}`,
        },
      },
    });

    return ocorrencia;
  }
}
