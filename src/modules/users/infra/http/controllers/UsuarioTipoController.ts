import { Request, Response } from 'express';
import { container } from 'tsyringe';

import CreateUserService from '@modules/users/services/CreateUserService';

export default class UsuarioTipoController {
  public async create(request: Request, response: Response): Promise<Response> {
    const { nome, email, senha, ra_siape } = request.body;

    const createUser = container.resolve(CreateUserService);

    const tipo = await createUser.execute({
      nome,
      email,
      senha,
      ra_siape,
    });

    return response.json(tipo);
  }
}
