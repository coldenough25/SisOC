import { getRepository, Repository } from 'typeorm';

import IUsuarioTipoRepository from '@modules/users/repositories/IUsuarioTipoRepository';
import ICriarUsuarioTipoDTO from '@modules/users/dtos/ICriarUsuarioTipoDTO';

import UsuarioTipo from '../entities/UsuarioTipo';

export default class UsuarioTipoRepository implements IUsuarioTipoRepository {
  private ormRepository: Repository<UsuarioTipo>;

  constructor() {
    this.ormRepository = getRepository(UsuarioTipo);
  }

  public async findById(id: number): Promise<UsuarioTipo | undefined> {
    const foundTipo = await this.ormRepository.findOne(id);
    return foundTipo;
  }

  public async create(data: ICriarUsuarioTipoDTO): Promise<UsuarioTipo> {
    const tipo = this.ormRepository.create(data);
    await this.ormRepository.save(tipo);

    return tipo;
  }

  public async save(tipo: UsuarioTipo): Promise<UsuarioTipo> {
    return this.ormRepository.save(tipo);
  }
}
