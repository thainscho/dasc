<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Language'), ['action' => 'edit', $language->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Language'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Languages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Language'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="languages view content">
            <h3><?= h($language->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($language->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Abbreviation') ?></th>
                    <td><?= h($language->abbreviation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($language->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Manifestations') ?></h4>
                <?php if (!empty($language->manifestations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Letter Id') ?></th>
                            <th><?= __('Pages') ?></th>
                            <th><?= __('Signed') ?></th>
                            <th><?= __('IncludingEnvelope') ?></th>
                            <th><?= __('Draft') ?></th>
                            <th><?= __('IsSent') ?></th>
                            <th><?= __('Writingstyle') ?></th>
                            <th><?= __('Writingstyle Other') ?></th>
                            <th><?= __('Archive Id') ?></th>
                            <th><?= __('Archive Info') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($language->manifestations as $manifestations) : ?>
                        <tr>
                            <td><?= h($manifestations->id) ?></td>
                            <td><?= h($manifestations->letter_id) ?></td>
                            <td><?= h($manifestations->pages) ?></td>
                            <td><?= h($manifestations->signed) ?></td>
                            <td><?= h($manifestations->includingEnvelope) ?></td>
                            <td><?= h($manifestations->draft) ?></td>
                            <td><?= h($manifestations->isSent) ?></td>
                            <td><?= h($manifestations->writingstyle) ?></td>
                            <td><?= h($manifestations->writingstyle_other) ?></td>
                            <td><?= h($manifestations->archive_id) ?></td>
                            <td><?= h($manifestations->archive_info) ?></td>
                            <td><?= h($manifestations->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Manifestations', 'action' => 'view', $manifestations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Manifestations', 'action' => 'edit', $manifestations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Manifestations', 'action' => 'delete', $manifestations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manifestations->id)]) ?>
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
