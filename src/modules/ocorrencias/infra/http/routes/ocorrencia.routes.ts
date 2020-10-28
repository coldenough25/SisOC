import { Router } from 'express';

import verifyAuthenticaction from '@modules/users/infra/http/middlewares/verifyAuthentication';
import OcorrenciaController from '../controllers/OcorrenciaController';

const router = Router();
const ocorrenciaController = new OcorrenciaController();

router.use(verifyAuthenticaction);

router.get('/', ocorrenciaController.index);
router.post('/', ocorrenciaController.create);
router.get('/:id', ocorrenciaController.show);
router.put('/:id', ocorrenciaController.update);
router.delete('/:id', ocorrenciaController.delete);

export default router;
