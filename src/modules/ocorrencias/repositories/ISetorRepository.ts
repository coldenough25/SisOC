import Setor from '../infra/typeorm/entities/Setor';
import ICriarSetorDTO from '../dtos/ICriarSetorDTO';

export default interface ISetorRepository {
  findById(id: string): Promise<Setor | undefined>;
  create(data: ICriarSetorDTO): Promise<Setor>;
}
