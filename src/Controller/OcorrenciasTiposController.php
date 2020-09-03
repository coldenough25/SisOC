<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OcorrenciasTipos Controller
 *
 * @property \App\Model\Table\OcorrenciasTiposTable $OcorrenciasTipos
 * @method \App\Model\Entity\OcorrenciasTipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OcorrenciasTiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Setors'],
        ];
        $ocorrenciasTipos = $this->paginate($this->OcorrenciasTipos);

        $this->set(compact('ocorrenciasTipos'));
    }

    /**
     * View method
     *
     * @param string|null $id Ocorrencias Tipo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ocorrenciasTipo = $this->OcorrenciasTipos->get($id, [
            'contain' => ['Setors', 'Ocorrencias'],
        ]);

        $this->set(compact('ocorrenciasTipo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ocorrenciasTipo = $this->OcorrenciasTipos->newEmptyEntity();
        if ($this->request->is('post')) {
            $ocorrenciasTipo = $this->OcorrenciasTipos->patchEntity($ocorrenciasTipo, $this->request->getData());
            if ($this->OcorrenciasTipos->save($ocorrenciasTipo)) {
                $this->Flash->success(__('The ocorrencias tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ocorrencias tipo could not be saved. Please, try again.'));
        }
        $setors = $this->OcorrenciasTipos->Setors->find('list', ['limit' => 200]);
        $this->set(compact('ocorrenciasTipo', 'setors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ocorrencias Tipo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ocorrenciasTipo = $this->OcorrenciasTipos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ocorrenciasTipo = $this->OcorrenciasTipos->patchEntity($ocorrenciasTipo, $this->request->getData());
            if ($this->OcorrenciasTipos->save($ocorrenciasTipo)) {
                $this->Flash->success(__('The ocorrencias tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ocorrencias tipo could not be saved. Please, try again.'));
        }
        $setors = $this->OcorrenciasTipos->Setors->find('list', ['limit' => 200]);
        $this->set(compact('ocorrenciasTipo', 'setors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ocorrencias Tipo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ocorrenciasTipo = $this->OcorrenciasTipos->get($id);
        if ($this->OcorrenciasTipos->delete($ocorrenciasTipo)) {
            $this->Flash->success(__('The ocorrencias tipo has been deleted.'));
        } else {
            $this->Flash->error(__('The ocorrencias tipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
