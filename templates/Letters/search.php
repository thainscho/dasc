<h3>
<?php echo __("Seach correspondence"); ?>
</h3>


<div class="column-responsive column-80">
	<div class="letters form content">
		<?php
			echo $this->Form->create($letter);
		?>
		
		<?php
		$myTemplates = [
			'inputContainer' => '<div class="col">{{content}}</div>',
		];
		$this->Form->setTemplates($myTemplates);
		?>


	<fieldset>
    <legend>Sender</legend>
<!-- 		<div class="form-check"> -->
<!-- 		    <input type="checkbox" class="form-check-input" id="receiverUnknown"> -->
<!-- 		    <label class="form-check-label" for="receiverUnknown">Receiver unknown</label> -->
<!-- 		</div> -->
		
		<div id="receiverForm">
			<div class="form-row form-group">
				<input type="text" class="form-control personSearch" data-field="receiver" id="receiverSearch" aria-describedby="receiverHelp" placeholder="Sender name">
			</div>
		</div>
		
	</fieldset>

	<fieldset>
    <legend>Receiver</legend>
<!-- 		<div class="form-check"> -->
<!-- 		    <input type="checkbox" class="form-check-input" id="receiverUnknown"> -->
<!-- 		    <label class="form-check-label" for="receiverUnknown">Receiver unknown</label> -->
<!-- 		</div> -->
		
		<div id="receiverForm">
			<div class="form-row form-group">
				<input type="text" class="form-control personSearch" data-field="receiver" id="receiverSearch" aria-describedby="receiverHelp" placeholder="Receiver name">
			</div>
		</div>
		
	</fieldset>
	
	<fieldset>
    <legend>Person or institution</legend>
<!-- 		<div class="form-check"> -->
<!-- 		    <input type="checkbox" class="form-check-input" id="receiverUnknown"> -->
<!-- 		    <label class="form-check-label" for="receiverUnknown">Receiver unknown</label> -->
<!-- 		</div> -->
		
		<div id="receiverForm">
			<div class="form-row form-group">
				<input type="text" class="form-control personSearch" data-field="receiver" id="receiverSearch" aria-describedby="receiverHelp" placeholder="Receiver name">
			</div>
		</div>
		
		Annotated<br />
		Signed<br />
		
	</fieldset>
	
	
	<fieldset>
    <legend>Date</legend>
<!-- 		<div class="form-check"> -->
<!-- 		    <input type="checkbox" class="form-check-input" id="receiverUnknown"> -->
<!-- 		    <label class="form-check-label" for="receiverUnknown">Receiver unknown</label> -->
<!-- 		</div> -->
		
		<div id="receiverForm">
			<div class="form-row form-group">
				<input type="text" class="form-control personSearch" data-field="receiver" id="receiverSearch" aria-describedby="receiverHelp" placeholder="Receiver name">
			</div>
		</div>
		
	</fieldset>
	
	<fieldset>
    <legend>Address</legend>
<!-- 		<div class="form-check"> -->
<!-- 		    <input type="checkbox" class="form-check-input" id="receiverUnknown"> -->
<!-- 		    <label class="form-check-label" for="receiverUnknown">Receiver unknown</label> -->
<!-- 		</div> -->
		
		<div id="receiverForm">
			<div class="form-row form-group">
				<input type="text" class="form-control personSearch" data-field="receiver" id="receiverSearch" aria-describedby="receiverHelp" placeholder="Receiver name">
			</div>
		</div>
		
	</fieldset>
	
	<fieldset>
    <legend>Document details</legend>
<!-- 		<div class="form-check"> -->
<!-- 		    <input type="checkbox" class="form-check-input" id="receiverUnknown"> -->
<!-- 		    <label class="form-check-label" for="receiverUnknown">Receiver unknown</label> -->
<!-- 		</div> -->
		
		<div id="receiverForm">
			Lost piece of correspondence<br />
			Langauge<br />
			Signed<br />
		</div>
		
	</fieldset>

	</div>		
</div>