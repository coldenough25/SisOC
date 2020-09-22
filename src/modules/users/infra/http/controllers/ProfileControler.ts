import { Request, Response } from 'express';
import { container } from 'tsyringe';
import { classToClass } from 'class-transformer';

import UpdateUserService from '@modules/users/services/AtualizarPerfil';
import ShowProfileService from '@modules/users/services/MostrarUsuario';

export default class ProfileController {
  public async show(request: Request, response: Response): Promise<Response> {
    const showProfile = container.resolve(ShowProfileService);
    const user = await showProfile.execute(Number(request.user.id));

    return response.json(user);
  }

  public async update(request: Request, response: Response): Promise<Response> {
    const { nome, email, senha_antiga, senha } = request.body;

    const updateUser = container.resolve(UpdateUserService);

    const user = await updateUser.execute({
      user_id: Number(request.user.id),
      nome,
      email,
      senha_antiga,
      senha,
    });

    return response.json(classToClass(user));
  }
}
