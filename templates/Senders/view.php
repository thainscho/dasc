<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sender $sender
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sender'), ['action' => 'edit', $sender->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sender'), ['action' => 'delete', $sender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sender->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Senders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sender'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="senders view content">
            <h3><?= h($sender->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Letter') ?></th>
                    <td><?= $sender->has('letter') ? $this->Html->link($sender->letter->id, ['controller' => 'Letters', 'action' => 'view', $sender->letter->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $sender->has('person') ? $this->Html->link($sender->person->id, ['controller' => 'Persons', 'action' => 'view', $sender->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Institution') ?></th>
                    <td><?= $sender->has('institution') ? $this->Html->link($sender->institution->name, ['controller' => 'Institutions', 'action' => 'view', $sender->institution->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sender->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
