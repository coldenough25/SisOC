import { Request, Response } from 'express';
import { container } from 'tsyringe';

import ContarOcorrencia from '@modules/ocorrencias/services/ContarOcorrencia';

export default class ContarOcorrenciaController {
  public async show(request: Request, response: Response): Promise<Response> {
    const listarOcorrencias = container.resolve(ContarOcorrencia);

    const ocorrencias = await listarOcorrencias.execute(request.user.id);

    return response.json(ocorrencias);
  }
}
