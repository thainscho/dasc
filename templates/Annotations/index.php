<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Annotation[]|\Cake\Collection\CollectionInterface $annotations
 */
?>
<div class="annotations index content">
    <?= $this->Html->link(__('New Annotation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Annotations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('manifestation_id') ?></th>
                    <th><?= $this->Paginator->sort('receiver_id') ?></th>
                    <th><?= $this->Paginator->sort('sender_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($annotations as $annotation): ?>
                <tr>
                    <td><?= $this->Number->format($annotation->id) ?></td>
                    <td><?= $annotation->has('manifestation') ? $this->Html->link($annotation->manifestation->id, ['controller' => 'Manifestations', 'action' => 'view', $annotation->manifestation->id]) : '' ?></td>
                    <td><?= $annotation->has('receiver') ? $this->Html->link($annotation->receiver->id, ['controller' => 'Receivers', 'action' => 'view', $annotation->receiver->id]) : '' ?></td>
                    <td><?= $annotation->has('sender') ? $this->Html->link($annotation->sender->id, ['controller' => 'Senders', 'action' => 'view', $annotation->sender->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $annotation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $annotation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $annotation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $annotation->id)]) ?>
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
