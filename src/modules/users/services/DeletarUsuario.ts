import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';

import IUsuarioRepository from '../repositories/IUserRepository';

@injectable()
export default class DeletarUsuario {
  constructor(
    @inject('UserRepository')
    private repository: IUsuarioRepository,
  ) {}

  public async execute(id: number): Promise<void> {
    if (id < 0) throw new AppError('Este usuário não existe');

    try {
      await this.repository.delete(id);
    } catch {
      throw new AppError('Não foi possível apagar este usuário', 403);
    }
  }
}
