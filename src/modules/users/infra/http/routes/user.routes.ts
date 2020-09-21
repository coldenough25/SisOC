import { Router } from 'express';

import UserController from '../controllers/UserController';
import verifyAuthentication from '../middlewares/verifyAuthentication';

const router = Router();

const userController = new UserController();

router.use(verifyAuthentication);
router.post('/', userController.create);

export default router;
