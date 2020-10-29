import { Router } from 'express';

import verifyAuthenticaction from '@modules/users/infra/http/middlewares/verifyAuthentication';
import OcorrenciaController from '../controllers/OcorrenciaController';
import OcorrenciaFiltradaController from '../controllers/OcorrenciaFiltradaController';
import ContarOcorrenciaController from '../controllers/ContarOcorrenciaController';
import TodasOcorrenciasController from '../controllers/TodasOcorrenciasController';

const router = Router();
const ocorrenciaController = new OcorrenciaController();
const ocorrenciaFiltradaController = new OcorrenciaFiltradaController();
const contarOcorrenciaController = new ContarOcorrenciaController();
const todasOcorrenciasController = new TodasOcorrenciasController();

router.use(verifyAuthenticaction);

router.get('/contar', contarOcorrenciaController.show);
router.get('/todas', todasOcorrenciasController.index);

router.get('/', ocorrenciaController.index);
router.post('/', ocorrenciaController.create);
router.get('/:id', ocorrenciaController.show);
router.put('/:id', ocorrenciaController.update);
router.delete('/:id', ocorrenciaController.delete);

router.get('/situacao/:situacao', ocorrenciaFiltradaController.index);

export default router;
