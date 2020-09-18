import { Request, Response } from 'express';
import { container } from 'tsyringe';

import CreateUserService from '@modules/users/services/CreateUserService';

export default class UserController {
  public async create(request: Request, response: Response): Promise<Response> {
    const { nome, email, senha, ra_siape } = request.body;

    const createUser = container.resolve(CreateUserService);

    const newUser = await createUser.execute({
      nome,
      email,
      senha,
      ra_siape,
    });

    delete newUser.senha;

    return response.json(newUser);
  }
}
