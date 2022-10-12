<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>

<h3><?= __('Persons') ?></h3>
    
<p>Data records of individual persons are managed here. A record of a person is required to specify them as sender or recipient of correspondence.</p>
    
<p>
<?= $this->Html->link('<i class="fa-solid fa-plus"></i> '.__('Create new person record'), ['action' => 'add'], ['escape' => false, 'class' => 'btn-primary btn btn-small']) ?>
</p>
    
<div class="persons index content">
    
	<div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('lastname', 'Last name') ?></th>
                    <th><?= $this->Paginator->sort('firstname', 'First name') ?></th>
                    <th><?= $this->Paginator->sort('dbpedia_url', 'DBpedia URL') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('dayofbirth', 'Life dates') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person): ?>
                <tr>
                    <td><?= $this->Number->format($person->id) ?></td>
                    <td><?= h($person->lastname) ?></td>
                    <td><?= h($person->firstname) ?></td>
                    <td><?= h($person->dbpedia_url) ?></td>
                    <td><?= h($person->gender) ?></td>
                    <td><?php echo $person->getLifeDates(); ?></td>
                    <!-- <td><?= $person->dayofbirth === null ? '' : $this->Number->format($person->dayofbirth, ['locale' => 'de_DE']) ?></td> //-->
                    <td><?= h($person->created) ?></td>
                    <td>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-eye"></i> '.__('View'),
                        		['action' => 'view', $person->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?= $this->Html->link(
                        		'<i class="fa-solid fa-pen"></i> '.__('Edit'),
                        		['action' => 'edit', $person->id],
                        		['escape' => false, 'class' => 'btn btn-primary btn-sm']);
                        ?>
                        <?= $this->Form->postLink(
                        		'<i class="fa-solid fa-trash"></i> '.__('Delete'),
                        		['action' => 'delete', $person->id],
                        		['escape' => false, 'class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $person->id)]);
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
