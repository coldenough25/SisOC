import { injectable, inject } from 'tsyringe';

import IOcorrenciaRepository from '../repositories/IOcorrenciaRepository';
import ICriarOcorrenciaDTO from '../dtos/ICriarOcorrenciaDTO';
import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';

@injectable()
export default class CriarOcorrencia {
  constructor(
    @inject('OcorrenciaRepository')
    private repository: IOcorrenciaRepository,
  ) {}

  public async execute({
    datahora,
    descricao,
    situacao,
    ocorrencia_tipo_id,
  }: ICriarOcorrenciaDTO): Promise<Ocorrencia> {
    const ocorrencia = await this.repository.create({
      datahora,
      descricao,
      situacao,
      ocorrencia_tipo_id,
    });

    return ocorrencia;
  }
}
