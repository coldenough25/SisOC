import AppError from '@shared/errors/AppError';
import FakeUserRepository from '../repositories/fakes/FakeUserRepository';
import ShowProfileService from './MostrarUsuario';

let fakeRepository: FakeUserRepository;
let showProfile: ShowProfileService;

describe('ShowProfile', () => {
  beforeEach(() => {
    fakeRepository = new FakeUserRepository();
    showProfile = new ShowProfileService(fakeRepository);
  });

  it('should be able to show user profile yourself', async () => {
    const user = await fakeRepository.create({
      nome: 'John Doe',
      email: 'email@test.com',
      senha: '123456',
      ra_siape: '123456',
    });

    const toShowUser = await showProfile.execute(user.id);

    expect(toShowUser).toHaveProperty('id');
  });

  it('should not be able to show a non-existing user profile', async () => {
    await expect(showProfile.execute(999)).rejects.toBeInstanceOf(AppError);
  });
});
