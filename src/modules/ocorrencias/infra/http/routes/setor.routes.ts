import { Router } from 'express';

import verifyAuthenticaction from '@modules/users/infra/http/middlewares/verifyAuthentication';
import SetorController from '../controllers/SetorController';

const router = Router();
const setorController = new SetorController();

router.use(verifyAuthenticaction);

router.post('/', setorController.create);

export default router;
