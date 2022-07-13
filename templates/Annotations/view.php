<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Annotation $annotation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Annotation'), ['action' => 'edit', $annotation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Annotation'), ['action' => 'delete', $annotation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $annotation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Annotations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Annotation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="annotations view content">
            <h3><?= h($annotation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Manifestation') ?></th>
                    <td><?= $annotation->has('manifestation') ? $this->Html->link($annotation->manifestation->id, ['controller' => 'Manifestations', 'action' => 'view', $annotation->manifestation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Receiver') ?></th>
                    <td><?= $annotation->has('receiver') ? $this->Html->link($annotation->receiver->id, ['controller' => 'Receivers', 'action' => 'view', $annotation->receiver->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sender') ?></th>
                    <td><?= $annotation->has('sender') ? $this->Html->link($annotation->sender->id, ['controller' => 'Senders', 'action' => 'view', $annotation->sender->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($annotation->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
