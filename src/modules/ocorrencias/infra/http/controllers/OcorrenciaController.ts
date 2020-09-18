import { Request, Response } from 'express';
import { container } from 'tsyringe';
import { parseISO } from 'date-fns';

import CriarOcorrencia from '@modules/ocorrencias/services/CriarOcorrencia';

export default class OcorrenciaController {
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
}
