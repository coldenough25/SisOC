import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';

import IUserRepository from '../repositories/IUserRepository';
import IHashProvider from '../providers/HashProvider/models/IHashProvider';

import Usuario from '../infra/typeorm/entities/Usuario';

interface IRequest {
  user_id: number;
  email: string;
  nome: string;
  senha_antiga?: string;
  senha?: string;
}

@injectable()
export default class UpdateUserService {
  constructor(
    @inject('UserRepository')
    private repository: IUserRepository,
    @inject('HashProvider')
    private hashProvider: IHashProvider,
  ) {}

  public async execute({
    user_id,
    email,
    nome,
    senha_antiga,
    senha,
  }: IRequest): Promise<Usuario> {
    const user = await this.repository.findById(user_id);

    if (!user) {
      throw new AppError('You are not authenticated', 401);
    }

    const userExists = await this.repository.findByEmail(email);

    if (userExists && user_id !== userExists.id) {
      throw new AppError('E-mail already in use');
    }

    if (senha && !senha_antiga) {
      throw new AppError('Wrong old password');
    }

    if (senha && senha_antiga) {
      const checkOldPassword = await this.hashProvider.compare(
        senha_antiga,
        user.senha,
      );

      if (!checkOldPassword) {
        throw new AppError('Wrong old password');
      }

      user.senha = await this.hashProvider.generate(senha);
    }

    user.nome = nome;
    user.email = email;

    return this.repository.save(user);
  }
}
