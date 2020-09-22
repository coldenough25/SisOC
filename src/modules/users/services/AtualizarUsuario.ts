import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';

import IUserRepository from '../repositories/IUserRepository';
import IHashProvider from '../providers/HashProvider/models/IHashProvider';

import Usuario from '../infra/typeorm/entities/Usuario';

interface IRequest {
  user_id: number;
  email: string;
  nome: string;
  ra_siape: string;
  usuario_tipo_id: number;
  senha?: string;
}

@injectable()
export default class AtualizarUsuario {
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
    ra_siape,
    usuario_tipo_id,
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

    if (senha) {
      user.senha = await this.hashProvider.generate(senha);
    }

    user.nome = nome;
    user.email = email;
    user.ra_siape = ra_siape;
    user.usuario_tipo_id = usuario_tipo_id;

    return this.repository.save(user);
  }
}
