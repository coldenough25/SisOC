import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import OcorrenciaTipo from '../infra/typeorm/entities/OcorrenciaTipo';

import IOcorrenciaTipoRepository from '../repositories/IOcorrenciaTipoRepository';
import ICriarOcorrenciaTipoDTO from '../dtos/ICriarOcorrenciaTipoDTO';

interface IRequest extends ICriarOcorrenciaTipoDTO {
  id: number;
}

@injectable()
export default class AtualizarOcorrenciaTipo {
  constructor(
    @inject('OcorrenciaTipoRepository')
    private repository: IOcorrenciaTipoRepository,
  ) {}

  public async execute({
    id,
    nome,
    setor_id,
    descricao,
  }: IRequest): Promise<OcorrenciaTipo> {
    const tipo = await this.repository.findById(id);
    if (!tipo) throw new AppError('Este tipo não existe');

    Object.assign(tipo, {
      nome,
      setor_id,
      descricao,
    });

    await this.repository.save(tipo);

    return tipo;
  }
}
