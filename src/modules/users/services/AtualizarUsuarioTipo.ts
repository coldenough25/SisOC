import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';

import UsuarioTipo from '../infra/typeorm/entities/UsuarioTipo';
import IUsuarioTipoRepository from '../repositories/IUsuarioTipoRepository';

interface IRequest {
  id: number;
  nome: string;
  descricao: string;
}

@injectable()
export default class AtualizarUsuarioTipo {
  constructor(
    @inject('UsuarioTipoRepository')
    private repository: IUsuarioTipoRepository,
  ) {}

  public async execute({
    id,
    nome,
    descricao,
  }: IRequest): Promise<UsuarioTipo> {
    const tipo = await this.repository.findById(id);

    if (!tipo) {
      throw new AppError('Este tipo não existe');
    }

    tipo.nome = nome;
    tipo.descricao = descricao;

    return this.repository.save(tipo);
  }
}
