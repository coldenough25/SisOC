import { Router } from 'express';

import verifyAuthenticaction from '@modules/users/infra/http/middlewares/verifyAuthentication';
import SetorController from '../controllers/SetorController';

const router = Router();
const setorController = new SetorController();

router.use(verifyAuthenticaction);

router.get('/', setorController.index);
router.post('/', setorController.create);
router.get('/:id', setorController.show);
router.put('/:id', setorController.update);
router.delete('/:id', setorController.delete);

export default router;
