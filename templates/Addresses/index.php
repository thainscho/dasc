<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address[]|\Cake\Collection\CollectionInterface $addresses
 */
?>

<h3><?= __('Addresses') ?></h3>
    
<p>Data records of addresses are managed here. Adresses are asscociated with senders and receivers of correspondence, as well as to data that requires an address.</p>
    
<p>
<?= $this->Html->link('<i class="fa-solid fa-plus"></i> '.__('Create new address'), ['action' => 'add'], ['escape' => false, 'class' => 'btn-primary btn btn-small']) ?>
</p>


<div class="institutions index content">
   
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('postalcode') ?></th>
                    <th><?= $this->Paginator->sort('street') ?></th>
                    <th><?= $this->Paginator->sort('nationalstate_id') ?></th>
                    <th><?= $this->Paginator->sort('addressline') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addresses as $address): ?>
                <tr>
                    <td><?= $this->Number->format($address->id) ?></td>
                    <td><?= h($address->city) ?></td>
                    <td><?= h($address->postalcode) ?></td>
                    <td><?php
                    	echo h($address->street);
                    	if ($address->streetnumber != "") {
                    		echo " ".h($address->streetnumber);
 	                  	}
                    	?></td>
                    <td><?= $address->has('nationalstate') ? $this->Html->link($address->nationalstate->name, ['controller' => 'Nationalstates', 'action' => 'view', $address->nationalstate->id]) : '' ?></td>
                    <td><?= h($address->addressline) ?></td>
                    <td><?= h($address->created) ?></td>
                    <td>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-eye"></i> '.__('View'),
                        		['action' => 'view', $address->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-pen"></i> '.__('Edit'),
                        		['action' => 'edit', $address->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?= $this->Form->postLink(
                        		'<i class="fa-solid fa-trash"></i> '.__('Delete'),
                        		['action' => 'delete', $address->id],
                        		['escape' => false, 'class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $address->id)]);
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
