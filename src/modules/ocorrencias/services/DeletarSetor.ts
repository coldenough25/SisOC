import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import ISetorRepository from '../repositories/ISetorRepository';

@injectable()
export default class DeletarSetor {
  constructor(
    @inject('SetorRepository')
    private repository: ISetorRepository,
  ) {}

  public async execute(id: number): Promise<void> {
    const setor = await this.repository.findById(id);
    if (!setor) throw new AppError('Este setor não existe');

    try {
      await this.repository.delete(id);
    } catch {
      throw new AppError('Não foi possível apagar este setor');
    }
  }
}
