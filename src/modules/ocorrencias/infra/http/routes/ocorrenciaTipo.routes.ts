import { Router } from 'express';

import verifyAuthenticaction from '@modules/users/infra/http/middlewares/verifyAuthentication';
import OcorrenciaTipoController from '../controllers/OcorrenciaTipoController';

const router = Router();
const ocorrenciaTipoController = new OcorrenciaTipoController();

router.use(verifyAuthenticaction);

router.get('/', ocorrenciaTipoController.index);
router.post('/', ocorrenciaTipoController.create);
router.get('/:id', ocorrenciaTipoController.show);
router.put('/:id', ocorrenciaTipoController.update);
router.delete('/:id', ocorrenciaTipoController.delete);

export default router;
