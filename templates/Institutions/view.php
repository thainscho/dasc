<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institution $institution
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Institution'), ['action' => 'edit', $institution->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Institution'), ['action' => 'delete', $institution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institution->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Institutions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Institution'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="institutions view content">
            <h3><?= h($institution->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($institution->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dbpedia Url') ?></th>
                    <td><?= h($institution->dbpedia_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($institution->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($institution->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Receivers') ?></h4>
                <?php if (!empty($institution->receivers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Letter Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Institution Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($institution->receivers as $receivers) : ?>
                        <tr>
                            <td><?= h($receivers->id) ?></td>
                            <td><?= h($receivers->letter_id) ?></td>
                            <td><?= h($receivers->person_id) ?></td>
                            <td><?= h($receivers->institution_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Receivers', 'action' => 'view', $receivers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Receivers', 'action' => 'edit', $receivers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Receivers', 'action' => 'delete', $receivers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receivers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Senders') ?></h4>
                <?php if (!empty($institution->senders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Letter Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Institution Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($institution->senders as $senders) : ?>
                        <tr>
                            <td><?= h($senders->id) ?></td>
                            <td><?= h($senders->letter_id) ?></td>
                            <td><?= h($senders->person_id) ?></td>
                            <td><?= h($senders->institution_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Senders', 'action' => 'view', $senders->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Senders', 'action' => 'edit', $senders->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Senders', 'action' => 'delete', $senders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $senders->id)]) ?>
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
