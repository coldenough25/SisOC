import { getRepository, Repository } from 'typeorm';

import IOcorrenciaTipoRepository from '@modules/ocorrencias/repositories/IOcorrenciaTipoRepository';
import ICriarOcorrenciaTipoDTO from '@modules/ocorrencias/dtos/ICriarOcorrenciaTipoDTO';

import OcorrenciaTipo from '../entities/OcorrenciaTipo';

export default class OcorrenciaTipoRepository
  implements IOcorrenciaTipoRepository {
  private ormRepository: Repository<OcorrenciaTipo>;

  constructor() {
    this.ormRepository = getRepository(OcorrenciaTipo);
  }

  public async findById(id: string): Promise<OcorrenciaTipo | undefined> {
    const foundOcorrenciaTipo = await this.ormRepository.findOne(id);
    return foundOcorrenciaTipo;
  }

  public async create(data: ICriarOcorrenciaTipoDTO): Promise<OcorrenciaTipo> {
    const tipo = this.ormRepository.create(data);
    await this.ormRepository.save(tipo);

    return tipo;
  }

  public async save(tipo: OcorrenciaTipo): Promise<OcorrenciaTipo> {
    return this.ormRepository.save(tipo);
  }
}
