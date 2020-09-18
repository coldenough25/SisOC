import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';
import ICriarOcorrenciaDTO from '../dtos/ICriarOcorrenciaDTO';

export default interface IOcorrenciaRepository {
  findById(id: string): Promise<Ocorrencia | undefined>;
  create(data: ICriarOcorrenciaDTO): Promise<Ocorrencia>;
  save(ocorrencia: Ocorrencia): Promise<Ocorrencia>;
}
