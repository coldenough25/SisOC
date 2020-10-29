import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import IOcorrenciaRepository from '../repositories/IOcorrenciaRepository';
import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';

@injectable()
export default class ListarTodasOcorrencias {
  constructor(
    @inject('OcorrenciaRepository')
    private repository: IOcorrenciaRepository,
  ) {}

  public async execute(tipo: string): Promise<Ocorrencia[]> {
    if (tipo !== 'admin') throw new AppError('Você não tem permissão', 401);

    const ocorrencias = await this.repository.list();

    return ocorrencias;
  }
}
