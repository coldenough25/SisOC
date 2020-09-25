import { Router } from 'express';

import userRouter from '@modules/users/infra/http/routes/user.routes';
import usuarioTipoRouter from '@modules/users/infra/http/routes/usuarioTipo.routes';

import profileRouter from '@modules/users/infra/http/routes/profile.routes';
import sessionRouter from '@modules/users/infra/http/routes/session.routes';

import ocorrenciaRouter from '@modules/ocorrencias/infra/http/routes/ocorrencia.routes';
import ocorrenciaTipoRouter from '@modules/ocorrencias/infra/http/routes/ocorrenciaTipo.routes';

import setorRouter from '@modules/ocorrencias/infra/http/routes/setor.routes';

const routes = Router();

routes.use('/usuarios/tipo', usuarioTipoRouter);
routes.use('/usuarios', userRouter);

routes.use('/perfil', profileRouter);
routes.use('/sessao', sessionRouter);

routes.use('/ocorrencias/tipo', ocorrenciaTipoRouter);
routes.use('/ocorrencias', ocorrenciaRouter);

routes.use('/setores', setorRouter);
routes.get('/versao', (request, response) => {
  return response.json({ versao: '1.1' });
});

export default routes;
