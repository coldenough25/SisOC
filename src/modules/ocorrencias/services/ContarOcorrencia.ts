import { injectable, inject } from 'tsyringe';
import IContarOcorrenciaDTO from '../dtos/IContarOcorrenciaDTO';

import IOcorrenciaRepository from '../repositories/IOcorrenciaRepository';

@injectable()
export default class ContarOcorrencia {
  constructor(
    @inject('OcorrenciaRepository')
    private repository: IOcorrenciaRepository,
  ) {}

  public async execute(usuario: number): Promise<IContarOcorrenciaDTO[]> {
    const ocorrencias = await this.repository.contar(usuario);

    return ocorrencias;
  }
}
