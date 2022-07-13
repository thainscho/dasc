<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nationalstate[]|\Cake\Collection\CollectionInterface $nationalstates
 */
?>
<div class="nationalstates index content">
    <?= $this->Html->link(__('New Nationalstate'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Nationalstates') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
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
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $nationalstate->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nationalstate->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nationalstate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nationalstate->id)]) ?>
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
