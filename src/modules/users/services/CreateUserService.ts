import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import IUserRepository from '../repositories/IUserRepository';
import IHashProvider from '../providers/HashProvider/models/IHashProvider';

import Usuario from '../infra/typeorm/entities/Usuario';
import ICreateUserDTO from '../dtos/ICreateUserDTO';

@injectable()
export default class CreateUserService {
  constructor(
    @inject('UserRepository')
    private repository: IUserRepository,
    @inject('HashProvider')
    private hashProvider: IHashProvider,
  ) {}

  public async execute({
    nome,
    ra_siape,
    email,
    senha,
    usuario_tipo_id,
  }: ICreateUserDTO): Promise<Usuario> {
    const userExists = await this.repository.findByEmail(email);

    if (userExists) {
      throw new AppError('E-mail em uso');
    }

    const password_hash = await this.hashProvider.generate(senha);

    const newUser = await this.repository.create({
      nome,
      ra_siape,
      email,
      senha: password_hash,
      usuario_tipo_id,
    });

    return newUser;
  }
}
