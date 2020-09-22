import { injectable, inject } from 'tsyringe';

import IOcorrenciaTipoRepository from '../repositories/IOcorrenciaTipoRepository';
import OcorrenciaTipo from '../infra/typeorm/entities/OcorrenciaTipo';

@injectable()
export default class ListarOcorrenciaTipo {
  constructor(
    @inject('OcorrenciaTipoRepository')
    private repository: IOcorrenciaTipoRepository,
  ) {}

  public async execute(): Promise<OcorrenciaTipo[]> {
    const tipos = await this.repository.list();

    return tipos;
  }
}
