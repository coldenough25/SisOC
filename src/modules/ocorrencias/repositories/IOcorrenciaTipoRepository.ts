import ICriarOcorrenciaTipoDTO from '../dtos/ICriarOcorrenciaTipoDTO';
import OcorrenciaTipo from '../infra/typeorm/entities/OcorrenciaTipo';

export default interface IOcorrenciaTipoRepository {
  findById(id: number): Promise<OcorrenciaTipo | undefined>;
  list(): Promise<OcorrenciaTipo[]>;
  create(data: ICriarOcorrenciaTipoDTO): Promise<OcorrenciaTipo>;
  save(tipo: OcorrenciaTipo): Promise<OcorrenciaTipo>;
  delete(id: number): Promise<void>;
}
