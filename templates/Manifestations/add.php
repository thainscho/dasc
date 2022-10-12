<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manifestation $manifestation
 * @var \Cake\Collection\CollectionInterface|string[] $letter
 * @var \Cake\Collection\CollectionInterface|string[] $archives
 * @var \Cake\Collection\CollectionInterface|string[] $languages
 * @var \Cake\Collection\CollectionInterface|string[] $writingStyles
 */
?>

<h3><?= __('Pieces of correspondence') ?><br />
<small><?php echo __('Create a new manifestation for the '); echo '<b>'.$letter->detailed_info.'</b>'; ?></small>
</h3>

<p>
<?= $this->Html->link(__('Back'), ['controller' => 'letters', 'action' => 'index']) ?>
</p>


    
    <div class="column-responsive column-80">
        <div class="manifestations form content">
            <?= $this->Form->create($manifestation) ?>
            
			<?php
				$myTemplates = [
					'inputContainer' => '<div class="col">{{content}}</div>',
				];
				$this->Form->setTemplates($myTemplates);
			?>
 
			<div class="row form-row">
	 			<fieldset>
	    			<legend>Basic Information</legend>
		  			<div class="row form-row">
						<div class="col">
							<?php echo $this->Form->control('writingstyle', [
								'options' => $writingStyles,
								'empty' => 'Select writing style',
								'class' => 'form-select',
								'label' => ['text' => 'Writing style', 'class' => 'required']
							]); ?>
						</div>
						<?php
							echo $this->Form->control(
								'writingstyle_other',
								array(
									'placeholder' => 'Please specify ...',
									'label' => ['text' => 'Other writing style'],
									'class' => 'form-control'
								)
							);
						?>
					</div>
		 
		 
		            <div class="row form-row">
						<?php
							echo $this->Form->control(
								'pages',
								array(
									'type' => 'text',
									'placeholder' => 'Number of pages',
									'label' => ['text' => 'Number of pages', 'class' => 'required'],
									'class' => 'form-control'
								)
							);
						?>
						<div class="col">
						</div>
					</div>
					
				
				
				
				<div class="form-check"> 
					<input type="hidden" name="isSent" value="0" />
				    <input type="checkbox" class="form-check-input" id="isSent" name="isSent" value="1" <?php if (isset($manifestation) && $manifestation->isSent == 1) { echo 'checked="checked"'; } ?> />
				    <label class="form-check-label checkbox-label" for="isSent">Document was sent from sender(s) to receiver(s)</label>
				</div>
				
				<div class="form-check"> 
					<input type="hidden" name="draft" value="0" />
				    <input type="checkbox" class="form-check-input" id="draft" name="draft" value="1" <?php if (isset($manifestation) && $manifestation->draft == 1) { echo 'checked="checked"'; } ?> />
				    <label class="form-check-label checkbox-label" for="draft">Draft version</label>
				</div>
				
				<div class="form-check"> 
					<input type="hidden" name="includingEnvelope" value="0" />
				    <input type="checkbox" class="form-check-input" id="includingEnvelope" name="includingEnvelope" value="1" <?php if (isset($manifestation) && $manifestation->includingEnvelope == 1) { echo 'checked="checked"'; } ?> />
				    <label class="form-check-label checkbox-label" for="includingEnvelope">Including envelope</label>
				</div>
				
				</fieldset>
			</div>
            
            <div class="row form-row">
				<div class="col">
		            <fieldset>
		    			<legend>Signatures</legend>
		    			<div id="languagesHelpBlock" class="form-text">
							Select the
							
							<?php
							$personsAsSenders = false;
							$institutionsAsSenders = false;
							foreach($letter->senders as $tmp) {
								if (isset($tmp->person)) {
									$personsAsSenders = true;
								}
								if (isset($tmp->institution)) {
									$institutionsAsSenders = true;
								}
							}
							if ($personsAsSenders) {
								echo "individuals ";
							}
							if ($institutionsAsSenders) {
								if ($personsAsSenders) {
									echo "and/or ";
								}
								echo "institutions ";
							}
							if (!$personsAsSenders && !$institutionsAsSenders) {
								echo "individuals and/or institutions ";
							}
							?>
							
							who have signed the document.
						</div>
						
						<?php
						
						foreach($letter->senders as $tmp) {
						
							if (isset($tmp->person)) {
								echo '<div class="form-check">
									<input type="checkbox" class="form-check-input" id="signatures'.$tmp->person->id.'" name="manifestationSignatures[_senderIds][]" value="'.$tmp->id.'"';
									if (isset($manifestation) && is_array($manifestation->manifestationSignatures)) {
										foreach($manifestation->manifestationSignatures['_senderIds'] as $id) {
											if ($id == $tmp->id) {
												echo 'checked="checked"';
											}
										}
									}
									echo '/>
            						<label class="form-check-label checkbox-label" for="signatures'.$tmp->person->id.'">'.$tmp->person->firstname.' '.$tmp->person->lastname.'</label>
								</div>';
							} else {
								echo '<div class="form-check">
									<input type="checkbox" class="form-check-input" id="signatures'.$tmp->institution->id.'" name="manifestationSignatures[_senderIds][]" value="'.$tmp->id.'"';
									if (isset($manifestation) && is_array($manifestation->manifestationSignatures)) {
										foreach($manifestation->manifestationSignatures['_senderIds'] as $id) {
											if ($id == $tmp->id) {
												echo 'checked="checked"';
											}
										}
									}
									echo '/>
            						<label class="form-check-label checkbox-label" for="signatures'.$tmp->institution->id.'">'.$tmp->institution->name.'</label>
								</div>';
							}
							
						}
						
						?>
						
		    		</fieldset>
	    		</div>
	    		<div class="col">
		            <fieldset>
		    			<legend>Annotations</legend>
		    			<div id="languagesHelpBlock" class="form-text">
							Select the 
							
							<?php
							$personsAsReceivers = false;
							$institutionsAsReceivers = false;
							foreach($letter->receivers as $tmp) {
								if (isset($tmp->person)) {
									$personsAsReceivers = true;
								}
								if (isset($tmp->institution)) {
									$institutionsAsReceivers = true;
								}
							}
							foreach($letter->senders as $tmp) {
								if (isset($tmp->person)) {
									$personsAsReceivers = true;
								}
								if (isset($tmp->institution)) {
									$institutionsAsReceivers = true;
								}
							}
							if ($personsAsReceivers) {
								echo "individuals ";
							}
							if ($institutionsAsReceivers) {
								if ($personsAsReceivers) {
									echo "and/or ";
								}
								echo "institutions ";
							}
							if (!$personsAsReceivers && !$institutionsAsReceivers) {
								echo "individuals and/or institutions ";
							}
							?>
							
							who have annotated the document.
						</div>
							
							<?php
						
							foreach($letter->receivers as $tmp) {
							
								if (isset($tmp->person)) {
									echo '<div class="form-check">
										<input type="checkbox" class="form-check-input" id="annotations-person'.$tmp->person->id.'" name="manifestationAnnotations[_receiverIds][]" value="'.$tmp->id.'" />
	            						<label class="form-check-label checkbox-label" for="annotations-person'.$tmp->person->id.'">'.$tmp->person->firstname.' '.$tmp->person->lastname.'</label>
									</div>';
								} else {
									echo '<div class="form-check">
										<input type="checkbox" class="form-check-input" id="annotations-instituion'.$tmp->institution->id.'" name="manifestationAnnotations[_receiverIds][]" value="'.$tmp->id.'" />
	            						<label class="form-check-label checkbox-label" for="annotations-instituion'.$tmp->institution->id.'">'.$tmp->institution->name.'</label>
									</div>';
								}
								
							}
							
							foreach($letter->senders as $tmp) {
								
								if (isset($tmp->person)) {
									echo '<div class="form-check">
									<input type="checkbox" class="form-check-input" id="annotations-person'.$tmp->person->id.'" name="manifestationAnnotations[_senderIds][]" value="'.$tmp->id.'" />
            						<label class="form-check-label checkbox-label" for="annotations-person'.$tmp->person->id.'">'.$tmp->person->firstname.' '.$tmp->person->lastname.'</label>
								</div>';
								} else {
									echo '<div class="form-check">
									<input type="checkbox" class="form-check-input" id="annotations-instituion'.$tmp->institution->id.'" name="manifestationAnnotations[_senderIds][]" value="'.$tmp->id.'" />
            						<label class="form-check-label checkbox-label" for="annotations-instituion'.$tmp->institution->id.'">'.$tmp->institution->name.'</label>
								</div>';
								}
								
							}
							
							?>
							
		    		</fieldset>
	    		</div>
    		</div>
    			
    			
    			
            <div class="row form-row">
           <fieldset>
    			<legend>Languages</legend>
    			<div id="languagesHelpBlock" class="form-text">
					Select the language(-s) in which the text of the document is written.
				</div>
            <?php
            

            foreach($languages as $languageId => $languageName) {
            
            	echo '<div class="form-check"> 
					<input type="checkbox" class="form-check-input" id="language'.$languageId.'" name="languages[_ids][]" value="'.$languageId.'"';
            		if (isset($manifestation) && is_array($manifestation->languages)) {
            			foreach($manifestation->languages as $key => $val) {
            				if ($val->id == $languageId) {
	            				echo 'checked="checked"';
	            			}
	            		}
	            	}
					echo '/>
            		<label class="form-check-label checkbox-label" for="language'.$languageId.'">'.$languageName.'</label>
				</div>';
            	//languages[_ids][]
            	
            }
            	
            ?>
           </fieldset>
            </div>
            
          
			<div class="row form-row">
				<fieldset>
	    			<legend>Availability</legend>
	           
				<div class="row form-row">
					<div class="col">
						<?php echo $this->Form->control('archive_id', [
							'options' => $archives,
							'empty' => 'Select archive',
							'class' => 'form-select',
							'label' => ['text' => 'Available in ...']
						]); ?>
					</div>
					<div class="col">
					</div>
				</div>
				
					<?php
					echo $this->Form->control('archive_info', [
						'placeholder' => 'Document detail',
						'class' => 'form-control',
						'label' => ['text' => 'Document detail (URL, shelfmark, ...)']
					]);
					?>
					
	           </fieldset>
           </div>
           
            <?php
            /*
            <fieldset>
                <legend><?= __('Add Manifestation') ?></legend>
                <?php
                    
                    echo $this->Form->control('pages');
                    echo $this->Form->control('signed');
                    echo $this->Form->control('includingEnvelope');
                    echo $this->Form->control('draft');
                    echo $this->Form->control('isSent');
                    echo $this->Form->control('writingstyle');
                    echo $this->Form->control('writingstyle_other');
                    echo $this->Form->control('archive_id', ['options' => $archives]);
                    echo $this->Form->control('archive_info');
                    echo $this->Form->control('languages._ids', ['options' => $languages]);
                ?>
            </fieldset>
            */?>
            
            <?php
            echo $this->Form->hidden('letter_id', ['value' => $letter->id]);
            ?>
            
            
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

