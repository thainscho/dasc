<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Senders Controller
 *
 * @property \App\Model\Table\SendersTable $Senders
 * @method \App\Model\Entity\Sender[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SendersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Letters', 'Persons', 'Institutions'],
        ];
        $senders = $this->paginate($this->Senders);

        $this->set(compact('senders'));
    }

    /**
     * View method
     *
     * @param string|null $id Sender id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
    	
        $sender = $this->Senders->get($id, [
            'contain' => ['Persons', 'Institutions'],
        ]);
        
        if (!is_null($sender->person_id)) {
        	return $this->redirect([
 				'controller' => 'Persons',
				'action' => 'view',
				$sender->person_id
        	]);
        } else {
        	return $this->redirect([
        		'controller' => 'Institutions',
        		'action' => 'view',
        		$sender->institution_id
        	]);
        }
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sender = $this->Senders->newEmptyEntity();
        if ($this->request->is('post')) {
            $sender = $this->Senders->patchEntity($sender, $this->request->getData());
            if ($this->Senders->save($sender)) {
                $this->Flash->success(__('The sender has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sender could not be saved. Please, try again.'));
        }
        $letters = $this->Senders->Letters->find('list', ['limit' => 200])->all();
        $persons = $this->Senders->Persons->find('list', ['limit' => 200])->all();
        $institutions = $this->Senders->Institutions->find('list', ['limit' => 200])->all();
        $this->set(compact('sender', 'letters', 'persons', 'institutions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sender id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sender = $this->Senders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sender = $this->Senders->patchEntity($sender, $this->request->getData());
            if ($this->Senders->save($sender)) {
                $this->Flash->success(__('The sender has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sender could not be saved. Please, try again.'));
        }
        $letters = $this->Senders->Letters->find('list', ['limit' => 200])->all();
        $persons = $this->Senders->Persons->find('list', ['limit' => 200])->all();
        $institutions = $this->Senders->Institutions->find('list', ['limit' => 200])->all();
        $this->set(compact('sender', 'letters', 'persons', 'institutions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sender id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sender = $this->Senders->get($id);
        if ($this->Senders->delete($sender)) {
            $this->Flash->success(__('The sender has been deleted.'));
        } else {
            $this->Flash->error(__('The sender could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
