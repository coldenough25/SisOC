import { getRepository, Repository } from 'typeorm';

import ISetorRepository from '@modules/ocorrencias/repositories/ISetorRepository';
import ICriarSetorDTO from '@modules/ocorrencias/dtos/ICriarSetorDTO';

import Setor from '../entities/Setor';

export default class SetorRepository implements ISetorRepository {
  private ormRepository: Repository<Setor>;

  constructor() {
    this.ormRepository = getRepository(Setor);
  }

  public async findById(id: number): Promise<Setor | undefined> {
    const setor = await this.ormRepository.findOne(id);
    return setor;
  }

  public async list(): Promise<Setor[]> {
    const setores = await this.ormRepository.find();
    return setores;
  }

  public async create(data: ICriarSetorDTO): Promise<Setor> {
    const setor = this.ormRepository.create(data);
    await this.ormRepository.save(setor);

    return setor;
  }

  public async save(setor: Setor): Promise<Setor> {
    return this.ormRepository.save(setor);
  }

  public async delete(id: number): Promise<void> {
    await this.ormRepository.delete(id);
  }
}
