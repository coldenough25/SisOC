import { getRepository, Repository } from 'typeorm';

import IOcorrenciaRepository from '@modules/ocorrencias/repositories/IOcorrenciaRepository';
import ICriarOcorrenciaDTO from '@modules/ocorrencias/dtos/ICriarOcorrenciaDTO';

import Ocorrencia from '../entities/Ocorrencia';

export default class OcorrenciaRepository implements IOcorrenciaRepository {
  private ormRepository: Repository<Ocorrencia>;

  constructor() {
    this.ormRepository = getRepository(Ocorrencia);
  }

  public async findById(id: string): Promise<Ocorrencia | undefined> {
    const foundOcorrencia = await this.ormRepository.findOne(id);
    return foundOcorrencia;
  }

  public async create(dados: ICriarOcorrenciaDTO): Promise<Ocorrencia> {
    const ocorrencia = this.ormRepository.create(dados);
    await this.ormRepository.save(ocorrencia);

    return ocorrencia;
  }

  public async save(ocorrencia: Ocorrencia): Promise<Ocorrencia> {
    return this.ormRepository.save(ocorrencia);
  }
}
