<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Letter $letter
 * @var \Cake\Collection\CollectionInterface|string[] $letterformats
 * @var \Cake\Collection\CollectionInterface|string[] $addresses
 */
?>
<script>

$(document).ready(function() {

    console.log( "ready!" );
    
    <?php
    /*
    var myModal = document.getElementById('myModal')
	var myInput = document.getElementById('myInput')
	
	myModal.addEventListener('shown.bs.modal', function () {
	  myInput.focus()
	})
	*/
    ?>
    
    
    $("#senderUnknown").on("change", function() {
    	if (this.checked) {
	    	$("#senderForm").hide();
    	} else {
			$("#senderForm").show();
		}
	});
	
	$("#receiverUnknown").on("change", function() {
    	if (this.checked) {
	    	$("#receiverForm").hide();
    	} else {
			$("#receiverForm").show();
		}
	});
    
    $(document).on("click", ".deleteLink", function() { //dynamic binding
		var type = $(this).data("type");
		var id = $(this).data("id");
		var senderreceiver = $(this).data("field");
		$("#hidden-"+type+"-"+senderreceiver+"-"+id).remove();
		$(this).parents("li").remove();
		
		if ($("#"+senderreceiver+"sList").children().length == 0) {
			$("#"+senderreceiver+"Info").show();
		}
		
		
		//TODO: delete id
  	});
    

	//Form Check: prevent submit if sender/reciver are missing
    $("form").submit(function() {

		
		if ($("#sendersList").children().length == 0) {
			alert("Some sender must be given");
			$("#senderSearch").focus();
			return false;
		}
		if ($("#receiversList").children().length == 0) {
			alert("Some receiver must be given");
			$("#receiverSearch").focus();
			return false;
		}
	   
	});

    
    $(function() {
		$(".personSearch").autocomplete({
			minLength:2,
        	source: function(request, response) {
 				$.ajax({
 					url: "../persons/getPersonByName",
 					dataType: "json",
                    data: {name:request.term},
                	success: function(data) {
                	
						response($.map(data, function(object) {
							return {
								label: object.name,
								value: object.id,
								type: object.type
	                        };
						}));

					}
					
				});
				
 			},
 			select: function(event, ui) {
 			
 				var dataField = $(this).data("field");
 				
 				var additionalHtml = "<li class='list-group-item d-flex justify-content-between align-items-center'>"+ui.item.label+" (ID "+ui.item.value+")<span><a href='javascript:;' class='deleteLink' data-id='"+ui.item.value+"' data-type='"+ui.item.type+"' data-field='"+dataField+"'><i class='fa-solid fa-xmark'></i></a></span></li>";
 			
 				var newHiddenInput = "";
 				var newHiddenInputId = "";
 				if (ui.item.type == "person") {
 					newHiddenInputId = "hidden-person-"+dataField+"-"+ui.item.value;
	 				newHiddenInput = "<input type='hidden' name='"+dataField+"spersons[_ids][]' value='"+ui.item.value+"' id='"+newHiddenInputId+"' />";
 				} else {
 					newHiddenInputId = "hidden-institution-"+dataField+"-"+ui.item.value;
 					newHiddenInput = "<input type='hidden' name='"+dataField+"sinstitutions[_ids][]' value='"+ui.item.value+"' id='"+newHiddenInputId+"' />";
 				}
 			
 				//check if the person/institution has already been added
 				if($("#"+newHiddenInputId).length > 0) {
 				
					alert("This "+dataField+" has already been added.");
					return false;
					
				} else {
 				
	 				$("#"+dataField+"sList").append(additionalHtml);
	 				$("#hiddenFields").append(newHiddenInput);
	 				$("#"+dataField+"Info").hide();
	
	 				$("#"+dataField+"Search").val("");
	 				console.log($("#"+dataField+"Search").val());
	 				return false;
	 				
	 			}
	 			
 			},
 			
		});
	});     
    
    
});


</script>


<h3><?= __('Pieces of correspondence') ?><br />
<small><?php echo __('Create new correspondence record'); ?></small>
</h3>

<p>
<?= $this->Html->link(__('Back'), ['action' => 'index']) ?>
</p>

<div class="column-responsive column-80">
	<div class="letters form content">
		<?= $this->Form->create($letter) ?>
		
		<?php
		$myTemplates = [
			'inputContainer' => '<div class="col">{{content}}</div>',
		];
		$this->Form->setTemplates($myTemplates);
		?>


	<fieldset>
    <legend class="required">Receiver</legend>
<!-- 		<div class="form-check"> -->
<!-- 		    <input type="checkbox" class="form-check-input" id="receiverUnknown"> -->
<!-- 		    <label class="form-check-label" for="receiverUnknown">Receiver unknown</label> -->
<!-- 		</div> -->
		
		<div id="receiverForm">
		
			<div class="form-row form-group">
				<input type="text" class="form-control personSearch" data-field="receiver" id="receiverSearch" aria-describedby="receiverHelp" placeholder="Search for a receiver">
			</div>
			
			<div class="select2-additional-links alert alert-info" id="receiverInfo">
				If the receiver cannot be found, create a new entry for a <?php echo $this->Html->link('person', ['controller' => 'persons', 'action' => 'add']); ?> or <?php echo $this->Html->link('institution', ['controller' => 'institutions', 'action' => 'add']); ?> (a new page will open).
			</div>
			
			<div class="row form-row form-group">
				<div class="col">
					<ul class="list-group list-group-flush" id="receiversList">
					</ul>
				</div>
				<div class="col">
				</div>
			</div>

		
			<div class="row form-row form-group">
				<div class="col">
				
				<?php
					echo $this->Form->control(
						'address_to_id', array(
							'options' => $addresses,
							'label' => ['text' => 'Receiver’s address as stated on the document'],
							'empty' => 'Select Address',
							'class' => 'form-select'
						)
					);
				?>
		
				</div>
			</div>
			
			<div class="row form-row form-group">
				<div class="col">
				
				<?php
					echo $this->Form->control(
						'address_to_assumed', array(
							'options' => $addresses,
							'label' => ['text' => 'Receiver’s address (if the document was not sent from the address as stated)'],
							'empty' => 'Select Address',
							'class' => 'form-select'
						)
					);
				?>
		
				</div>
			</div>
			
			<div class="select2-additional-links alert alert-info" id="addressInfo">
				If an address cannot be found, <?php echo $this->Html->link('create a new entry', ['controller' => 'addresses', 'action' => 'add']); ?> (a new page will open).
			</div>
	
				
		</div>
		
	
	</fieldset>
	
	
	

	<fieldset>
    <legend class="required">Sender</legend>
<!-- 		<div class="form-check"> -->
<!-- 		    <input type="checkbox" class="form-check-input" id="senderUnknown"> -->
<!-- 		    <label class="form-check-label" for="senderUnknown">Sender unknown</label> -->
<!-- 		</div> -->
		
		<div id="senderForm">
		
			<div class="form-row form-group">
				<input type="text" class="form-control personSearch" data-field="sender" id="senderSearch" aria-describedby="senderHelp" placeholder="Search for a sender">
			</div>
			
			
			<div class="select2-additional-links alert alert-info" id="senderInfo">
				If the sender cannot be found, create a new entry for a <?php echo $this->Html->link('person', ['controller' => 'persons', 'action' => 'add']); ?> or <?php echo $this->Html->link('institution', ['controller' => 'institutions', 'action' => 'add']); ?> (a new page will open).
			</div>
			
			<div class="row form-row form-group">
				<div class="col">
					<ul class="list-group list-group-flush" id="sendersList">
					</ul>
				</div>
				<div class="col">
				</div>
			</div>
			
			
			<div class="row form-row form-group">
				<div class="col">
				
				<?php
					echo $this->Form->control(
						'address_from_id', array(
							'options' => $addresses,
							'label' => ['text' => 'Sender’s address as stated on the document'],
							'empty' => 'Select Address',
							'class' => 'form-select'
						)
					);
				?>
		
				</div>
			</div>
			
			<div class="row form-row form-group">
				<div class="col">
				
				<?php
					echo $this->Form->control(
						'address_from_assumed', array(
							'options' => $addresses,
							'label' => ['text' => 'Sender’s address (if the document was not sent from the address as stated)'],
							'empty' => 'Select Address',
							'class' => 'form-select'
						)
					);
				?>
		
				</div>
			</div>

			<div class="select2-additional-links alert alert-info" id="addressInfo">
				If an address cannot be found, <?php echo $this->Html->link('create a new entry', ['controller' => 'addresses', 'action' => 'add']); ?> (a new page will open).
			</div>
			
		</div>
	</fieldset>

	<fieldset>
    <legend>Date</legend>
    <?php
			
		$days = array();
		for($i = 1; $i <= 31; $i++) {
			$days[$i] = $i;
		}
		
		$months = array();
		$months[1] = 'January';
		$months[2] = 'February';
		$months[3] = 'March';
		$months[4] = 'April';
		$months[5] = 'May';
		$months[6] = 'June';
		$months[7] = 'July';
		$months[8] = 'August';
		$months[9] = 'September';
		$months[10] = 'October';
		$months[12] = 'November';
		$months[12] = 'December';
			
	?>
	
	<div class="row form-row">
		<div class="col"><label for="day" class="col-form-label col-form-label-sm">Date as stated on the document</label></div>
		<div class="col"><?php echo $this->Form->select('letterdate_day', $days, ['empty' => 'Day', 'class' => 'form-select']); ?></div>
		<div class="col"><?php echo $this->Form->select('letterdate_month', $months, ['empty' => 'Month', 'class' => 'form-select']); ?></div>
		<div class="col"><?php echo $this->Form->control('letterdate_year', array('placeholder' => 'Year', 'label' => false, 'class' => 'form-control'));?></div>
	</div>
	
	<div class="row form-row">
		<div class="col"><label for="day" class="col-form-label col-form-label-sm">Correct date if the date stated is false</label></div>
		<div class="col"><?php echo $this->Form->select('letterdatecorrected_day', $days, ['empty' => 'Day', 'class' => 'form-select']); ?></div>
		<div class="col"><?php echo $this->Form->select('letterdatecorrected_month', $months, ['empty' => 'Month', 'class' => 'form-select']); ?></div>
		<div class="col"><?php echo $this->Form->control('letterdatecorrected_year', array('placeholder' => 'Year', 'label' => false, 'class' => 'form-control'));?></div>
	</div>
	
	<div class="row form-row">
		<div class="col"><label for="day" class="col-form-label col-form-label-sm">If the date is unknown: Earliest date possible</label></div>
		<div class="col"><?php echo $this->Form->select('datemin_day', $days, ['empty' => 'Day', 'class' => 'form-select']); ?></div>
		<div class="col"><?php echo $this->Form->select('datemin_month', $months, ['empty' => 'Month', 'class' => 'form-select']); ?></div>
		<div class="col"><?php echo $this->Form->control('datemin_year', array('placeholder' => 'Year', 'label' => false, 'class' => 'form-control'));?></div>
	</div>
	
	<div class="row form-row">
		<div class="col"><label for="day" class="col-form-label col-form-label-sm">If the date is unknown: Latest date possible</label></div>
		<div class="col"><?php echo $this->Form->select('datemax_day', $days, ['empty' => 'Day', 'class' => 'form-select']); ?></div>
		<div class="col"><?php echo $this->Form->select('datemax_month', $months, ['empty' => 'Month', 'class' => 'form-select']); ?></div>
		<div class="col"><?php echo $this->Form->control('datemax_year', array('placeholder' => 'Year', 'label' => false, 'class' => 'form-control'));?></div>
	</div>
	

	</fieldset>


	
	<fieldset>
    <legend>Details</legend>
    
	    <div class="row form-row form-group">
		
			<?php
				echo $this->Form->control(
					'letterformat_id', array(
						'options' => $letterformats,
						'label' => ['text' => 'Format of the document', 'class' => 'required'],
						'empty' => 'Select Format',
						'class' => 'form-select'
					)
				);
			?>
		
			<div class="col">
			</div>
		</div>
    
	    <div class="row form-row">
			<?php
				echo $this->Form->control(
					'note',
					array(
						'rows' => '3',
						'label' => ['text' => 'Note'],
						'class' => 'form-control'
					)
				);
			?>
		</div>
    
    </fieldset>
	
	<div id="hiddenFields">
	
	</div>
	
	
	<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary',]) ?>
	<?= $this->Form->end() ?>
        </div>
    </div>

