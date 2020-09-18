import { Router } from 'express';

import UsuarioTipoController from '../controllers/UsuarioTipoController';

const router = Router();

const usuarioTipoController = new UsuarioTipoController();

router.post('/', usuarioTipoController.create);

export default router;
