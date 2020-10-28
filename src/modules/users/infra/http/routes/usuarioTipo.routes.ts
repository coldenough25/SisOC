import { Router } from 'express';

import UsuarioTipoController from '../controllers/UsuarioTipoController';
import verifyAuthentication from '../middlewares/verifyAuthentication';

const router = Router();

const usuarioTipoController = new UsuarioTipoController();

router.use(verifyAuthentication);

router.get('/', usuarioTipoController.index);
router.post('/', usuarioTipoController.create);
router.get('/:id', usuarioTipoController.show);
router.put('/:id', usuarioTipoController.update);
router.delete('/:id', usuarioTipoController.delete);

export default router;
