<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address[]|\Cake\Collection\CollectionInterface $addresses
 */
?>
<div class="addresses index content">
    <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Addresses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('addressline') ?></th>
                    <th><?= $this->Paginator->sort('street') ?></th>
                    <th><?= $this->Paginator->sort('streetnumber') ?></th>
                    <th><?= $this->Paginator->sort('postalcode') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('nationalstate_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addresses as $address): ?>
                <tr>
                    <td><?= $this->Number->format($address->id) ?></td>
                    <td><?= h($address->addressline) ?></td>
                    <td><?= h($address->street) ?></td>
                    <td><?= h($address->streetnumber) ?></td>
                    <td><?= h($address->postalcode) ?></td>
                    <td><?= h($address->city) ?></td>
                    <td><?= $address->has('nationalstate') ? $this->Html->link($address->nationalstate->name, ['controller' => 'Nationalstates', 'action' => 'view', $address->nationalstate->id]) : '' ?></td>
                    <td><?= h($address->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $address->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
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
