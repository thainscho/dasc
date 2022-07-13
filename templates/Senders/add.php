<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sender $sender
 * @var \Cake\Collection\CollectionInterface|string[] $letters
 * @var \Cake\Collection\CollectionInterface|string[] $persons
 * @var \Cake\Collection\CollectionInterface|string[] $institutions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Senders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="senders form content">
            <?= $this->Form->create($sender) ?>
            <fieldset>
                <legend><?= __('Add Sender') ?></legend>
                <?php
                    echo $this->Form->control('letter_id', ['options' => $letters]);
                    echo $this->Form->control('person_id', ['options' => $persons]);
                    echo $this->Form->control('institution_id', ['options' => $institutions]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
