import { injectable, inject } from 'tsyringe';

import IUsuarioTipoRepository from '../repositories/IUsuarioTipoRepository';

import ICriarUsuarioTipoDTO from '../dtos/ICriarUsuarioTipoDTO';
import UsuarioTipo from '../infra/typeorm/entities/UsuarioTipo';

@injectable()
export default class CreateUserService {
  constructor(
    @inject('UsuarioTipoRepository')
    private repository: IUsuarioTipoRepository,
  ) {}

  public async execute({
    nome,
    descricao,
  }: ICriarUsuarioTipoDTO): Promise<UsuarioTipo> {
    const tipo = await this.repository.create({
      nome,
      descricao,
    });

    return tipo;
  }
}
