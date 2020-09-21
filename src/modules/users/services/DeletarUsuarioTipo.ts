import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';

import IUsuarioTipoRepository from '../repositories/IUsuarioTipoRepository';

@injectable()
export default class DeletarUsuarioTipo {
  constructor(
    @inject('UsuarioTipoRepository')
    private repository: IUsuarioTipoRepository,
  ) {}

  public async execute(id: number): Promise<void> {
    if (id < 0) throw new AppError('Este tipo não existe');

    try {
      await this.repository.delete(id);
    } catch {
      throw new AppError('Este tipo está sendo usado', 403);
    }
  }
}
