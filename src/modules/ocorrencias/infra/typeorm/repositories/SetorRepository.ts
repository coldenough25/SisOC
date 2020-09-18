import { getRepository, Repository } from 'typeorm';

import ISetorRepository from '@modules/ocorrencias/repositories/ISetorRepository';
import ICriarSetorDTO from '@modules/ocorrencias/dtos/ICriarSetorDTO';

import Setor from '../entities/Setor';

export default class SetorRepository implements ISetorRepository {
  private ormRepository: Repository<Setor>;

  constructor() {
    this.ormRepository = getRepository(Setor);
  }

  public async findById(id: string): Promise<Setor | undefined> {
    const foundSetor = await this.ormRepository.findOne(id);
    return foundSetor;
  }

  public async create(data: ICriarSetorDTO): Promise<Setor> {
    const ocorrencia = this.ormRepository.create(data);
    await this.ormRepository.save(ocorrencia);

    return ocorrencia;
  }
}
