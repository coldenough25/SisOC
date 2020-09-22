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

  public async findById(id: number): Promise<OcorrenciaTipo | undefined> {
    const tipo = await this.ormRepository.findOne(id);
    return tipo;
  }

  public async list(): Promise<OcorrenciaTipo[]> {
    const tipos = await this.ormRepository.find();
    return tipos;
  }

  public async create(data: ICriarOcorrenciaTipoDTO): Promise<OcorrenciaTipo> {
    const tipo = this.ormRepository.create(data);
    await this.ormRepository.save(tipo);

    return tipo;
  }

  public async save(tipo: OcorrenciaTipo): Promise<OcorrenciaTipo> {
    return this.ormRepository.save(tipo);
  }

  public async delete(id: number): Promise<void> {
    await this.ormRepository.delete(id);
  }
}
