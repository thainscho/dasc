<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Nationalstates Controller
 *
 * @property \App\Model\Table\NationalstatesTable $Nationalstates
 * @method \App\Model\Entity\Nationalstate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NationalstatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $nationalstates = $this->paginate($this->Nationalstates);

        $this->set(compact('nationalstates'));
    }

    /**
     * View method
     *
     * @param string|null $id Nationalstate id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nationalstate = $this->Nationalstates->get($id, [
            'contain' => ['Addresses'],
        ]);

        $this->set(compact('nationalstate'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nationalstate = $this->Nationalstates->newEmptyEntity();
        if ($this->request->is('post')) {
            $nationalstate = $this->Nationalstates->patchEntity($nationalstate, $this->request->getData());
            if ($this->Nationalstates->save($nationalstate)) {
                $this->Flash->success(__('The nationalstate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nationalstate could not be saved. Please, try again.'));
        }
        $this->set(compact('nationalstate'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nationalstate id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nationalstate = $this->Nationalstates->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nationalstate = $this->Nationalstates->patchEntity($nationalstate, $this->request->getData());
            if ($this->Nationalstates->save($nationalstate)) {
                $this->Flash->success(__('The nationalstate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nationalstate could not be saved. Please, try again.'));
        }
        $this->set(compact('nationalstate'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nationalstate id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nationalstate = $this->Nationalstates->get($id);
        if ($this->Nationalstates->delete($nationalstate)) {
            $this->Flash->success(__('The nationalstate has been deleted.'));
        } else {
            $this->Flash->error(__('The nationalstate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
