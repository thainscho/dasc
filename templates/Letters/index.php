<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Letter[]|\Cake\Collection\CollectionInterface $letters
 */
?>
<div class="letters index content">
    <?= $this->Html->link(__('New Letter'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Letters') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('date_min') ?></th>
                    <th><?= $this->Paginator->sort('date_max') ?></th>
                    <th><?= $this->Paginator->sort('letterformat_id') ?></th>
                    <th><?= $this->Paginator->sort('address_from_id') ?></th>
                    <th><?= $this->Paginator->sort('address_from_assumed') ?></th>
                    <th><?= $this->Paginator->sort('address_to_id') ?></th>
                    <th><?= $this->Paginator->sort('address_to_assumed') ?></th>
                    <th><?= $this->Paginator->sort('isSent') ?></th>
                    <th><?= $this->Paginator->sort('draft') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($letters as $letter): ?>
                <tr>
                    <td><?= $this->Number->format($letter->id) ?></td>
                    <td><?= h($letter->date) ?></td>
                    <td><?= h($letter->date_min) ?></td>
                    <td><?= h($letter->date_max) ?></td>
                    <td><?= $letter->has('letterformat') ? $this->Html->link($letter->letterformat->name, ['controller' => 'Letterformats', 'action' => 'view', $letter->letterformat->id]) : '' ?></td>
                    <td><?= $letter->address_from_id === null ? '' : $this->Number->format($letter->address_from_id) ?></td>
                    <td><?= $letter->address_from_assumed === null ? '' : $this->Number->format($letter->address_from_assumed) ?></td>
                    <td><?= $letter->has('address') ? $this->Html->link($letter->address->id, ['controller' => 'Addresses', 'action' => 'view', $letter->address->id]) : '' ?></td>
                    <td><?= $letter->address_to_assumed === null ? '' : $this->Number->format($letter->address_to_assumed) ?></td>
                    <td><?= $this->Number->format($letter->isSent) ?></td>
                    <td><?= $letter->draft === null ? '' : $this->Number->format($letter->draft) ?></td>
                    <td><?= h($letter->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $letter->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $letter->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $letter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $letter->id)]) ?>
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
