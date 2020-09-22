import Setor from '../infra/typeorm/entities/Setor';
import ICriarSetorDTO from '../dtos/ICriarSetorDTO';

export default interface ISetorRepository {
  findById(id: number): Promise<Setor | undefined>;
  create(data: ICriarSetorDTO): Promise<Setor>;
  list(): Promise<Setor[]>;
  save(setor: Setor): Promise<Setor>;
  delete(id: number): Promise<void>;
}
