import Usuario from '../infra/typeorm/entities/Usuario';
import ICreateUserDTO from '../dtos/ICreateUserDTO';

export default interface IUserRepository {
  findById(id: number): Promise<Usuario | undefined>;
  findByEmail(email: string): Promise<Usuario | undefined>;
  create(data: ICreateUserDTO): Promise<Usuario>;
  save(user: ICreateUserDTO): Promise<Usuario>;
}
