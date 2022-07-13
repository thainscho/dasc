<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Archives Controller
 *
 * @property \App\Model\Table\ArchivesTable $Archives
 * @method \App\Model\Entity\Archive[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArchivesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Addresses'],
        ];
        $archives = $this->paginate($this->Archives);

        $this->set(compact('archives'));
    }

    /**
     * View method
     *
     * @param string|null $id Archive id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $archive = $this->Archives->get($id, [
            'contain' => ['Addresses', 'Manifestations'],
        ]);

        $this->set(compact('archive'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $archive = $this->Archives->newEmptyEntity();
        if ($this->request->is('post')) {
            $archive = $this->Archives->patchEntity($archive, $this->request->getData());
            if ($this->Archives->save($archive)) {
                $this->Flash->success(__('The archive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The archive could not be saved. Please, try again.'));
        }
        $addresses = $this->Archives->Addresses->find('list', ['limit' => 200])->all();
        $this->set(compact('archive', 'addresses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Archive id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $archive = $this->Archives->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $archive = $this->Archives->patchEntity($archive, $this->request->getData());
            if ($this->Archives->save($archive)) {
                $this->Flash->success(__('The archive has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The archive could not be saved. Please, try again.'));
        }
        $addresses = $this->Archives->Addresses->find('list', [
        	'limit' => 200,
        	'keyField' => 'id',
        	'valueField' => ['full_address'],
        	'contain' => 'Nationalstates'
        ])->all();
        $this->set(compact('archive', 'addresses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Archive id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $archive = $this->Archives->get($id);
        if ($this->Archives->delete($archive)) {
            $this->Flash->success(__('The archive has been deleted.'));
        } else {
            $this->Flash->error(__('The archive could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
