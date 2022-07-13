<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>

<h3>
<?php echo $person->fullName; ?><br />
<small>
	<?php echo ucfirst($person->born); ?>
	<?php
	$died = $person->died;
	if ($died != "") {
		echo ", ".$died;
	}
	?>
</small>
</h3>

<dl class="row">
	<dt class="col-sm-2"><?php echo __("First name"); ?></dt>
	<dd class="col-sm-10">
	<?php
	if ($person->firstname != "" && !is_null($person->firstname)) {
		echo '<p>';
		echo $person->firstname;
		echo '</p>';
	} else {
		echo '<p class="text-muted fst-italic">';
		echo __("Unknown");
		echo '</p>';
	}
	?>
	</dd>
	
	<dt class="col-sm-2"><?php echo __("Last name"); ?></dt>
	<dd class="col-sm-10">
	<?php
	if ($person->lastname != "" && !is_null($person->lastname)) {
		echo '<p>';
		echo $person->lastname;
		echo '</p>';
	} else {
		echo '<p class="text-muted fst-italic">';
		echo __("Unknown");
		echo '</p>';
	}
	?>
	</dd>
	
	<dt class="col-sm-2">DBpedia URL</dt>
	<dd class="col-sm-10">
	<?php
	if ($person->dbpedia_url != "" && !is_null($person->dbpedia_url)) {
		echo '<p>';
		echo $person->dbpedia_url;
		echo '</p>';
	} else {
		echo '<p class="text-muted fst-italic">';
		echo __("Unknown");
		echo '</p>';
	}
	?>
	</dd>
	
	<dt class="col-sm-2">Gender</dt>
	<dd class="col-sm-10">
	<p>
	<?php
	echo $this->Dasc->getGender($person->gender);
	?>
	</p>
	</dd>
	
	<dt class="col-sm-2"><?php echo __("Date of birth") ?></dt>
	<dd class="col-sm-10">
	<?php
	if (is_null($person->dayofbirth) && is_null($person->monthofbirth) && (is_null($person->yearofbirth) || $person->yearofbirth == "0000")) {
		echo '<p class="text-muted fst-italic">';
		echo __("Unknown");
		echo '</p>';
	} else {
		echo '<p>';
		echo $person->dateOfBirth;
		echo '</p>';
	}
	?>
	</dd>
</dl>


<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="persons view content">
            <h3><?= h($person->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dbpedia Url') ?></th>
                    <td><?= h($person->dbpedia_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Firstname') ?></th>
                    <td><?= h($person->firstname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($person->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($person->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Yearofbirth') ?></th>
                    <td><?= h($person->yearofbirth) ?></td>
                </tr>
                <tr>
                    <th><?= __('YearofbirthUpper') ?></th>
                    <td><?= h($person->yearofbirthUpper) ?></td>
                </tr>
                <tr>
                    <th><?= __('Yearofdeath') ?></th>
                    <td><?= h($person->yearofdeath) ?></td>
                </tr>
                <tr>
                    <th><?= __('YearofdeathUpper') ?></th>
                    <td><?= h($person->yearofdeathUpper) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dayofbirth') ?></th>
                    <td><?= $person->dayofbirth === null ? '' : $this->Number->format($person->dayofbirth) ?></td>
                </tr>
                <tr>
                    <th><?= __('Monthofbirth') ?></th>
                    <td><?= $person->monthofbirth === null ? '' : $this->Number->format($person->monthofbirth) ?></td>
                </tr>
                <tr>
                    <th><?= __('Monthofdeath') ?></th>
                    <td><?= $person->monthofdeath === null ? '' : $this->Number->format($person->monthofdeath) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dayofdeath') ?></th>
                    <td><?= $person->dayofdeath === null ? '' : $this->Number->format($person->dayofdeath) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($person->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Note') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($person->note)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Aliases') ?></h4>
                <?php if (!empty($person->aliases)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Alias') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Letter Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->aliases as $aliases) : ?>
                        <tr>
                            <td><?= h($aliases->id) ?></td>
                            <td><?= h($aliases->alias) ?></td>
                            <td><?= h($aliases->person_id) ?></td>
                            <td><?= h($aliases->letter_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Aliases', 'action' => 'view', $aliases->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Aliases', 'action' => 'edit', $aliases->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Aliases', 'action' => 'delete', $aliases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aliases->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Receivers') ?></h4>
                <?php if (!empty($person->receivers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Letter Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Institution Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->receivers as $receivers) : ?>
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
                <?php if (!empty($person->senders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Letter Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Institution Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->senders as $senders) : ?>
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
