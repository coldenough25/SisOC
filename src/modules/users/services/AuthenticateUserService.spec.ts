import AppError from '@shared/errors/AppError';
import FakeUserRepository from '../repositories/fakes/FakeUserRepository';
import FakeHashProvider from '../providers/HashProvider/fakes/FakeHashProvider';
import AuthenticateUserService from './AuthenticateUserService';
import CreateUserService from './CreateUserService';

let fakeRepository: FakeUserRepository;
let fakeHashProvider: FakeHashProvider;
let authenticateUser: AuthenticateUserService;

describe('AuthenticateUser', () => {
  beforeEach(() => {
    fakeRepository = new FakeUserRepository();
    fakeHashProvider = new FakeHashProvider();
    authenticateUser = new AuthenticateUserService(
      fakeRepository,
      fakeHashProvider,
    );
  });

  it('should be able to user authenticate', async () => {
    const createUser = new CreateUserService(fakeRepository, fakeHashProvider);

    await createUser.execute({
      nome: 'John Doe',
      email: 'email@test.com',
      senha: '123456',
      ra_siape: '123456',
    });

    const response = await authenticateUser.execute({
      email: 'email@test.com',
      senha: '123456',
    });

    expect(response).toHaveProperty('token');
  });

  it('should not be able to login with wrong senha', async () => {
    const createUser = new CreateUserService(fakeRepository, fakeHashProvider);

    await createUser.execute({
      nome: 'John Doe',
      email: 'email@test.com',
      senha: '123456',
      ra_siape: '123456',
    });

    await expect(
      authenticateUser.execute({
        email: 'email@test.com',
        senha: '1234567',
      }),
    ).rejects.toBeInstanceOf(AppError);
  });

  it('should not be able to login with non-existing user', async () => {
    await expect(
      authenticateUser.execute({
        email: 'test@test.com',
        senha: '123456',
      }),
    ).rejects.toBeInstanceOf(AppError);
  });
});
