import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import IOcorrenciaRepository from '../repositories/IOcorrenciaRepository';
import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';

@injectable()
export default class DeletarOcorrencia {
  constructor(
    @inject('OcorrenciaRepository')
    private repository: IOcorrenciaRepository,
  ) {}

  public async execute(id: number): Promise<Ocorrencia> {
    const ocorrencia = await this.repository.findById(id);
    if (!ocorrencia) throw new AppError('Esta ocorrencia não existe');

    ocorrencia.situacao = 'F';

    await this.repository.save(ocorrencia);

    return ocorrencia;
  }
}
