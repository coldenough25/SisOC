import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';
import ICriarOcorrenciaDTO from '../dtos/ICriarOcorrenciaDTO';

export default interface IOcorrenciaRepository {
  findById(id: number): Promise<Ocorrencia | undefined>;
  list(): Promise<Ocorrencia[]>;
  create(data: ICriarOcorrenciaDTO): Promise<Ocorrencia>;
  save(ocorrencia: Ocorrencia): Promise<Ocorrencia>;
  delete(id: number): Promise<void>;
}
