import { Request, Response } from 'express';
import { container } from 'tsyringe';

import CriarOcorrenciaTipo from '@modules/ocorrencias/services/CriarOcorrenciaTipo';

export default class OcorrenciaTipoController {
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
}
