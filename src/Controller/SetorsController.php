<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Setors Controller
 *
 * @property \App\Model\Table\SetorsTable $Setors
 * @method \App\Model\Entity\Setor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SetorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $setors = $this->paginate($this->Setors);

        $this->set(compact('setors'));
    }

    /**
     * View method
     *
     * @param string|null $id Setor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $setor = $this->Setors->get($id, [
            'contain' => ['OcorrenciasTipos'],
        ]);

        $this->set(compact('setor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $setor = $this->Setors->newEmptyEntity();
        if ($this->request->is('post')) {
            $setor = $this->Setors->patchEntity($setor, $this->request->getData());
            if ($this->Setors->save($setor)) {
                $this->Flash->success(__('The setor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setor could not be saved. Please, try again.'));
        }
        $this->set(compact('setor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Setor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $setor = $this->Setors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $setor = $this->Setors->patchEntity($setor, $this->request->getData());
            if ($this->Setors->save($setor)) {
                $this->Flash->success(__('The setor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setor could not be saved. Please, try again.'));
        }
        $this->set(compact('setor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Setor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $setor = $this->Setors->get($id);
        if ($this->Setors->delete($setor)) {
            $this->Flash->success(__('The setor has been deleted.'));
        } else {
            $this->Flash->error(__('The setor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
