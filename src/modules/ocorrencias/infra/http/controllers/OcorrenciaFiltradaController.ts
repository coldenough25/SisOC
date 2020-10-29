import { Request, Response } from 'express';
import { container } from 'tsyringe';

import FiltrarOcorrencia from '@modules/ocorrencias/services/FiltrarOcorrencia';

export default class OcorrenciaFiltradaController {
  public async index(request: Request, response: Response): Promise<Response> {
    const { situacao } = request.params;
    const listarOcorrencias = container.resolve(FiltrarOcorrencia);

    const ocorrencias = await listarOcorrencias.execute({
      usuario_id: request.user.id,
      situacao,
    });

    return response.json(ocorrencias);
  }
}
