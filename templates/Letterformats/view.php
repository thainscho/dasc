<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Letterformat $letterformat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Letterformat'), ['action' => 'edit', $letterformat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Letterformat'), ['action' => 'delete', $letterformat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $letterformat->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Letterformats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Letterformat'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="letterformats view content">
            <h3><?= h($letterformat->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($letterformat->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($letterformat->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($letterformat->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Letters') ?></h4>
                <?php if (!empty($letterformat->letters)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Date Min') ?></th>
                            <th><?= __('Date Max') ?></th>
                            <th><?= __('Letterformat Id') ?></th>
                            <th><?= __('Address From Id') ?></th>
                            <th><?= __('Address From Assumed') ?></th>
                            <th><?= __('Address To Id') ?></th>
                            <th><?= __('Address To Assumed') ?></th>
                            <th><?= __('IsSent') ?></th>
                            <th><?= __('Draft') ?></th>
                            <th><?= __('Note') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($letterformat->letters as $letters) : ?>
                        <tr>
                            <td><?= h($letters->id) ?></td>
                            <td><?= h($letters->date) ?></td>
                            <td><?= h($letters->date_min) ?></td>
                            <td><?= h($letters->date_max) ?></td>
                            <td><?= h($letters->letterformat_id) ?></td>
                            <td><?= h($letters->address_from_id) ?></td>
                            <td><?= h($letters->address_from_assumed) ?></td>
                            <td><?= h($letters->address_to_id) ?></td>
                            <td><?= h($letters->address_to_assumed) ?></td>
                            <td><?= h($letters->isSent) ?></td>
                            <td><?= h($letters->draft) ?></td>
                            <td><?= h($letters->note) ?></td>
                            <td><?= h($letters->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Letters', 'action' => 'view', $letters->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Letters', 'action' => 'edit', $letters->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Letters', 'action' => 'delete', $letters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $letters->id)]) ?>
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
