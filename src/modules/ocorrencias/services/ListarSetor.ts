import { injectable, inject } from 'tsyringe';

import ISetorRepository from '../repositories/ISetorRepository';
import Setor from '../infra/typeorm/entities/Setor';

@injectable()
export default class ListarSetor {
  constructor(
    @inject('SetorRepository')
    private repository: ISetorRepository,
  ) {}

  public async execute(): Promise<Setor[]> {
    const setores = await this.repository.list();

    return setores;
  }
}
