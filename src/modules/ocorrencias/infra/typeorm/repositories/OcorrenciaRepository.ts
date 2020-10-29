import { getRepository, Repository } from 'typeorm';

import IOcorrenciaRepository from '@modules/ocorrencias/repositories/IOcorrenciaRepository';

import ICriarOcorrenciaDTO from '@modules/ocorrencias/dtos/ICriarOcorrenciaDTO';
import IFiltrarOcorrenciaDTO from '@modules/ocorrencias/dtos/IFiltarOcorrenciaDTO';
import IContarOcorrenciaDTO from '@modules/ocorrencias/dtos/IContarOcorrenciaDTO';

import IListarOcorrenciaDTO from '@modules/ocorrencias/dtos/IListarOcorrenciaDTO';
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

  public async userOwner({
    usuario_id,
  }: IListarOcorrenciaDTO): Promise<Ocorrencia[]> {
    const ocorrencia = await this.ormRepository.find({
      where: { criador: usuario_id },
    });
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

  public async listaFiltrada({
    situacao,
    usuario_id,
  }: IFiltrarOcorrenciaDTO): Promise<Ocorrencia[]> {
    const ocorrencias = await this.ormRepository.find({
      where: {
        situacao,
        criador: usuario_id,
      },
    });

    return ocorrencias;
  }

  public async contar(usuario: number): Promise<IContarOcorrenciaDTO[]> {
    const obj = await this.ormRepository
      .createQueryBuilder()
      .select('situacao')
      .addSelect('COUNT(situacao)')
      .where('criador = :id', { id: usuario })
      .groupBy('situacao')
      .getRawMany();

    return obj;
  }
}
