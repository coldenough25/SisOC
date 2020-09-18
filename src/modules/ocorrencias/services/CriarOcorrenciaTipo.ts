import { injectable, inject } from 'tsyringe';

import IOcorrenciaTipoRepository from '../repositories/IOcorrenciaTipoRepository';

import ICriarOcorrenciaTipoDTO from '../dtos/ICriarOcorrenciaTipoDTO';
import OcorrenciaTipo from '../infra/typeorm/entities/OcorrenciaTipo';

@injectable()
export default class CriarOcorrenciaTipo {
  constructor(
    @inject('OcorrenciaTipoRepository')
    private repository: IOcorrenciaTipoRepository,
  ) {}

  public async execute({
    descricao,
    nome,
    setor_id,
  }: ICriarOcorrenciaTipoDTO): Promise<OcorrenciaTipo> {
    const tipo = await this.repository.create({
      descricao,
      nome,
      setor_id,
    });

    return tipo;
  }
}
