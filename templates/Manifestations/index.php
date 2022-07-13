<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manifestation[]|\Cake\Collection\CollectionInterface $manifestations
 */
?>
<div class="manifestations index content">
    <?= $this->Html->link(__('New Manifestation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Manifestations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('letter_id') ?></th>
                    <th><?= $this->Paginator->sort('pages') ?></th>
                    <th><?= $this->Paginator->sort('signed') ?></th>
                    <th><?= $this->Paginator->sort('includingEnvelope') ?></th>
                    <th><?= $this->Paginator->sort('draft') ?></th>
                    <th><?= $this->Paginator->sort('isSent') ?></th>
                    <th><?= $this->Paginator->sort('writingstyle') ?></th>
                    <th><?= $this->Paginator->sort('writingstyle_other') ?></th>
                    <th><?= $this->Paginator->sort('archive_id') ?></th>
                    <th><?= $this->Paginator->sort('archive_info') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($manifestations as $manifestation): ?>
                <tr>
                    <td><?= $this->Number->format($manifestation->id) ?></td>
                    <td><?= $manifestation->has('letter') ? $this->Html->link($manifestation->letter->id, ['controller' => 'Letters', 'action' => 'view', $manifestation->letter->id]) : '' ?></td>
                    <td><?= $manifestation->pages === null ? '' : $this->Number->format($manifestation->pages) ?></td>
                    <td><?= $manifestation->signed === null ? '' : $this->Number->format($manifestation->signed) ?></td>
                    <td><?= $manifestation->includingEnvelope === null ? '' : $this->Number->format($manifestation->includingEnvelope) ?></td>
                    <td><?= $this->Number->format($manifestation->draft) ?></td>
                    <td><?= $this->Number->format($manifestation->isSent) ?></td>
                    <td><?= h($manifestation->writingstyle) ?></td>
                    <td><?= h($manifestation->writingstyle_other) ?></td>
                    <td><?= $manifestation->has('archive') ? $this->Html->link($manifestation->archive->name, ['controller' => 'Archives', 'action' => 'view', $manifestation->archive->id]) : '' ?></td>
                    <td><?= h($manifestation->archive_info) ?></td>
                    <td><?= h($manifestation->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $manifestation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $manifestation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $manifestation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manifestation->id)]) ?>
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
