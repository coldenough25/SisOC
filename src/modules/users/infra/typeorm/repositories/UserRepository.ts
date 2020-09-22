import { getRepository, Repository } from 'typeorm';

import IUserRepository from '@modules/users/repositories/IUserRepository';
import ICreateUserDTO from '@modules/users/dtos/ICreateUserDTO';

import Usuario from '../entities/Usuario';

class UserRepository implements IUserRepository {
  private ormRepository: Repository<Usuario>;

  constructor() {
    this.ormRepository = getRepository(Usuario);
  }

  public async findById(id: number): Promise<Usuario | undefined> {
    const foundUser = await this.ormRepository.findOne(id);
    return foundUser;
  }

  public async findByEmail(email: string): Promise<Usuario | undefined> {
    const foundUser = await this.ormRepository.findOne({ where: { email } });
    return foundUser;
  }

  public async create(userData: ICreateUserDTO): Promise<Usuario> {
    const user = this.ormRepository.create(userData);
    await this.ormRepository.save(user);

    return user;
  }

  public async save(user: Usuario): Promise<Usuario> {
    return this.ormRepository.save(user);
  }

  public async delete(id: number): Promise<void> {
    await this.ormRepository.delete(id);
  }

  public async list(): Promise<Usuario[]> {
    const usuarios = await this.ormRepository.find();
    return usuarios;
  }
}

export default UserRepository;
