import { injectable, inject } from 'tsyringe';

import IOcorrenciaRepository from '../repositories/IOcorrenciaRepository';
import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';
import IFiltrarOcorrenciaDTO from '../dtos/IFiltarOcorrenciaDTO';

@injectable()
export default class FiltrarOcorrencia {
  constructor(
    @inject('OcorrenciaRepository')
    private repository: IOcorrenciaRepository,
  ) {}

  public async execute({
    usuario_id,
    situacao,
  }: IFiltrarOcorrenciaDTO): Promise<Ocorrencia[]> {
    const ocorrencias = await this.repository.listaFiltrada({
      usuario_id,
      situacao,
    });

    return ocorrencias;
  }
}
