import UsuarioTipo from '../infra/typeorm/entities/UsuarioTipo';
import ICriarUsuarioTipoDTO from '../dtos/ICriarUsuarioTipoDTO';

export default interface IUsuarioTipoRepository {
  findById(id: number): Promise<UsuarioTipo | undefined>;
  create(data: ICriarUsuarioTipoDTO): Promise<UsuarioTipo>;
  save(user: ICriarUsuarioTipoDTO): Promise<UsuarioTipo>;
  list(): Promise<UsuarioTipo[]>;
  delete(id: number): Promise<void>;
}
