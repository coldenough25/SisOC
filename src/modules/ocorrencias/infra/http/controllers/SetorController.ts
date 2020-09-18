import { Request, Response } from 'express';
import { container } from 'tsyringe';

import CriarSetor from '@modules/ocorrencias/services/CriarSetor';

export default class SetorController {
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
}
