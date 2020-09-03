<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UsuariosTipos Controller
 *
 * @property \App\Model\Table\UsuariosTiposTable $UsuariosTipos
 * @method \App\Model\Entity\UsuariosTipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosTiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $usuariosTipos = $this->paginate($this->UsuariosTipos);

        $this->set(compact('usuariosTipos'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuarios Tipo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuariosTipo = $this->UsuariosTipos->get($id, [
            'contain' => ['Usuarios'],
        ]);

        $this->set(compact('usuariosTipo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuariosTipo = $this->UsuariosTipos->newEmptyEntity();
        if ($this->request->is('post')) {
            $usuariosTipo = $this->UsuariosTipos->patchEntity($usuariosTipo, $this->request->getData());
            if ($this->UsuariosTipos->save($usuariosTipo)) {
                $this->Flash->success(__('The usuarios tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarios tipo could not be saved. Please, try again.'));
        }
        $this->set(compact('usuariosTipo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuarios Tipo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuariosTipo = $this->UsuariosTipos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuariosTipo = $this->UsuariosTipos->patchEntity($usuariosTipo, $this->request->getData());
            if ($this->UsuariosTipos->save($usuariosTipo)) {
                $this->Flash->success(__('The usuarios tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarios tipo could not be saved. Please, try again.'));
        }
        $this->set(compact('usuariosTipo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuarios Tipo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuariosTipo = $this->UsuariosTipos->get($id);
        if ($this->UsuariosTipos->delete($usuariosTipo)) {
            $this->Flash->success(__('The usuarios tipo has been deleted.'));
        } else {
            $this->Flash->error(__('The usuarios tipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
