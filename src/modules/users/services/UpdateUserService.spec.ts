import AppError from '@shared/errors/AppError';
import FakeUserRepository from '../repositories/fakes/FakeUserRepository';
import UpdateUserService from './UpdateUserService';
import FakeHashProvider from '../providers/HashProvider/fakes/FakeHashProvider';

let fakeHashProvider: FakeHashProvider;
let fakeRepository: FakeUserRepository;
let updateUser: UpdateUserService;

describe('UpdateUser', () => {
  beforeEach(() => {
    fakeRepository = new FakeUserRepository();
    fakeHashProvider = new FakeHashProvider();
    updateUser = new UpdateUserService(fakeRepository, fakeHashProvider);
  });

  it('should update yourself', async () => {
    const user = await fakeRepository.create({
      nome: 'John Doe',
      email: 'email@test.com',
      senha: '123456',
      ra_siape: '123456',
    });

    const updatedUser = await updateUser.execute({
      user_id: user.id,
      nome: 'Carlos Jonathan',
      email: 'carlos@jonathan.com',
    });

    expect(updatedUser.nome).toBe('Carlos Jonathan');
    expect(updatedUser.email).toBe('carlos@jonathan.com');
  });

  it('should not update the e-mail to an already existing one', async () => {
    await fakeRepository.create({
      nome: 'John Doe',
      email: 'email@test.com',
      senha: '123456',
      ra_siape: '123456',
    });

    const user = await fakeRepository.create({
      nome: 'Carlos Jonathan',
      email: 'carlos@jonathan.com',
      senha: '123456',
      ra_siape: '123456',
    });

    await expect(
      updateUser.execute({
        user_id: user.id,
        nome: 'Carlos Jonathan',
        email: 'email@test.com',
      }),
    ).rejects.toBeInstanceOf(AppError);
  });

  it('should update the senha', async () => {
    const user = await fakeRepository.create({
      nome: 'John Doe',
      email: 'email@test.com',
      senha: '123123',
      ra_siape: '123456',
    });

    const updatedUser = await updateUser.execute({
      user_id: user.id,
      nome: 'Carlos Jonathan',
      email: 'carlos@jonathan.com',
      senha_antiga: '123123',
      senha: '123456',
    });

    expect(updatedUser.senha).toBe('123456');
  });

  it('should not update the senha without old senha', async () => {
    const user = await fakeRepository.create({
      nome: 'John Doe',
      email: 'email@test.com',
      senha: '123123',
      ra_siape: '123456',
    });

    await expect(
      updateUser.execute({
        user_id: user.id,
        nome: 'Carlos Jonathan',
        email: 'carlos@jonathan.com',
        senha: '123456',
      }),
    ).rejects.toBeInstanceOf(AppError);
  });

  it('should not update the senha with wrong old senha', async () => {
    const user = await fakeRepository.create({
      nome: 'John Doe',
      email: 'email@test.com',
      senha: '123123',
      ra_siape: '123456',
    });

    await expect(
      updateUser.execute({
        user_id: user.id,
        nome: 'Carlos Jonathan',
        email: 'carlos@jonathan.com',
        senha_antiga: '123321',
        senha: '123456',
      }),
    ).rejects.toBeInstanceOf(AppError);
  });

  it('should not be able to update a non-existing user', async () => {
    await expect(
      updateUser.execute({
        user_id: 999,
        nome: 'Carlos Jonathan',
        email: 'carlos@jonathan.com',
      }),
    ).rejects.toBeInstanceOf(AppError);
  });
});
