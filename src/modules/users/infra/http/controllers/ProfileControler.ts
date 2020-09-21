import { Request, Response } from 'express';
import { container } from 'tsyringe';

import UpdateUserService from '@modules/users/services/UpdateUserService';
import ShowProfileService from '@modules/users/services/ShowProfileService';

export default class ProfileController {
  public async show(request: Request, response: Response): Promise<Response> {
    const showProfile = container.resolve(ShowProfileService);
    const user = await showProfile.execute({
      user_id: Number(request.user.id),
    });

    delete user?.senha;

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

    delete user?.senha;

    return response.json(user);
  }
}
