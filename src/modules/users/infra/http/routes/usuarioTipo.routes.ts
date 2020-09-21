import { Router } from 'express';

import UsuarioTipoController from '../controllers/UsuarioTipoController';
import verifyAuthentication from '../middlewares/verifyAuthentication';

const router = Router();

const usuarioTipoController = new UsuarioTipoController();

router.use(verifyAuthentication);

router.post('/', usuarioTipoController.create);
router.get('/', usuarioTipoController.show);
router.delete('/:id', usuarioTipoController.delete);

export default router;
