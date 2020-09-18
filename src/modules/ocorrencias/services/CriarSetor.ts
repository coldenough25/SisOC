import { injectable, inject } from 'tsyringe';

import ISetorRepository from '../repositories/ISetorRepository';

import ICriarSetorDTO from '../dtos/ICriarSetorDTO';
import Setor from '../infra/typeorm/entities/Setor';

@injectable()
export default class CriarSetor {
  constructor(
    @inject('SetorRepository')
    private repository: ISetorRepository,
  ) {}

  public async execute({ email, nome, sigla }: ICriarSetorDTO): Promise<Setor> {
    const setor = await this.repository.create({
      email,
      nome,
      sigla,
    });

    return setor;
  }
}
