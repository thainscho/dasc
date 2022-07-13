<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Letter $letter
 */
?>


<h3>
<?php echo $letter->detailed_info; ?><br />
</h3>


<dl class="row">
	<dt class="col-sm-2">Document format</dt>
	<dd class="col-sm-10">
	<p>
	<?php
	echo $letter->letterformat->name;
	?>
	</p>
	</dd>
	
	<dt class="col-sm-2">Date</dt>
	<dd class="col-sm-10">
	<p>
	<?php
	
	if (!is_null($letter->letterdate_day) || !is_null($letter->letterdate_month) || !is_null($letter->letterdate_year)) {
		echo $letter->letterdate_day.'.'.$letter->letterdate_month.'.'.$letter->letterdate_year;
	}
	if (!is_null($letter->letterdatecorrected_day ) || !is_null($letter->letterdatecorrected_month) || !is_null($letter->letterdatecorrected_year)) {
		echo ' [correct: '.$letter->letterdatecorrected_day.'.'.$letter->letterdatecorrected_month.'.'.$letter->letterdatecorrected_year.']';
	}
	
	if ((!is_null($letter->datemin_day) || !is_null($letter->datemin_month) || !is_null($letter->datemin_year)) &&
		(!is_null($letter->datemax_day) || !is_null($letter->datemax_month) || !is_null($letter->datemax_year))) {
		echo 'Between '.$letter->datemin_day.'.'.$letter->datemin_month.'.'.$letter->datemin_year;
		echo ' and '.$letter->datemax_day.'.'.$letter->datemax_month.'.'.$letter->datemax_year;
	}
	
	?>
	</p>
	</dd>

	<dt class="col-sm-2">Sender</dt>
	<dd class="col-sm-10">
	<?php
	foreach($letter->senders as $sender) {
		echo '<p>';
		echo $this->Html->link($sender->SenderNameWithDetail, ['controller' => 'senders', 'action' => 'view', $sender->id]);
		echo '</p>';
	}
	?>
	</dd>
	
	<dt class="col-sm-2">Sent from</dt>
	<dd class="col-sm-10">
	<p>
	<?php
		echo $letter->from_address_full;
	?>
	</p>
	</dd>
	
	<dt class="col-sm-2">Receiver</dt>
	<dd class="col-sm-10">
	<?php
	foreach($letter->receivers as $receiver) {
		echo '<p>';
		echo $this->Html->link($receiver->ReceiverNameWithDetail, ['controller' => 'receivers', 'action' => 'view', $sender->id]);
		echo '</p>';
	}
	?>
	</dd>
	
	<dt class="col-sm-2">Sent to</dt>
	<dd class="col-sm-10">
	<p>
	<?php
		echo $letter->to_address_full;
	?>
	</p>
	</dd>
</dl>

<h3><small>Manifestations</small></h3>
<ul class="noBulletsList">
<?php


$counter = 1;
foreach($letter->manifestations as $manifestation) {

	echo "<li class='verticalSpaceLi'>";
	echo '<div class="card">';
	echo '<div class="card-body">';
	echo '<h5 class="card-title">'.$manifestation->archive->name.'</h5>';
	if ($manifestation->archive_info != "") {
		echo '<h6 class="card-subtitle mb-2 text-muted">'.$manifestation->archive_info.'</h6>';
	}

	if ($manifestation->writingstyle == "OTHER") {
		if ($manifestation->writingstyle_other != "") {
			echo $manifestation->writingstyle_other;
		} else {
			echo "Unknown format";
		}
	} else {
		echo $this->Dasc->getWritingStyle($manifestation->writingstyle);	
	}
	
	if (!is_null($manifestation->pages) && $manifestation->pages != "") {
		echo ", ".$manifestation->pages." page";
		if ($manifestation->pages != 1) {
			echo "s";
		}
	}
	echo ".<br />";

	$output = false;
	if ($manifestation->draft == 1) {
		echo __("Draft");
		$output = true;
	}
	if ($manifestation->isSent == 1) {
		if ($output) {
			echo "; sent from sender to receiver";
		} else {
			echo "Sent from sender to receiver";
			$output = true;
		}
	}
	if ($manifestation->includingEnvelope == 1) {
		if ($output) {
			echo "; including envelope";
		} else {
			echo "Including envelope";
			$output = true;
		}
	}
	if ($output) {
		echo ".<br />";
	}
	
	
	echo "Language";
	if (!isset($manifestation->languages) || count($manifestation->languages) == 0) {
		echo ": ".__("No information available");
	} else {
		if (count($manifestation->languages) > 1) {
			echo "s: ";
		} else {
			echo ": ";
		}
		$langcounter = 1;
		foreach($manifestation->languages as $language) {
			echo $language->name;
			if ($langcounter < count($manifestation->languages)) {
				echo ", ";
			}
			$langcounter++;
		}
	}
	echo ".<br />";
	
	echo '</div>';
	
	echo '<ul class="list-group list-group-flush">
	<li class="list-group-item">';
	
	echo "Signed by: ";
	if (isset($signatures[$manifestation->id]) && count($signatures[$manifestation->id]) > 0) {
		$tmps = array();
		foreach($signatures[$manifestation->id]['annotation'] as $signature) {
			foreach($letter->senders as $sender) {
				if ($sender->id == $signature->sender_id) {
					$tmps[] = array(
						'name' => $sender->SenderName,
						'type' => 'Senders',
						'id' => $sender->id
					);
				}
			}
		}
		for($i = 0; $i < count($tmps); $i++) {
			echo $this->Html->link(
				$tmps[$i]['name'],
				['controller' => $tmps[$i]['type'], 'action' => 'view', $tmps[$i]['id']]
			);
			if ($i < count($tmps)-1) {
				echo ", ";
			}
		}
	} else {
		echo "–"; // (not available / not signed)'	;
	}

	echo '</li>
	<li class="list-group-item">';
	
	echo "Annotated by: ";
	if (isset($annotations[$manifestation->id]) && count($annotations[$manifestation->id]) > 0) {
		$tmps = array();
		foreach($annotations[$manifestation->id]['annotation'] as $annotation) {
			foreach($letter->senders as $sender) {
				if ($sender->id == $annotation->sender_id) {
					$tmps[] = array(
						'name' => $sender->SenderName,
						'type' => 'Senders',
						'id' => $sender->id
					);
				}
			}
			foreach($letter->receivers as $receiver) {
				if ($receiver->id == $annotation->receiver_id) {
					$tmps[] = array(
						'name' => $receiver->ReceiverName,
						'type' => 'Receivers',
						'id' => $receiver->id
					);
				}
			}
		}
		for($i = 0; $i < count($tmps); $i++) {
			
			echo $this->Html->link(
				$tmps[$i]['name'],
				['controller' => $tmps[$i]['type'], 'action' => 'view', $tmps[$i]['id']]
			);

			if ($i < count($tmps)-1) {
				echo ", ";
			}
		}
	} else {
		echo "–"; // (not available / not signed)'	;
	}
	
	echo '</li>
	<li class="list-group-item">';
	
	echo '<button type="button" class="btn btn-primary btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">
	<i class="fa-solid fa-pen"></i> Edit
	</button>';
	
	echo '</li>
	</ul>';

	echo '</div>';
	echo "</li>";
	
	$counter++;
	
}

?>
</ul>

