<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Letterformat[]|\Cake\Collection\CollectionInterface $letterformats
 */
?>
<h3><?= __('Formats of correspondence') ?></h3>
    
<p>Data records of formats in which correspondence is available.</p>
    
<p>
<?= $this->Html->link('<i class="fa-solid fa-plus"></i> '.__('Create new format'), ['action' => 'add'], ['escape' => false, 'class' => 'btn-primary btn btn-small']) ?>
</p>
  
<div class="letterformats index content">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($letterformats as $letterformat): ?>
                <tr>
                    <td><?= $this->Number->format($letterformat->id) ?></td>
                    <td><?= h($letterformat->name) ?></td>
                    <td>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-eye"></i> '.__('View'),
                        		['action' => 'view', $letterformat->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-pen"></i> '.__('Edit'),
                        		['action' => 'edit', $letterformat->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?= $this->Form->postLink(
                        		'<i class="fa-solid fa-trash"></i> '.__('Delete'),
                        		['action' => 'delete', $letterformat->id],
                        		['escape' => false, 'class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $letterformat->id)]);
                        ?>
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
