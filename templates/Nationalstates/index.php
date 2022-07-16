<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nationalstate[]|\Cake\Collection\CollectionInterface $nationalstates
 */
?>
<h3><?= __('National States') ?></h3>
    
<p>Data records of national states kept are managed here.</p>
    

<div class="nationalstates index content">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('abbreviation') ?></th>
                    <th><?= $this->Paginator->sort('dbpedia_url') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nationalstates as $nationalstate): ?>
                <tr>
                    <td><?= $this->Number->format($nationalstate->id) ?></td>
                    <td><?= h($nationalstate->name) ?></td>
                    <td><?= h($nationalstate->abbreviation) ?></td>
                    <td><?= h($nationalstate->dbpedia_url) ?></td>
                    <td>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-eye"></i> '.__('View'),
                        		['action' => 'view', $nationalstate->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?php
	                        $cssClass = "btn btn-primary btn-sm";
	                        if  ($nationalstate->id == 1) {
	                        	$cssClass .= " disabled";
	                        }
                        	echo $this->Html->link(
                        		'<i class="fa-solid fa-pen"></i> '.__('Edit'),
                        		['action' => 'edit', $nationalstate->id],
                        		['escape' => false, 'class' => $cssClass]);
                        ?>
                        <?php
	                        $cssClass = "btn btn-danger btn-sm";
	                        if  ($nationalstate->id == 1) {
	                        	$cssClass .= " disabled";
	                        }
                        	echo $this->Form->postLink(
                        		'<i class="fa-solid fa-trash"></i> '.__('Delete'),
                        		['action' => 'delete', $nationalstate->id],
                        			['escape' => false, 'class' => $cssClass, 'confirm' => __('Are you sure you want to delete # {0}?', $nationalstate->id)]);
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
