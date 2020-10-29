import { injectable, inject } from 'tsyringe';

import AppError from '@shared/errors/AppError';
import IOcorrenciaRepository from '../repositories/IOcorrenciaRepository';
import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';

interface IRequest {
  usuario: {
    id: number;
    tipo: string;
  };
  ocorrencia_id: number;
}

@injectable()
export default class MostrarOcorrencia {
  constructor(
    @inject('OcorrenciaRepository')
    private repository: IOcorrenciaRepository,
  ) {}

  public async execute({
    usuario,
    ocorrencia_id,
  }: IRequest): Promise<Ocorrencia> {
    const ocorrencia = await this.repository.findById(ocorrencia_id);
    if (!ocorrencia) throw new AppError('Esta ocorrência não existe');

    if (ocorrencia.criador !== usuario.id && usuario.tipo !== 'admin')
      throw new AppError('Você não tem permissão', 401);

    return ocorrencia;
  }
}
