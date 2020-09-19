import React from 'react';
import { Switch } from 'react-router-dom';

import Route from './Route';

import SignIn from '../pages/SignIn';
import Inicio from '../pages/Inicio';

import Usuario from '../pages/Usuario';
import CriarUsuario from '../pages/Usuario/Criar';

import Ocorrencia from '../pages/Ocorrencia';
import CriarOcorrencia from '../pages/Ocorrencia/Criar';

import OcorrenciaTipo from '../pages/OcorrenciaTipo';
import CriarOcorrenciaTipo from '../pages/OcorrenciaTipo/Criar';

import Setor from '../pages/Setor';
import CriarSetor from '../pages/Setor/Criar';

import UsuarioTipo from '../pages/UsuarioTipo';
import CriarUsuarioTipo from '../pages/UsuarioTipo/Criar';

const Routes: React.FC = () => (
  <Switch>
    <Route path="/" exact needAuthentication component={Inicio} />

    <Route path="/usuarios" exact needAuthentication component={Usuario} />
    <Route path="/usuarios/criar" needAuthentication component={CriarUsuario} />

    <Route path="/ocorrencia" exact needAuthentication component={Ocorrencia} />
    <Route
      path="/ocorrencia/criar"
      needAuthentication
      component={CriarOcorrencia}
    />

    <Route
      path="/ocorrenciatipo"
      exact
      needAuthentication
      component={OcorrenciaTipo}
    />
    <Route
      path="/ocorrenciatipo/criar"
      needAuthentication
      component={CriarOcorrenciaTipo}
    />

    <Route path="/Setor" exact needAuthentication component={Setor} />
    <Route path="/Setor/Criar" needAuthentication component={CriarSetor} />

    <Route
      path="/usuariotipo"
      exact
      needAuthentication
      component={UsuarioTipo}
    />
    <Route
      path="/usuariotipo/criar"
      needAuthentication
      component={CriarUsuarioTipo}
    />

    <Route path="/login" component={SignIn} />
  </Switch>
);

export default Routes;
