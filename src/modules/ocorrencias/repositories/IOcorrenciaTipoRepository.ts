import ICriarOcorrenciaTipoDTO from '../dtos/ICriarOcorrenciaTipoDTO';
import OcorrenciaTipo from '../infra/typeorm/entities/OcorrenciaTipo';

export default interface IOcorrenciaTipoRepository {
  findById(id: string): Promise<OcorrenciaTipo | undefined>;
  create(data: ICriarOcorrenciaTipoDTO): Promise<OcorrenciaTipo>;
}
