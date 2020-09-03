<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ocorrencias Controller
 *
 * @property \App\Model\Table\OcorrenciasTable $Ocorrencias
 * @method \App\Model\Entity\Ocorrencia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OcorrenciasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OcorrenciasTipos'],
        ];
        $ocorrencias = $this->paginate($this->Ocorrencias);

        $this->set(compact('ocorrencias'));
    }

    /**
     * View method
     *
     * @param string|null $id Ocorrencia id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ocorrencia = $this->Ocorrencias->get($id, [
            'contain' => ['OcorrenciasTipos'],
        ]);

        $this->set(compact('ocorrencia'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ocorrencia = $this->Ocorrencias->newEmptyEntity();
        if ($this->request->is('post')) {
            $ocorrencia = $this->Ocorrencias->patchEntity($ocorrencia, $this->request->getData());
            if ($this->Ocorrencias->save($ocorrencia)) {
                $this->Flash->success(__('The ocorrencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ocorrencia could not be saved. Please, try again.'));
        }
        $ocorrenciasTipos = $this->Ocorrencias->OcorrenciasTipos->find('list', ['limit' => 200]);
        $this->set(compact('ocorrencia', 'ocorrenciasTipos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ocorrencia id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ocorrencia = $this->Ocorrencias->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ocorrencia = $this->Ocorrencias->patchEntity($ocorrencia, $this->request->getData());
            if ($this->Ocorrencias->save($ocorrencia)) {
                $this->Flash->success(__('The ocorrencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ocorrencia could not be saved. Please, try again.'));
        }
        $ocorrenciasTipos = $this->Ocorrencias->OcorrenciasTipos->find('list', ['limit' => 200]);
        $this->set(compact('ocorrencia', 'ocorrenciasTipos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ocorrencia id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ocorrencia = $this->Ocorrencias->get($id);
        if ($this->Ocorrencias->delete($ocorrencia)) {
            $this->Flash->success(__('The ocorrencia has been deleted.'));
        } else {
            $this->Flash->error(__('The ocorrencia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
