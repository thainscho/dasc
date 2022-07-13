<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institution[]|\Cake\Collection\CollectionInterface $institutions
 */
?>
<div class="institutions index content">
    <h3><?= __('Institutions') ?></h3>
    
    <p>Data records of instituions are managed here. A record of an instituion is required in order to sepcifiy it as sender or recipient of a letter.</p>
    
    <p>
    	<?= $this->Html->link(__('Create new institution'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    </p>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('dbpedia_url', 'DBpedia URL') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($institutions as $institution): ?>
                <tr>
                    <td><?= $this->Number->format($institution->id) ?></td>
                    <td><?= h($institution->name) ?></td>
                    <td><?= h($institution->dbpedia_url) ?></td>
                    <td><?= h($institution->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $institution->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $institution->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $institution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institution->id)]) ?>
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
