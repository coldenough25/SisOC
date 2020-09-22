import Usuario from '../infra/typeorm/entities/Usuario';
import ICreateUserDTO from '../dtos/ICreateUserDTO';

export default interface IUserRepository {
  findById(id: number): Promise<Usuario | undefined>;
  findByEmail(email: string): Promise<Usuario | undefined>;
  list(): Promise<Usuario[]>;
  create(data: ICreateUserDTO): Promise<Usuario>;
  save(user: ICreateUserDTO): Promise<Usuario>;
  delete(id: number): Promise<void>;
}
