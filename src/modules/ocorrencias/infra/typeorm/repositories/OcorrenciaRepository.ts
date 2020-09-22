import { getRepository, Repository } from 'typeorm';

import IOcorrenciaRepository from '@modules/ocorrencias/repositories/IOcorrenciaRepository';
import ICriarOcorrenciaDTO from '@modules/ocorrencias/dtos/ICriarOcorrenciaDTO';

import Ocorrencia from '../entities/Ocorrencia';

export default class OcorrenciaRepository implements IOcorrenciaRepository {
  private ormRepository: Repository<Ocorrencia>;

  constructor() {
    this.ormRepository = getRepository(Ocorrencia);
  }

  public async findById(id: number): Promise<Ocorrencia | undefined> {
    const ocorrencia = await this.ormRepository.findOne(id);
    return ocorrencia;
  }

  public async list(): Promise<Ocorrencia[]> {
    const ocorrencia = await this.ormRepository.find();
    return ocorrencia;
  }

  public async create(dados: ICriarOcorrenciaDTO): Promise<Ocorrencia> {
    const ocorrencia = this.ormRepository.create(dados);
    await this.ormRepository.save(ocorrencia);

    return ocorrencia;
  }

  public async save(ocorrencia: Ocorrencia): Promise<Ocorrencia> {
    return this.ormRepository.save(ocorrencia);
  }

  public async delete(id: number): Promise<void> {
    await this.ormRepository.delete(id);
  }
}
