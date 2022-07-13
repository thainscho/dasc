<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Validation\Validator;

/**
 * Persons Controller
 *
 * @property \App\Model\Table\PersonsTable $Persons
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonsController extends AppController
{
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function index() {
		
		$settings = array(
			'order' => ['id' => 'DESC']
		);
		
		$persons = $this->paginate($this->Persons, $settings);
		
		$this->set(compact('persons'));
		
		
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id Person id.
	 * @return \Cake\Http\Response|null|void Renders view
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$person = $this->Persons->get($id, [
			'contain' => ['Receivers', 'Senders'],
		]);
		
		$this->set(compact('person'));
	}
	
	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		
		
		$person = $this->Persons->newEmptyEntity();
		if ($this->request->is('post')) {
			$person = $this->Persons->patchEntity($person, $this->request->getData());
			
			
			if ($person->getErrors()) {
				
				echo "ja, es gibt fehler";
				
			} else {
				
				if ($this->Persons->save($person)) {
					$this->Flash->success(__('The person has been saved.'));
					
					return $this->redirect(['action' => 'index']);
				}
			}
			
			$this->Flash->error(__('The person could not be saved. Please, try again.'));
		}
		$this->set(compact('person'));
	}
	
	
	/**
	 * Edit method
	 *
	 * @param string|null $id Person id.
	 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null) {
		
		$person = $this->Persons->get($id, [
			'contain' => [],
		]);
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			$person = $this->Persons->patchEntity($person, $this->request->getData());
			if ($person->yearofbirth == '0000') {
				$person->yearofbirth = null;
			}
			if ($person->yearofdeath == '0000') {
				$person->yearofdeath = null;
			}
			if ($person->yearofbirthUpper == '0000') {
				$person->yearofbirthUpper = null;
			}
			if ($person->yearofdeathUpper == '0000') {
				$person->yearofdeathUpper = null;
			}
			if ($this->Persons->save($person)) {
				$this->Flash->success(__('The person has been saved.'));
				
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The person could not be saved. Please, try again.'));
		} else {
			if ($person->yearofbirth == '0000') {
				$person->yearofbirth = null;
			}
			if ($person->yearofdeath == '0000') {
				$person->yearofdeath = null;
			}
			if ($person->yearofbirthUpper == '0000') {
				$person->yearofbirthUpper = null;
			}
			if ($person->yearofdeathUpper == '0000') {
				$person->yearofdeathUpper = null;
			}
		}
		$this->set(compact('person'));
		
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id Person id.
	 * @return \Cake\Http\Response|null|void Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$person = $this->Persons->get($id);
		if ($this->Persons->delete($person)) {
			$this->Flash->success(__('The person has been deleted.'));
		} else {
			$this->Flash->error(__('The person could not be deleted. Please, try again.'));
		}
		
		return $this->redirect(['action' => 'index']);
	}
	
	
	public function getPersonByName($name = null) {
		
		if ($this->request->is('ajax')) {
			
			$persons = array();
			
			// 			$student = $this->Students->get($this->request->getData("student_id"), [
			// 					'contain' => [],
			// 			]);
			$responseArray = array(
				'request' => 'ajax',
				'name' => $_REQUEST['name'],
				'id' => $this->request->getData("name")
			);
			$responseArray = array("1","2","3","4","5","6","7");
			$responseArray = array();
			
			$responseArray[] = ['id' => 1, 'name' => "thomas", 'type' => 'person'];
			$responseArray[] = ['id' => 2, 'name' => "katharina", 'type' => 'institution'];
			$responseArray[] = ['id' => 3, 'name' => "monika", 'type' => 'person'];
			
			
			$responseArray = array();
			
			$query = $this->Persons->find('all', [
				'conditions' => ['LOWER(lastname) LIKE' => '%'.strtolower($_REQUEST['name']).'%'],
				'limit' => 5
			]);
			$query = $query->toArray();
			foreach($query as $key => $val) {
				$responseArray[strtolower($val['lastname'].$val['firstname'])] = ['id' => $val['id'], 'name' => strtoupper($val['lastname']).', '.$val['firstname'], 'type' => 'person'];
			}
			
			$query = $this->fetchTable('Institutions')->find('all', [
				'conditions' => ['LOWER(name) LIKE' => '%'.$_REQUEST['name'].'%'],
				'limit' => 5
			]);
			$query = $query->toArray();
			foreach($query as $key => $val) {
				$responseArray[strtolower($val['name'])] = ['id' => $val['id'], 'name' => $val['name'], 'type' => 'institution'];
			}
			ksort($responseArray);
			
		} else {
			$responseArray = NULL;
		}
		
		echo json_encode($responseArray);
		exit;
		
		if ($this->request->is('ajax')) {
			
			$student = $this->Students->newEmptyEntity();
			
			$student = $this->Students->patchEntity($student, $this->request->getData());
			if ($this->Students->save($student)) {
				
				$this->Flash->success(__('Student has been created'));
				
				echo json_encode(array(
					"status" => 1,
					"message" => "Student has been created"
				));
				
				exit;
			}
			
			$this->Flash->error(__('Failed to save student data'));
			
			echo json_encode(array(
				"status" => 0,
				"message" => "Failed to create"
			));
			
			exit;
			
		}
		
		
	}
	
	
	
}
