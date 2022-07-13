<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 * @var \Cake\Collection\CollectionInterface|string[] $manifestations
 */
?>


<script>

$(document).ready(function() {

	//form check
    $("form").submit(function() {

		var codes = ["aa","ab","ae","af","ak","am","an","ar","as","av","ay","az","ba","be","bg","bh","bi","bm","bn","bo","br","bs","ca","ce","ch","co","cr","cs","cu","cv","cy","da","de","dv","dz","ee","el","en","eo","es","et","eu","fa","ff","fi","fj","fo","fr","fy","ga","gd","gl","gn","gu","gv","ha","he","hi","ho","hr","ht","hu","hy","hz","ia","id","ie","ig","ii","ik","io","is","it","iu","ja","jv","ka","kg","ki","kj","kk","kl","km","kn","ko","kr","ks","ku","kv","kw","ky","la","lb","lg","li","ln","lo","lt","lu","lv","mg","mh","mi","mk","ml","mn","mr","ms","mt","my","na","nb","nd","ne","ng","nl","nn","no","nr","nv","ny","oc","oj","om","or","os","pa","pi","pl","ps","pt","qu","rm","rn","ro","ru","rw","sa","sc","sd","se","sg","si","sk","sl","sm","sn","so","sq","sr","ss","st","su","sv","sw","ta","te","tg","th","ti","tk","tl","tn","to","tr","ts","tt","tw","ty","ug","uk","ur","uz","ve","vi","vo","wa","wo","xh","yi","yo","za","zh","zu"];

		if(jQuery.inArray($("#abbreviation").val(), codes) !== -1) {
		} else {
			if (confirm($("#abbreviation").val()+" is not a language code according to ISO 639-1. Are you sure that you want to save this data?")) {
			} else {
				return false;
			}
		}

	});

});

</script>


<div class="row">
    <div class="column-responsive column-80">
        <div class="languages form content">
        
            <h3><?= __('Languages') ?></h3>
    
  			<p>
  			Using a two-letter abbreviation according to the ISO 639-1 standard is recommended so that a languag can be uniquely identified. See <a href="https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes">https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes</a> for an overview.
  			</p>

        
            <?= $this->Form->create($language) ?>
            
            <?php
			$myTemplates = [
				'inputContainer' => '<div class="col">{{content}}</div>',
			];
			$this->Form->setTemplates($myTemplates);
			?>
            
            <div class="row form-row">
			<?php
				echo $this->Form->control(
					'name',
					array(
						'placeholder' => __('Name'),
						'label' => ['text' => __('Name'), 'class' => 'required'],
						'class' => 'form-control'
					)
				);
				echo $this->Form->control(
					'abbreviation',
					array(
						'placeholder' => __('Abbreviation'),
						'label' => ['text' => __('Abbreviation'), 'class' => 'required'],
						'class' => 'form-control'
					)
				);
			?>
			</div>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
