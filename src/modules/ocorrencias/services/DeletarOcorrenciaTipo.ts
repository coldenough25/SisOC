import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import IOcorrenciaTipoRepository from '../repositories/IOcorrenciaTipoRepository';

@injectable()
export default class DeletarOcorrenciaTipo {
  constructor(
    @inject('OcorrenciaTipoRepository')
    private repository: IOcorrenciaTipoRepository,
  ) {}

  public async execute(id: number): Promise<void> {
    const tipo = await this.repository.findById(id);
    if (!tipo) throw new AppError('Este tipo não existe');

    try {
      await this.repository.delete(id);
    } catch {
      throw new AppError('Não foi possível apagar este tipo');
    }
  }
}
