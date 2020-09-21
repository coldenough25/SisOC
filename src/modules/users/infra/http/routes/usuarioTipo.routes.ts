import { Router } from 'express';

import UsuarioTipoController from '../controllers/UsuarioTipoController';
import verifyAuthentication from '../middlewares/verifyAuthentication';

const router = Router();

const usuarioTipoController = new UsuarioTipoController();

router.use(verifyAuthentication);

router.post('/', usuarioTipoController.create);
router.get('/', usuarioTipoController.index);
router.get('/:id', usuarioTipoController.show);
router.delete('/:id', usuarioTipoController.delete);
router.put('/:id', usuarioTipoController.update);

export default router;
