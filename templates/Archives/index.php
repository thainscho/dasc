<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Archive[]|\Cake\Collection\CollectionInterface $archives
 */
?>
<div class="archives index content">
    <?= $this->Html->link(__('New Archive'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Archives') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address_id') ?></th>
                    <th><?= $this->Paginator->sort('website') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($archives as $archive): ?>
                <tr>
                    <td><?= $this->Number->format($archive->id) ?></td>
                    <td><?= h($archive->name) ?></td>
                    <td><?= $archive->has('address') ? $this->Html->link($archive->address->id, ['controller' => 'Addresses', 'action' => 'view', $archive->address->id]) : '' ?></td>
                    <td><?= h($archive->website) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $archive->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $archive->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $archive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $archive->id)]) ?>
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
