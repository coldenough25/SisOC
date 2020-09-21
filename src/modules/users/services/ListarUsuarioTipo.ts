import { injectable, inject } from 'tsyringe';

import UsuarioTipo from '../infra/typeorm/entities/UsuarioTipo';
import IUsuarioTipoRepository from '../repositories/IUsuarioTipoRepository';

@injectable()
export default class ListarUsuarioTipo {
  constructor(
    @inject('UsuarioTipoRepository')
    private repository: IUsuarioTipoRepository,
  ) {}

  public async execute(): Promise<UsuarioTipo[]> {
    const tipos = await this.repository.list();

    return tipos;
  }
}
