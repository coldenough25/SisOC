import { Request, Response } from 'express';
import { container } from 'tsyringe';
import { parseISO } from 'date-fns';

import CriarOcorrencia from '@modules/ocorrencias/services/CriarOcorrencia';
import AtualizarOcorrencia from '@modules/ocorrencias/services/AtualizarOcorrencia';
import ListarOcorrencia from '@modules/ocorrencias/services/ListarOcorrencia';
import MostrarOcorrencia from '@modules/ocorrencias/services/MostrarOcorrencia';
import DeletarOcorrencia from '@modules/ocorrencias/services/DeletarOcorrencia';

export default class OcorrenciaController {
  public async index(request: Request, response: Response): Promise<Response> {
    const listarOcorrencias = container.resolve(ListarOcorrencia);
    const ocorrencias = await listarOcorrencias.execute();

    return response.json(ocorrencias);
  }

  public async show(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;
    const mostrarOcorrencia = container.resolve(MostrarOcorrencia);
    const ocorrencia = await mostrarOcorrencia.execute(Number(id));

    return response.json(ocorrencia);
  }

  public async create(request: Request, response: Response): Promise<Response> {
    const { descricao, situacao, datahora, ocorrencia_tipo_id } = request.body;

    const parsedDate = parseISO(datahora);

    const criarOcorrencia = container.resolve(CriarOcorrencia);
    const ocorrencia = await criarOcorrencia.execute({
      descricao,
      situacao,
      datahora: parsedDate,
      ocorrencia_tipo_id,
    });

    return response.json(ocorrencia);
  }

  public async update(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;
    const { datahora, descricao, ocorrencia_tipo_id, situacao } = request.body;
    const parsedDate = parseISO(datahora);

    const atualizarOcorrencia = container.resolve(AtualizarOcorrencia);
    const ocorrencia = await atualizarOcorrencia.execute({
      id: Number(id),
      datahora: parsedDate,
      descricao,
      ocorrencia_tipo_id,
      situacao,
    });

    return response.json(ocorrencia);
  }

  public async delete(request: Request, response: Response): Promise<Response> {
    const { id } = request.params;

    const deletarOcorrencia = container.resolve(DeletarOcorrencia);
    const ocorrencia = await deletarOcorrencia.execute(Number(id));

    return response.json(ocorrencia);
  }
}
