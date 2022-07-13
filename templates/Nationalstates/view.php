<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nationalstate $nationalstate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Nationalstate'), ['action' => 'edit', $nationalstate->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Nationalstate'), ['action' => 'delete', $nationalstate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nationalstate->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Nationalstates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Nationalstate'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="nationalstates view content">
            <h3><?= h($nationalstate->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($nationalstate->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Abbreviation') ?></th>
                    <td><?= h($nationalstate->abbreviation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dbpedia Url') ?></th>
                    <td><?= h($nationalstate->dbpedia_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($nationalstate->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Addresses') ?></h4>
                <?php if (!empty($nationalstate->addresses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Dbpedia Url') ?></th>
                            <th><?= __('Addressline') ?></th>
                            <th><?= __('Street') ?></th>
                            <th><?= __('Streetnumber') ?></th>
                            <th><?= __('Postalcode') ?></th>
                            <th><?= __('City') ?></th>
                            <th><?= __('Nationalstate Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($nationalstate->addresses as $addresses) : ?>
                        <tr>
                            <td><?= h($addresses->id) ?></td>
                            <td><?= h($addresses->dbpedia_url) ?></td>
                            <td><?= h($addresses->addressline) ?></td>
                            <td><?= h($addresses->street) ?></td>
                            <td><?= h($addresses->streetnumber) ?></td>
                            <td><?= h($addresses->postalcode) ?></td>
                            <td><?= h($addresses->city) ?></td>
                            <td><?= h($addresses->nationalstate_id) ?></td>
                            <td><?= h($addresses->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
