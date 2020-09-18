import { Router } from 'express';

import verifyAuthenticaction from '@modules/users/infra/http/middlewares/verifyAuthentication';
import OcorrenciaTipoController from '../controllers/OcorrenciaTipoController';

const router = Router();
const ocorrenciaTipoController = new OcorrenciaTipoController();

router.use(verifyAuthenticaction);

router.post('/', ocorrenciaTipoController.create);

export default router;
