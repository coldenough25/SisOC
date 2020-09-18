import { uuid } from 'uuidv4';

import IUserRepository from '@modules/users/repositories/IUserRepository';
import ICreateUserDTO from '@modules/users/dtos/ICreateUserDTO';
import Usuario from '@modules/users/infra/typeorm/entities/Usuario';

class UserRepository implements IUserRepository {
  private users: Usuario[] = [];

  public async findAllProviders(except_id?: number): Promise<Usuario[]> {
    if (except_id) {
      const users = this.users.filter(user => user.id !== except_id);
      return users;
    }

    return this.users;
  }

  public async findById(id: number): Promise<Usuario | undefined> {
    const foundUser = this.users.find(user => user.id === id);
    return foundUser;
  }

  public async findByEmail(email: string): Promise<Usuario | undefined> {
    const foundUser = this.users.find(user => user.email === email);
    return foundUser;
  }

  public async create(userData: ICreateUserDTO): Promise<Usuario> {
    const user = new Usuario();
    Object.assign(
      user,
      {
        id: uuid(),
      },
      userData,
    );

    this.users.push(user);

    return user;
  }

  public async save(user: Usuario): Promise<Usuario> {
    const userIndex = this.users.findIndex(item => item.id === user.id);
    this.users[userIndex] = user;

    return user;
  }
}

export default UserRepository;
