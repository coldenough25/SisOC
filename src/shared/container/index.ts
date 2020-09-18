import { container } from 'tsyringe';

import '@modules/users/providers';
import './providers';

import IUserRepository from '@modules/users/repositories/IUserRepository';
import UserRepository from '@modules/users/infra/typeorm/repositories/UserRepository';

import IUsuarioTipoRepository from '@modules/users/repositories/IUsuarioTipoRepository';
import UsuarioTipoRepository from '@modules/users/infra/typeorm/repositories/UsuarioTipoRepository';

import IOcorrenciaRepository from '@modules/ocorrencias/repositories/IOcorrenciaRepository';
import OcorrenciaRepository from '@modules/ocorrencias/infra/typeorm/repositories/OcorrenciaRepository';

import OcorrenciaTipoRepository from '@modules/ocorrencias/infra/typeorm/repositories/OcorrenciaTipoRepository';
import IOcorrenciaTipoRepository from '@modules/ocorrencias/repositories/IOcorrenciaTipoRepository';
import ISetorRepository from '@modules/ocorrencias/repositories/ISetorRepository';
import SetorRepository from '@modules/ocorrencias/infra/typeorm/repositories/SetorRepository';

container.registerSingleton<IUserRepository>('UserRepository', UserRepository);

container.registerSingleton<IUsuarioTipoRepository>(
  'UsuarioTipoRepository',
  UsuarioTipoRepository,
);

container.registerSingleton<IOcorrenciaRepository>(
  'OcorrenciaRepository',
  OcorrenciaRepository,
);

container.registerSingleton<IOcorrenciaTipoRepository>(
  'OcorrenciaTipoRepository',
  OcorrenciaTipoRepository,
);

container.registerSingleton<ISetorRepository>(
  'SetorRepository',
  SetorRepository,
);
