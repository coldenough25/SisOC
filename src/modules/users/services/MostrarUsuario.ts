import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';

import IUserRepository from '../repositories/IUserRepository';
import Usuario from '../infra/typeorm/entities/Usuario';

@injectable()
export default class MostrarUsuario {
  constructor(
    @inject('UserRepository')
    private repository: IUserRepository,
  ) {}

  public async execute(id: number): Promise<Usuario> {
    const user = await this.repository.findById(id);

    if (!user) {
      throw new AppError('Este usuário não existe', 400);
    }
    return user;
  }
}
