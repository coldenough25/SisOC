import { Request, Response } from 'express';
import { container } from 'tsyringe';

import ListarOcorrenciaTipo from '@modules/ocorrencias/services/ListarOcorrenciaTipo';
import MostrarOcorrenciaTipo from '@modules/ocorrencias/services/MostrarOcorrenciaTipo';
import CriarOcorrenciaTipo from '@modules/ocorrencias/services/CriarOcorrenciaTipo';
import AtualizarOcorrenciaTipo from '@modules/ocorrencias/services/AtualizarOcorrenciaTipo';
import DeletarOcorrenciaTipo from '@modules/ocorrencias/services/DeletarOcorrenciaTipo';

export default class OcorrenciaTipoController {
  public async index(request: Request, response: Response): Promise<Response> {
    const listarOcorrenciaTipo = container.resolve(ListarOcorrenciaTipo);
    const ocorrencias = await listarOcorrenciaTipo.execute();

    return response.json(ocorrencias);
  }

  public async show(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;

    const mostrarOcorrenciaTipo = container.resolve(MostrarOcorrenciaTipo);
    const ocorrencia = await mostrarOcorrenciaTipo.execute(Number(id));

    return response.json(ocorrencia);
  }

  public async create(request: Request, response: Response): Promise<Response> {
    const { descricao, nome, setor_id } = request.body;

    const criarOcorrenciaTipo = container.resolve(CriarOcorrenciaTipo);

    const ocorrencia = await criarOcorrenciaTipo.execute({
      descricao,
      nome,
      setor_id,
    });

    return response.json(ocorrencia);
  }

  public async update(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;
    const { nome, setor_id, descricao } = request.body;

    const atualizarTipo = container.resolve(AtualizarOcorrenciaTipo);
    const tipo = await atualizarTipo.execute({
      id: Number(id),
      nome,
      setor_id,
      descricao,
    });

    return response.json(tipo);
  }

  public async delete(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;

    const deletarTipo = container.resolve(DeletarOcorrenciaTipo);
    await deletarTipo.execute(Number(id));

    return response.status(204).send();
  }
}
