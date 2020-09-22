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
export default class AtualizarPerfil {
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
      throw new AppError('Este usuário não existe', 400);
    }

    const userExists = await this.repository.findByEmail(email);

    if (userExists && user_id !== userExists.id) {
      throw new AppError('E-mail em uso');
    }

    if (senha && !senha_antiga) {
      throw new AppError('Você precisa informar sua senha antiga');
    }

    if (senha && senha_antiga) {
      const checkOldPassword = await this.hashProvider.compare(
        senha_antiga,
        user.senha,
      );

      if (!checkOldPassword) {
        throw new AppError('A senha antiga está incorreta');
      }

      user.senha = await this.hashProvider.generate(senha);
    }

    user.nome = nome;
    user.email = email;

    return this.repository.save(user);
  }
}
