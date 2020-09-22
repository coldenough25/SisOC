import { Router } from 'express';

import UserController from '../controllers/UserController';
import verifyAuthentication from '../middlewares/verifyAuthentication';

const router = Router();

const userController = new UserController();

router.use(verifyAuthentication);

router.get('/', userController.index);
router.post('/', userController.create);
router.get('/:id', userController.show);
router.put('/:id', userController.update);
router.delete('/:id', userController.delete);

export default router;
