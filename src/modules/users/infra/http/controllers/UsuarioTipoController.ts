import { Request, Response } from 'express';
import { container } from 'tsyringe';

import CriarUsuarioTipo from '@modules/users/services/CriarUsuarioTipo';
import ListarUsuarioTipo from '@modules/users/services/ListarUsuarioTipo';
import DeletarUsuarioTipo from '@modules/users/services/DeletarUsuarioTipo';
import MostrarUsuarioTipo from '@modules/users/services/MostrarUsuarioTipo';
import AtualizarUsuarioTipo from '@modules/users/services/AtualizarUsuarioTipo';

export default class UsuarioTipoController {
  public async index(request: Request, response: Response): Promise<Response> {
    const listarUsuarioTipo = container.resolve(ListarUsuarioTipo);
    const usuarioTipos = await listarUsuarioTipo.execute();

    return response.json(usuarioTipos);
  }

  public async create(request: Request, response: Response): Promise<Response> {
    const { nome, descricao } = request.body;

    const criarUsuarioTipo = container.resolve(CriarUsuarioTipo);

    const tipo = await criarUsuarioTipo.execute({
      nome,
      descricao,
    });

    return response.json(tipo);
  }

  public async delete(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;

    const deletarUsuarioTipo = container.resolve(DeletarUsuarioTipo);
    await deletarUsuarioTipo.execute(Number(id));

    return response.status(204).send();
  }

  public async show(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;

    const mostrarUsuarioTipo = container.resolve(MostrarUsuarioTipo);
    const tipo = await mostrarUsuarioTipo.execute(Number(id));
    return response.json(tipo);
  }

  public async update(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;
    const { nome, descricao } = request.body;

    const atualizarUsuarioTipo = container.resolve(AtualizarUsuarioTipo);
    const tipoAtualizado = await atualizarUsuarioTipo.execute({
      id: Number(id),
      nome,
      descricao,
    });

    return response.json(tipoAtualizado);
  }
}
