import { Router } from 'express';

import verifyAuthenticaction from '@modules/users/infra/http/middlewares/verifyAuthentication';
import OcorrenciaController from '../controllers/OcorrenciaController';

const router = Router();
const ocorrenciaController = new OcorrenciaController();

router.use(verifyAuthenticaction);

router.post('/', ocorrenciaController.create);

export default router;
