import { injectable, inject } from 'tsyringe';

import IOcorrenciaRepository from '../repositories/IOcorrenciaRepository';
import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';

@injectable()
export default class ListarOcorrencia {
  constructor(
    @inject('OcorrenciaRepository')
    private repository: IOcorrenciaRepository,
  ) {}

  public async execute(): Promise<Ocorrencia[]> {
    const ocorrencias = await this.repository.list();

    return ocorrencias;
  }
}
