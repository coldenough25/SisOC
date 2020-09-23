import { Request, Response } from 'express';
import { container } from 'tsyringe';
import { classToClass } from 'class-transformer';

import CreateUserService from '@modules/users/services/CreateUserService';
import DeletarUsuario from '@modules/users/services/DeletarUsuario';
import AtualizarUsuario from '@modules/users/services/AtualizarUsuario';
import MostrarUsuario from '@modules/users/services/MostrarUsuario';
import ListarUsuario from '@modules/users/services/ListarUsuario';

export default class UserController {
  public async index(request: Request, response: Response): Promise<Response> {
    const listarUsuarios = container.resolve(ListarUsuario);
    const usuarios = await listarUsuarios.execute();

    return response.json(classToClass(usuarios));
  }

  public async create(request: Request, response: Response): Promise<Response> {
    const { nome, email, senha, ra_siape, usuario_tipo_id } = request.body;

    const createUser = container.resolve(CreateUserService);

    const newUser = await createUser.execute({
      nome,
      email,
      senha,
      ra_siape,
      usuario_tipo_id,
    });

    return response.json(classToClass(newUser));
  }

  public async show(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;

    const mostrarUsuario = container.resolve(MostrarUsuario);
    const usuario = await mostrarUsuario.execute(Number(id));

    return response.json(classToClass(usuario));
  }

  public async update(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;
    const { nome, email, ra_siape, usuario_tipo_id, senha } = request.body;

    const atualizarUsuario = container.resolve(AtualizarUsuario);
    const usuario = await atualizarUsuario.execute({
      user_id: Number(id),
      nome,
      email,
      ra_siape,
      usuario_tipo_id,
      senha,
    });

    return response.json(classToClass(usuario));
  }

  public async delete(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;

    const deleteUserService = container.resolve(DeletarUsuario);
    await deleteUserService.execute(Number(id));

    return response.status(204).send();
  }
}
