<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Letter[]|\Cake\Collection\CollectionInterface $letters
 */
?>

<h3><?= __('Pieces of correspondence') ?></h3>
    
<p>The correspondence data records are managed here.</p>
    
<p>
<?= $this->Html->link('<i class="fa-solid fa-plus"></i> '.__('Create new piece of correspondence'), ['action' => 'add'], ['escape' => false, 'class' => 'btn-primary btn btn-small']) ?>
</p>


<div class="institutions index content">
   
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('date', 'Date') ?></th>
                    <th><?= $this->Paginator->sort('letterformat_id', 'Format') ?></th>
                    <th><?= $this->Paginator->sort('Receiver') ?></th>
                    <th><?= $this->Paginator->sort('address_to_id', 'Sent to (address)') ?></th>
                    <th><?= $this->Paginator->sort('Sender') ?></th>
                    <th><?= $this->Paginator->sort('address_from_id', 'Sent from (address)') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($letters as $letter): ?>
                <tr>
                    <td><?= $this->Number->format($letter->id) ?></td>
                    <td><?= h($letter->date) ?></td>
                    <td>
                    	<?php
                    	
                    	if ($letter->has('letterformat')) {
                    		echo $letter->letterformat->name;	
                    	} else {
                    		echo 'n.a.';
                    	}
                    	//_getFullAddress
                    	?>
                    </td>
                    <td>
                    <?php

                    	$i = 0;
                    	$counterLimit = count($letter->receivers);
                    	foreach($letter->receivers as $receiver) {
	                    	
	                    	$i++;
	                    	echo $this->Html->link($receiver->ReceiverName, ['controller' => 'senders', 'action' => 'view', $receiver->id]);
	                    	if ($i < $counterLimit) {
	                    		echo ', ';
	                    	}
	                    	
	                    }
	      
                    ?>
                    </td>
                    <td>
                    <?php
                    	echo $letter->to_address_full;
                    ?>
                    </td>
                    <td>
                    <?php

                    	$i = 0;
                    	$counterLimit = count($letter->senders);
						foreach($letter->senders as $sender) {
	                    	
	                    	$i++;
	                    	echo $this->Html->link($sender->SenderName, ['controller' => 'senders', 'action' => 'view', $sender->id]);
	                    	if ($i < $counterLimit) {
	                    		echo ', ';
	                    	}
	                    	
	                    }
        
                    ?>
                    </td>
                    <td>
                    <?php
                    	echo $letter->from_address_full;
                    ?>
                    </td>
                    <td><?= h($letter->created) ?></td>
                    <td>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-eye"></i> '.__('View'),
                        		['action' => 'view', $letter->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-pen"></i> '.__('Edit'),
                        		['action' => 'edit', $letter->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?= $this->Form->postLink(
                        		'<i class="fa-solid fa-trash"></i> '.__('Delete'),
                        		['action' => 'delete', $letter->id],
                        		['escape' => false, 'class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $letter->id)]);
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
