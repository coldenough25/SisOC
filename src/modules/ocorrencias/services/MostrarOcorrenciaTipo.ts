import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import IOcorrenciaTipoRepository from '../repositories/IOcorrenciaTipoRepository';
import OcorrenciaTipo from '../infra/typeorm/entities/OcorrenciaTipo';

@injectable()
export default class MostrarOcorrenciaTipo {
  constructor(
    @inject('OcorrenciaTipoRepository')
    private repository: IOcorrenciaTipoRepository,
  ) {}

  public async execute(id: number): Promise<OcorrenciaTipo> {
    const tipo = await this.repository.findById(id);
    if (!tipo) throw new AppError('Este tipo não existe');

    return tipo;
  }
}
