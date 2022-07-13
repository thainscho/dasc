<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Annotations Controller
 *
 * @property \App\Model\Table\AnnotationsTable $Annotations
 * @method \App\Model\Entity\Annotation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnnotationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Manifestations', 'Receivers', 'Senders'],
        ];
        $annotations = $this->paginate($this->Annotations);

        $this->set(compact('annotations'));
    }

    /**
     * View method
     *
     * @param string|null $id Annotation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $annotation = $this->Annotations->get($id, [
            'contain' => ['Manifestations', 'Receivers', 'Senders'],
        ]);

        $this->set(compact('annotation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $annotation = $this->Annotations->newEmptyEntity();
        if ($this->request->is('post')) {
            $annotation = $this->Annotations->patchEntity($annotation, $this->request->getData());
            if ($this->Annotations->save($annotation)) {
                $this->Flash->success(__('The annotation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The annotation could not be saved. Please, try again.'));
        }
        $manifestations = $this->Annotations->Manifestations->find('list', ['limit' => 200])->all();
        $receivers = $this->Annotations->Receivers->find('list', ['limit' => 200])->all();
        $senders = $this->Annotations->Senders->find('list', ['limit' => 200])->all();
        $this->set(compact('annotation', 'manifestations', 'receivers', 'senders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Annotation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $annotation = $this->Annotations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $annotation = $this->Annotations->patchEntity($annotation, $this->request->getData());
            pr($annotation);
            
            if ($this->Annotations->save($annotation)) {
                $this->Flash->success(__('The annotation has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The annotation could not be saved. Please, try again.'));
        }
        $manifestations = $this->Annotations->Manifestations->find('list', ['limit' => 200])->all();
        $receivers = $this->Annotations->Receivers->find('list', ['limit' => 200])->all();
        $senders = $this->Annotations->Senders->find('list', ['limit' => 200])->all();
        $this->set(compact('annotation', 'manifestations', 'receivers', 'senders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Annotation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $annotation = $this->Annotations->get($id);
        if ($this->Annotations->delete($annotation)) {
            $this->Flash->success(__('The annotation has been deleted.'));
        } else {
            $this->Flash->error(__('The annotation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
