import { injectable, inject } from 'tsyringe';

import Usuario from '../infra/typeorm/entities/Usuario';
import IUsuarioRepository from '../repositories/IUserRepository';

@injectable()
export default class ListarUsuario {
  constructor(
    @inject('UsuarioRepository')
    private repository: IUsuarioRepository,
  ) {}

  public async execute(): Promise<Usuario[]> {
    const tipos = await this.repository.list();

    return tipos;
  }
}
