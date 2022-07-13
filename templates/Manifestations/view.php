<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manifestation $manifestation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Manifestation'), ['action' => 'edit', $manifestation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Manifestation'), ['action' => 'delete', $manifestation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manifestation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Manifestations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Manifestation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="manifestations view content">
            <h3><?= h($manifestation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Letter') ?></th>
                    <td><?= $manifestation->has('letter') ? $this->Html->link($manifestation->letter->id, ['controller' => 'Letters', 'action' => 'view', $manifestation->letter->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Writingstyle') ?></th>
                    <td><?= h($manifestation->writingstyle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Writingstyle Other') ?></th>
                    <td><?= h($manifestation->writingstyle_other) ?></td>
                </tr>
                <tr>
                    <th><?= __('Archive') ?></th>
                    <td><?= $manifestation->has('archive') ? $this->Html->link($manifestation->archive->name, ['controller' => 'Archives', 'action' => 'view', $manifestation->archive->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Archive Info') ?></th>
                    <td><?= h($manifestation->archive_info) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($manifestation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pages') ?></th>
                    <td><?= $manifestation->pages === null ? '' : $this->Number->format($manifestation->pages) ?></td>
                </tr>
                <tr>
                    <th><?= __('Signed') ?></th>
                    <td><?= $manifestation->signed === null ? '' : $this->Number->format($manifestation->signed) ?></td>
                </tr>
                <tr>
                    <th><?= __('IncludingEnvelope') ?></th>
                    <td><?= $manifestation->includingEnvelope === null ? '' : $this->Number->format($manifestation->includingEnvelope) ?></td>
                </tr>
                <tr>
                    <th><?= __('Draft') ?></th>
                    <td><?= $this->Number->format($manifestation->draft) ?></td>
                </tr>
                <tr>
                    <th><?= __('IsSent') ?></th>
                    <td><?= $this->Number->format($manifestation->isSent) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($manifestation->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Languages') ?></h4>
                <?php if (!empty($manifestation->languages)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($manifestation->languages as $languages) : ?>
                        <tr>
                            <td><?= h($languages->id) ?></td>
                            <td><?= h($languages->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Languages', 'action' => 'view', $languages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Languages', 'action' => 'edit', $languages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Languages', 'action' => 'delete', $languages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $languages->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Annotations') ?></h4>
                <?php if (!empty($manifestation->annotations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Manifestation Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Details') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($manifestation->annotations as $annotations) : ?>
                        <tr>
                            <td><?= h($annotations->id) ?></td>
                            <td><?= h($annotations->manifestation_id) ?></td>
                            <td><?= h($annotations->person_id) ?></td>
                            <td><?= h($annotations->details) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Annotations', 'action' => 'view', $annotations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Annotations', 'action' => 'edit', $annotations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Annotations', 'action' => 'delete', $annotations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $annotations->id)]) ?>
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
