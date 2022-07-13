<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses view content">
            <h3><?= h($address->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Addressline') ?></th>
                    <td><?= h($address->addressline) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street') ?></th>
                    <td><?= h($address->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('Streetnumber') ?></th>
                    <td><?= h($address->streetnumber) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postalcode') ?></th>
                    <td><?= h($address->postalcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($address->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nationalstate') ?></th>
                    <td><?= $address->has('nationalstate') ? $this->Html->link($address->nationalstate->name, ['controller' => 'Nationalstates', 'action' => 'view', $address->nationalstate->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($address->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($address->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Archives') ?></h4>
                <?php if (!empty($address->archives)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Website') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->archives as $archives) : ?>
                        <tr>
                            <td><?= h($archives->id) ?></td>
                            <td><?= h($archives->name) ?></td>
                            <td><?= h($archives->address_id) ?></td>
                            <td><?= h($archives->website) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Archives', 'action' => 'view', $archives->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Archives', 'action' => 'edit', $archives->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Archives', 'action' => 'delete', $archives->id], ['confirm' => __('Are you sure you want to delete # {0}?', $archives->id)]) ?>
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
