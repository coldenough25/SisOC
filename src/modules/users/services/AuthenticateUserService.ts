import { sign } from 'jsonwebtoken';
import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import authConfig from '@config/auth';

import Usuario from '../infra/typeorm/entities/Usuario';
import IUserRepository from '../repositories/IUserRepository';
import IHashProvider from '../providers/HashProvider/models/IHashProvider';

interface IRequest {
  email: string;
  senha: string;
}

interface IResponse {
  user: Usuario;
  token: string;
}

@injectable()
export default class AuthenticateUserService {
  constructor(
    @inject('UserRepository')
    private repository: IUserRepository,
    @inject('HashProvider')
    private hashProvider: IHashProvider,
  ) {}

  public async execute({ email, senha }: IRequest): Promise<IResponse> {
    const user = await this.repository.findByEmail(email);

    if (!user) {
      throw new AppError('Incorrect email or password', 401);
    }

    const passwordMatched = await this.hashProvider.compare(senha, user.senha);

    if (!passwordMatched) {
      throw new AppError('Incorrect email or password', 401);
    }

    const { secret, expiresIn } = authConfig.jwt;

    const token = sign({ subject: user.id }, secret, {
      expiresIn,
    });

    return {
      user,
      token,
    };
  }
}
