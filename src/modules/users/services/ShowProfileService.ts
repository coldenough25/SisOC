import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';

import IUserRepository from '../repositories/IUserRepository';
import Usuario from '../infra/typeorm/entities/Usuario';

interface IRequest {
  user_id: number;
}

@injectable()
export default class ShowProfileService {
  constructor(
    @inject('UserRepository')
    private repository: IUserRepository,
  ) {}

  public async execute({ user_id }: IRequest): Promise<Usuario> {
    const user = await this.repository.findById(user_id);

    if (!user) {
      throw new AppError('You are not authenticated', 401);
    }
    return user;
  }
}
