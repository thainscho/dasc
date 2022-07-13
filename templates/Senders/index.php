<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sender[]|\Cake\Collection\CollectionInterface $senders
 */
?>
<div class="senders index content">
    <?= $this->Html->link(__('New Sender'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Senders') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('letter_id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('institution_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($senders as $sender): ?>
                <tr>
                    <td><?= $this->Number->format($sender->id) ?></td>
                    <td><?= $sender->has('letter') ? $this->Html->link($sender->letter->id, ['controller' => 'Letters', 'action' => 'view', $sender->letter->id]) : '' ?></td>
                    <td><?= $sender->has('person') ? $this->Html->link($sender->person->id, ['controller' => 'Persons', 'action' => 'view', $sender->person->id]) : '' ?></td>
                    <td><?= $sender->has('institution') ? $this->Html->link($sender->institution->name, ['controller' => 'Institutions', 'action' => 'view', $sender->institution->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sender->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sender->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sender->id)]) ?>
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
