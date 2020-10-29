import Ocorrencia from '../infra/typeorm/entities/Ocorrencia';
import ICriarOcorrenciaDTO from '../dtos/ICriarOcorrenciaDTO';
import IContarOcorrenciaDTO from '../dtos/IContarOcorrenciaDTO';
import IFiltrarOcorrenciaDTO from '../dtos/IFiltarOcorrenciaDTO';
import IListarOcorrenciaDTO from '../dtos/IListarOcorrenciaDTO';

export default interface IOcorrenciaRepository {
  findById(id: number): Promise<Ocorrencia | undefined>;

  list(): Promise<Ocorrencia[]>;
  userOwner(data: IListarOcorrenciaDTO): Promise<Ocorrencia[]>;

  create(data: ICriarOcorrenciaDTO): Promise<Ocorrencia>;
  save(ocorrencia: Ocorrencia): Promise<Ocorrencia>;
  delete(id: number): Promise<void>;

  listaFiltrada(data: IFiltrarOcorrenciaDTO): Promise<Ocorrencia[]>;
  contar(usuario: number): Promise<IContarOcorrenciaDTO[]>;
}
