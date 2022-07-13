<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Manifestations Controller
 *
 * @property \App\Model\Table\ManifestationsTable $Manifestations
 * @method \App\Model\Entity\Manifestation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ManifestationsController extends AppController
{
	
	
	protected $writingStyles = array(
		'EDIT' => 'Edited text',
		'MS' => 'Manuscript',
		'other' => 'Other',
		'TS' => 'Typescript'
	);
	
	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Letters', 'Archives'],
        ];
        $manifestations = $this->paginate($this->Manifestations);

        $this->set(compact('manifestations'));
    }

    /**
     * View method
     *
     * @param string|null $id Manifestation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $manifestation = $this->Manifestations->get($id, [
            'contain' => ['Letters', 'Archives', 'Languages', 'Annotations'],
        ]);

        $this->set(compact('manifestation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($letterId = null) {
    	
    	if (is_null($letterId)) {
    		$this->Flash->error('Invalid call.');
    	}
    	
    	$letter = null;
    	try {
    		$letter = $this->fetchTable('Letters')->get($letterId, [
    			'contain' => ['Letterformats', 'Senders' => ['Persons', 'Institutions'], 'Receivers' => ['Persons', 'Institutions'], 'Addresses']
    		]);
    	} catch (Exception $e) {
    		$this->Flash->error('Invalid call. (no datensatz)');
    	}
    	
    	
    	
        $manifestation = $this->Manifestations->newEmptyEntity();
        if ($this->request->is('post')) {
        	
        	$formData = $this->request->getData();
        	$manifestation = $this->Manifestations->patchEntity($manifestation, $formData);
            
            pr($this->request->getData());
            
            
            
			if ($this->Manifestations->save($manifestation)) {
				
				//Saving the signatures
				$signaturesSaved = true;
				$signaturesData = array();
				if (array_key_exists('manifestationSignatures', $formData)) {
					foreach($formData['manifestationSignatures']['_senderIds'] as $sender_id) {
						$signaturesData[] = array(
							'manifestation_id' => $manifestation->id,
							'sender_id' => $sender_id
						);
					}
				}
				foreach($signaturesData as $signatures) {
					$signature = $this->Manifestations->Signatures->newEmptyEntity();
					$signature = $this->Manifestations->Signatures->patchEntity($signature, $signatures);
					if ($this->Manifestations->Signatures->save($signature)) {
					} else {
						$signaturesSaved = false;
					}
				}
				
				//Saving the annotations
				$annotationsSaved = true;
				$annotationsData = array();
				if (array_key_exists('manifestationAnnotations', $formData)) {
					foreach($formData['manifestationAnnotations']['_receiverIds'] as $receiver_id) {
						$annotationsData[] = array(
							'manifestation_id' => $manifestation->id,
							'receiver_id' => $receiver_id,
							'sender_id' => NULL,
						);
					}
					foreach($formData['manifestationAnnotations']['_senderIds'] as $sender_id) {
						$annotationsData[] = array(
							'manifestation_id' => $manifestation->id,
							'receiver_id' => NULL,
							'sender_id' => $sender_id,
						);
					}
				}
				foreach($annotationsData as $annotations) {
					$annotation = $this->Manifestations->Annotations->newEmptyEntity();
					$annotation = $this->Manifestations->Annotations->patchEntity($annotation, $annotations);
					if ($this->Manifestations->Annotations->save($annotation)) {
					} else {
						$annotationsSaved = false;
					}
				}
				
				
				
				if (!$signaturesSaved) {
					echo "fehler beim speichern der signatures";
				}
				
				
				
				$this->Flash->success(__('The manifestation has been saved.'));
				///return $this->redirect(['action' => 'index']);
            }
            
            $this->Flash->error(__('The manifestation could not be saved. Please, try again.'));
            
        }
        
       // $letter = $this->Letters->get($letterId);
        
       
        
        $archives = $this->Manifestations->Archives->find('list', ['limit' => 200])->all();
        $languages = $this->Manifestations->Languages->find('list', ['limit' => 200])->all();
        $languages = $languages->toArray();
        
        $this->set(compact('manifestation', 'letter', 'archives', 'languages'));
        
        $this->set('writingStyles', $this->writingStyles);        
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Manifestation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
    	
        $manifestation = $this->Manifestations->get($id, [
        	'contain' => ['Archives', 'Languages', 'Annotations' => ['Receivers', 'Senders'], 'Signatures' => ['Senders']],
        ]);
        
        $letter = null;
        try {
        	$letter = $this->fetchTable('Letters')->get($manifestation->letter_id, [
        		'contain' => ['Letterformats', 'Senders' => ['Persons', 'Institutions'], 'Receivers' => ['Persons', 'Institutions'], 'AddressFrom']
        	]);
        } catch (Exception $e) {
        	$this->Flash->error('Invalid call. (no datensatz)');
        }
        $this->set('letter', $letter);
        
        $this->set('writingStyles', $this->writingStyles);
        
        
        
        if ($this->request->is(['patch', 'post', 'put'])) {
        	
        	$formData = $this->request->getData();
            $manifestation = $this->Manifestations->patchEntity($manifestation, $formData);
            
           // pr($formData);
            
            if ($this->Manifestations->save($manifestation)) {
            	
            	//Check and update annotations
            	$annotationsError = false;
            	$annotations = $this->Manifestations->Annotations->find('all', [
            		'conditions' => ['manifestation_id' => $id]
            	]);
            	$annotations = $annotations->toArray();

            	//senders
            	$allSenderIDs = $letter->getSenderIds();
            	foreach($allSenderIDs as $senderId) {
					
            		$isSavedRecord = false;
            		$isSentData = false;
            		
            		if (isset($formData['manifestationAnnotations']) && array_key_exists('_senderIds', $formData['manifestationAnnotations'])) {
            			foreach($formData['manifestationAnnotations']['_senderIds'] as $annotation) {
            				if ($annotation == $senderId) {
            					$isSentData = true;
            				}
            			}
            		}
            		foreach($annotations as $annotation) {
            			if ($annotation->sender_id == $senderId) {
            				$isSavedRecord = true;
            			}
            		}
            		
            		if ($isSavedRecord) {
            			if (!$isSentData) {
            				$query = $this->fetchTable('Annotations')->query();
            				$query->delete()
            					->where(['manifestation_id' => $id, 'sender_id' => $senderId])
            					->execute();
            			}
            		} else {
            			if ($isSentData) {
            				$annotationData = array(
            					'manifestation_id' => $id,
            					'receiver_id' => NULL,
            					'sender_id' => $senderId
            				);
            				$annotation = $this->Manifestations->Annotations->newEmptyEntity();
            				$annotation = $this->Manifestations->Annotations->patchEntity($annotation, $annotationData);
            				if (!$this->Manifestations->Annotations->save($annotation)) {
            					$annotationsError = true;
            				}
            				
            			}
            		}
            		
            	}
            	
            	//receivers
            	$allReceiverIDs = $letter->getReceiverIds();
            	foreach($allReceiverIDs as $receiverId) {
            		
            		$isSavedRecord = false;
            		$isSentData = false;
            		
            		if (isset($formData['manifestationAnnotations']) && array_key_exists('_receiverIds', $formData['manifestationAnnotations'])) {
            			foreach($formData['manifestationAnnotations']['_receiverIds'] as $annotation) {
            				if ($annotation == $receiverId) {
            					$isSentData = true;
            				}
            			}
            		}
            		foreach($annotations as $annotation) {
            			if ($annotation->receiver_id == $receiverId) {
            				$isSavedRecord = true;
            			}
            		}
            		
            		if ($isSavedRecord) {
            			if (!$isSentData) {
            				$query = $this->fetchTable('Annotations')->query();
            				$query->delete()
            					->where(['manifestation_id' => $id, 'receiver_id' => $receiverId])
            					->execute();
            			}
            		} else {
            			if ($isSentData) {
            				$annotationData = array(
            					'manifestation_id' => $id,
            					'receiver_id' => $receiverId,
            					'sender_id' => NULL
            				);
            				$annotation = $this->Manifestations->Annotations->newEmptyEntity();
            				$annotation = $this->Manifestations->Annotations->patchEntity($annotation, $annotationData);
            				if (!$this->Manifestations->Annotations->save($annotation)) {
            					$annotationsError = true;
            				}
            				
            			}
            		}
            		
            	}
            	
            	
            	//Check and update signatures
            	$signaturesError = false;
            	$signatures = $this->Manifestations->Signatures->find('all', [
            		'conditions' => ['manifestation_id' => $id]
            	]);
            	$signatures = $signatures->toArray();
            	
            	//senders
            	foreach($allSenderIDs as $senderId) {
            		
            		$isSavedRecord = false;
            		$isSentData = false;
            		
            		if (isset($formData['manifestationSignatures']) && array_key_exists('_senderIds', $formData['manifestationSignatures'])) {
            			foreach($formData['manifestationSignatures']['_senderIds'] as $annotation) {
            				if ($annotation == $senderId) {
            					$isSentData = true;
            				}
            			}
            		}
            		foreach($signatures as $signature) {
            			if ($signature->sender_id == $senderId) {
            				$isSavedRecord = true;
            			}
            		}
            		
            		if ($isSavedRecord) {
            			if (!$isSentData) {
            				$query = $this->fetchTable('Signatures')->query();
            				$query->delete()
            					->where(['manifestation_id' => $id, 'sender_id' => $senderId])
            					->execute();
            			}
            		} else {
            			if ($isSentData) {
            				$signatureData = array(
            					'manifestation_id' => $id,
            					'sender_id' => $senderId
            				);
            				$signature = $this->Manifestations->Signatures->newEmptyEntity();
            				$signature = $this->Manifestations->Signatures->patchEntity($signature, $signatureData);
            				if (!$this->Manifestations->Signatures->save($signature)) {
            					$signaturesError = true;
            				}
            				
            			}
            		}
            		
            	}
            	
            	//Check and update (= delete) languages
            	/*$allLanguageIds = $manifestation->getLanguagesIds();
            	foreach($allLanguageIds as $languageId) {
            		if (!array_key_exists('languages', $formData) || !in_array($languageId, $formData['languages']['_ids'])) {
            			$query = $this->fetchTable('Languages')->query();
            			$query->delete()
            				->where(['manifestation_id' => $id, 'language_id' => $languageId])
            				->execute();
            		}
            	}*/
            	
            	if ($annotationsError) {
            		
            	}
            	if ($signaturesError) {
            		
            	}
                $this->Flash->success(__('The manifestation has been saved.'));
                //return $this->redirect(['action' => 'index']);
                
            }
            $this->Flash->error(__('The manifestation could not be saved. Please, try again.'));
            
            
        }
        
        $letters = $this->Manifestations->Letters->find('list', ['limit' => 200])->all();
        $archives = $this->Manifestations->Archives->find('list', ['limit' => 200])->all();
        $languages = $this->Manifestations->Languages->find('list', ['limit' => 200])->all();
        
        $annotations = $this->Manifestations->Annotations->find('all', [
        	'conditions' => ['manifestation_id' => $id],
        	'contain' => ['Senders', 'Receivers']
        ]);
		$annotations = $annotations->toArray();
		
		$signatures = $this->Manifestations->Signatures->find('all', [
			'conditions' => ['manifestation_id' => $id],
			'contain' => ['Senders']
		]);
		$signatures = $signatures->toArray();
        
        $this->set(compact('manifestation', 'letters', 'archives', 'languages', 'annotations', 'signatures'));
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Manifestation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $manifestation = $this->Manifestations->get($id);
        if ($this->Manifestations->delete($manifestation)) {
            $this->Flash->success(__('The manifestation has been deleted.'));
        } else {
            $this->Flash->error(__('The manifestation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
