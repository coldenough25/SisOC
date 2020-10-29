import { Request, Response } from 'express';
import { container } from 'tsyringe';

import ListarTodasOcorrencias from '@modules/ocorrencias/services/ListarTodasOcorrencias';

export default class TodasOcorrenciasController {
  public async index(request: Request, response: Response): Promise<Response> {
    const listarOcorrencias = container.resolve(ListarTodasOcorrencias);

    const ocorrencias = await listarOcorrencias.execute(request.user.tipo);

    return response.json(ocorrencias);
  }
}
