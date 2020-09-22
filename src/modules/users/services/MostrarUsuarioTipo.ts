import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import UsuarioTipo from '../infra/typeorm/entities/UsuarioTipo';
import IUsuarioTipoRepository from '../repositories/IUsuarioTipoRepository';

@injectable()
export default class MostrarUsuarioTipo {
  constructor(
    @inject('UsuarioTipoRepository')
    private repository: IUsuarioTipoRepository,
  ) {}

  public async execute(id: number): Promise<UsuarioTipo> {
    const tipo = await this.repository.findById(id);
    if (!tipo) throw new AppError('Este tipo não existe');

    return tipo;
  }
}
