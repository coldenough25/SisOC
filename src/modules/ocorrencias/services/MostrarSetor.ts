import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import ISetorRepository from '../repositories/ISetorRepository';
import Setor from '../infra/typeorm/entities/Setor';

@injectable()
export default class MostrarSetor {
  constructor(
    @inject('SetorRepository')
    private repository: ISetorRepository,
  ) {}

  public async execute(id: number): Promise<Setor> {
    const setor = await this.repository.findById(id);
    if (!setor) throw new AppError('Este setor não existe');

    return setor;
  }
}
