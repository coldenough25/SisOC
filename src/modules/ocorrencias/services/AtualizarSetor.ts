import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import Setor from '../infra/typeorm/entities/Setor';

import ISetorRepository from '../repositories/ISetorRepository';
import ICriarSetorDTO from '../dtos/ICriarSetorDTO';

interface IRequest extends ICriarSetorDTO {
  id: number;
}

@injectable()
export default class AtualizarSetor {
  constructor(
    @inject('SetorRepository')
    private repository: ISetorRepository,
  ) {}

  public async execute({ id, email, nome, sigla }: IRequest): Promise<Setor> {
    const setor = await this.repository.findById(id);
    if (!setor) throw new AppError('Este setor não existe');

    Object.assign(setor, {
      email,
      nome,
      sigla,
    });

    await this.repository.save(setor);

    return setor;
  }
}
