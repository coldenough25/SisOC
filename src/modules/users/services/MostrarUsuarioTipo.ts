import { injectable, inject } from 'tsyringe';

import UsuarioTipo from '../infra/typeorm/entities/UsuarioTipo';
import IUsuarioTipoRepository from '../repositories/IUsuarioTipoRepository';

@injectable()
export default class MostrarUsuarioTipo {
  constructor(
    @inject('UsuarioTipoRepository')
    private repository: IUsuarioTipoRepository,
  ) {}

  public async execute(id: number): Promise<UsuarioTipo | undefined> {
    const tipo = await this.repository.findById(id);

    return tipo;
  }
}
