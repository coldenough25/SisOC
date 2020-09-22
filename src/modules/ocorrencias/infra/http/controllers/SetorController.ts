import { Request, Response } from 'express';
import { container } from 'tsyringe';

import CriarSetor from '@modules/ocorrencias/services/CriarSetor';
import MostrarSetor from '@modules/ocorrencias/services/MostrarSetor';
import ListarSetor from '@modules/ocorrencias/services/ListarSetor';
import AtualizarSetor from '@modules/ocorrencias/services/AtualizarSetor';
import DeletarSetor from '@modules/ocorrencias/services/DeletarSetor';

export default class SetorController {
  public async index(request: Request, response: Response): Promise<Response> {
    const listarSetores = container.resolve(ListarSetor);
    const setores = await listarSetores.execute();

    return response.json(setores);
  }

  public async show(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;

    const mostrarSetor = container.resolve(MostrarSetor);
    const setor = await mostrarSetor.execute(Number(id));

    return response.json(setor);
  }

  public async create(request: Request, response: Response): Promise<Response> {
    const { email, nome, sigla } = request.body;

    const criarSetor = container.resolve(CriarSetor);

    const setor = await criarSetor.execute({
      email,
      nome,
      sigla,
    });

    return response.json(setor);
  }

  public async update(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;
    const { email, nome, sigla } = request.body;

    const atualizarSetor = container.resolve(AtualizarSetor);
    const setor = await atualizarSetor.execute({
      id: Number(id),
      email,
      nome,
      sigla,
    });

    return response.json(setor);
  }

  public async delete(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;

    const deletarSetor = container.resolve(DeletarSetor);
    await deletarSetor.execute(Number(id));

    return response.status(204).send();
  }
}
