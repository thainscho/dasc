<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language[]|\Cake\Collection\CollectionInterface $languages
 */
?>
<h3><?= __('Languages') ?></h3>
    
<p>Data records of languages are managed here.</p>
    
<p>
<?= $this->Html->link('<i class="fa-solid fa-plus"></i> '.__('Create new language record'), ['action' => 'add'], ['escape' => false, 'class' => 'btn-primary btn btn-small']) ?>
</p>
    
    
<div class="languages index content">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('abbreviation') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($languages as $language): ?>
                <tr>
                    <td><?= $this->Number->format($language->id) ?></td>
                    <td><?= h($language->name) ?></td>
                    <td><?= h($language->abbreviation) ?></td>
                    <td>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-eye"></i> '.__('View'),
                        		['action' => 'view', $language->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-pen"></i> '.__('Edit'),
                        		['action' => 'edit', $language->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?= $this->Form->postLink(
                        		'<i class="fa-solid fa-trash"></i> '.__('Delete'),
                        		['action' => 'delete', $language->id],
                        		['escape' => false, 'class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $language->id)]);
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
