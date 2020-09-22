import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';

import IOcorrenciaRepository from '../repositories/IOcorrenciaRepository';
import ICriarOcorrenciaDTO from '../dtos/ICriarOcorrenciaDTO';

interface IRequest extends ICriarOcorrenciaDTO {
  id: number;
}

@injectable()
export default class AtualizarOcorrencia {
  constructor(
    @inject('OcorrenciaRepository')
    private repository: IOcorrenciaRepository,
  ) {}

  public async execute({
    id,
    descricao,
    datahora,
    ocorrencia_tipo_id,
    situacao,
  }: IRequest): Promise<Ocorrencia> {
    const ocorrencia = await this.repository.findById(id);
    if (!ocorrencia) throw new AppError('Esta ocorrencia não existe');

    Object.assign(ocorrencia, {
      descricao,
      datahora,
      ocorrencia_tipo_id,
      situacao,
    });

    await this.repository.save(ocorrencia);

    return ocorrencia;
  }
}
