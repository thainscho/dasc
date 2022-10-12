<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Letters Controller
 *
 * @property \App\Model\Table\LettersTable $Letters
 * @method \App\Model\Entity\Letter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LettersController extends AppController {
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \Cake\Controller\Controller::beforeRender()
	 */
	public function beforeRender(EventInterface $event) {
		parent::beforeRender($event);
		$this->viewBuilder()->addHelper('Dasc');
	}
	
	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
        	'contain' => [
        		'Letterformats',
        		'AddressFrom',
        		'AddressTo',
        		'Senders' => ['Persons', 'Institutions'],
        		'Receivers' => ['Persons', 'Institutions']
        	]
        ];
        $letters = $this->paginate($this->Letters, ['order' => ['id' => 'desc']]);

        $this->set(compact('letters'));
    }

    /**
     * View method
     *
     * @param string|null $id Letter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
    	
        $letter = $this->Letters->get($id, [
        	'contain' => [
        		'Letterformats',
        		'AddressTo',
        		'AddressFrom',
        		'Manifestations' => ['Archives', 'Languages', 'Signatures' => ['Senders'], 'Annotations'],
        		'Senders' => ['Persons', 'Institutions'],
        		'Receivers' => ['Persons', 'Institutions'],],
        ]);
        
        //Seperate search for annotations and signatures
        $annotations = array();
        $signatures = array();

        $manifestationsQuery = $this->fetchTable('Manifestations')->find('all', [
			'conditions' => ['Manifestations.letter_id' => $id],
        	'contain' => ['Archives', 'Languages', 'Signatures' => ['Senders' => ['Persons', 'Institutions']], 'Annotations' => ['Senders' => ['Persons', 'Institutions'], 'Receivers' => ['Persons', 'Institutions']]]
        ]);
        $manifestations = $manifestationsQuery->all();

        foreach($manifestations as $manifestation) {
        
        	$annotations[$manifestation->id] = array();
        	
        	$annotationsQuery = $this->fetchTable('Annotations')->find('all', [
        		'conditions' => ['Annotations.manifestation_id' => $manifestation->id],
        		'contain' => ['Senders' => ['Persons', 'Institutions'], 'Receivers' => ['Persons', 'Institutions']]
        	]);
        	$annotationsTmp = $annotationsQuery->all();
        	
        	foreach($annotationsTmp as $annotationTmp) {
        		$annotations[$manifestation->id]['annotation'][] = $annotationTmp;
        	}
        	
        	$signatures[$manifestation->id] = array();
        	
        	$signaturesQuery = $this->fetchTable('Signatures')->find('all', [
        		'conditions' => ['Signatures.manifestation_id' => $manifestation->id],
        		'contain' => ['Senders' => ['Persons', 'Institutions']]
        	]);
        	$signaturesTmp = $signaturesQuery->all();
        	
        	foreach($signaturesTmp as $signatureTmp) {
        		$signatures[$manifestation->id]['annotation'][] = $signatureTmp;
        	}
        	
        }
        
        $this->set(compact('letter', 'manifestations', 'annotations', 'signatures'));
        
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
    	
        $letter = $this->Letters->newEmptyEntity();
        
        if ($this->request->is('post')) {
        	
        	$formData = $this->request->getData();
            $letter = $this->Letters->patchEntity($letter, $this->request->getData());
            
           	//pr($letter);
			//exit;

			if ($this->Letters->save($letter)) {
            	
            	//Saving the senders
            	$sendersSaved = true;
            	$sendersData = array();
            	if (array_key_exists('senderspersons', $formData)) {
            		foreach($formData['senderspersons']['_ids'] as $person_id) {
            			$sendersData[] = array(
            				'letter_id' => $letter->id,
            				'person_id' => $person_id,
            				'institution_id' => NULL
            			);
            		}
            	}
            	if (array_key_exists('sendersinstitutions', $formData)) {
            		foreach($formData['sendersinstitutions']['_ids'] as $institution_id) {
            			$sendersData[] = array(
            				'letter_id' => $letter->id,
            				'person_id' => NULL,
            				'institution_id' => $institution_id
            			);
            		}
            	}
            	foreach($sendersData as $senders) {
            		$sender = $this->Letters->Senders->newEmptyEntity();
            		$sender = $this->Letters->Senders->patchEntity($sender, $senders);
            		if ($this->Letters->Senders->save($sender)) {
            		} else {
            			$sendersSaved = false;
            		}
            	}
            	
            	//Saving the receivers
            	$receiversSaved = true;
            	$receiversData = array();
            	if (array_key_exists('receiverspersons', $formData)) {
            		foreach($formData['receiverspersons']['_ids'] as $person_id) {
            			$receiversData[] = array(
            				'letter_id' => $letter->id,
            				'person_id' => $person_id,
            				'institution_id' => NULL
            			);
            		}
            	}
            	if (array_key_exists('receiversinstitutions', $formData)) {
            		foreach($formData['receiversinstitutions']['_ids'] as $institution_id) {
            			$receiversData[] = array(
            				'letter_id' => $letter->id,
            				'person_id' => NULL,
            				'institution_id' => $institution_id
            			);
            		}
            	}
            	foreach($receiversData as $receivers) {
            		$receiver = $this->Letters->Receivers->newEmptyEntity();
            		$receiver = $this->Letters->Receivers->patchEntity($receiver, $receivers);
            		if ($this->Letters->Receivers->save($receiver)) {
            		} else {
            			$receiversSaved = false;
            		}
            	}
            	
            	$successMessage = "The letter has been saved.";
            	$warningMessage = "The letter has been saved";
            	if (!$sendersSaved) {
            		$warningMessage .= ", but the sender(s) could not be saved. Please check.";
            	}
            	if (!$receiversSaved) {
            		if (!$sendersSaved) {
            			$warningMessage .= "Also the receiver(s) could not be saved.";
            		} else {
	            		$warningMessage .= ", but the receiver(s) could not be saved. Please check.";
            		}
            	}
            	
            	if ($sendersSaved && $receiversSaved) {
            		$this->Flash->success(__($successMessage));
            	} else {
            		$this->Flash->warning(__($warningMessage));
            	}
				return $this->redirect(['controller' => 'manifestations', 'action' => 'add/'.$letter->id]);
				
            }
            $this->Flash->error(__('The letter could not be saved. Please, try again.'));
            
        }
        $letterformats = $this->Letters->Letterformats->find('list', [
        	'limit' => 200,
        	'order' => 'name'
        ])->all();
        
        $addresses = $this->Letters->AddressTo->find('list', [
        	'limit' => 200,
        	'order' => 'city',
        	'keyField' => 'id',
        	'valueField' => ['full_address'],
        	'contain' => 'Nationalstates'
        ])->all();

        $this->set(compact('letter', 'letterformats', 'addresses'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Letter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $letter = $this->Letters->get($id, [
        	'contain' => ['AddressTo', 'AddressFrom'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $letter = $this->Letters->patchEntity($letter, $this->request->getData());
            if ($this->Letters->save($letter)) {
                $this->Flash->success(__('The letter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The letter could not be saved. Please, try again.'));
        }
        $letterformats = $this->Letters->Letterformats->find('list', ['limit' => 200])->all();
        
        $addressTo  = $this->Letters->AddressTo->find('list', [
        	'limit' => 200,
        	'keyField' => 'id',
        	'valueField' => 'city'
        ])->all();
        
        $addressFrom  = $this->Letters->AddressFrom->find('list', [
        	'limit' => 200,
        	'keyField' => 'id',
        	'valueField' => 'city'
        ])->all();
        
        $this->set(compact('letter', 'letterformats', 'addressTo', 'addressFrom'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Letter id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $letter = $this->Letters->get($id);
        if ($this->Letters->delete($letter)) {
            $this->Flash->success(__('The letter has been deleted.'));
        } else {
            $this->Flash->error(__('The letter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    public function search() {
    	
    	
    }
    
    
    
}
