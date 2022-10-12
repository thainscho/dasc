<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'DASC: Digital Archival System for Letters and Correspondence Analysis (Prototype)';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

	<?php echo $this->Html->script('jquery-3.6.0.min.js'); ?>
	<?php echo $this->Html->script('jquery-ui-1.13.1/jquery-ui.min.js'); ?>
	<?php echo $this->Html->script('popper.min.js'); //needs to be loaded before bootstrap ?>
	<?php echo $this->Html->script('bootstrap-5.1.3-dist/bootstrap.min.js'); ?>
   <?php // $this->Html->css(['cake']) ?>
    
    <?php //echo $this->Html->css('milligram.min.css'); ?>
    <?php echo $this->Html->css('normalize.min.css'); ?>
    <?php echo $this->Html->css('cake'); ?>
    <?php //echo $this->Html->css('bootstrap-5.1.3-dist/bootstrap.dasc.css'); ?>
    <?php echo $this->Html->css('bootstrap-5.1.3-dist/bootstrap.min.css'); ?>
    
    <?php echo $this->Html->css('jquery-ui.min.css'); ?>
    <?php echo $this->Html->css('dasc'); ?>
    
    
    <?php echo $this->Html->css('fontawesome-free-6.1.1-web/css/all.min.css'); ?>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
</script>
  
</head>
<body>

	<div class="bg-light">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?= $this->Url->build('/') ?>">DASC</a>
					<button class="navbar-toggler" type="button"
						data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false"
						aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<?php 
							
							//TODO: css klasse "active" ergänzen, wenn die seite gerdae active ist

							?>
							<li class="nav-item"><?php echo $this->Html->link(__('About'), ['controller' => 'pages', 'action' => 'about'], ['class' => 'nav-link']) ?></li>
							<li class="nav-item"><?php echo $this->Html->link(__('Search'), ['controller' => 'letters', 'action' => 'search'], ['class' => 'nav-link']) ?></li>
							<li class="nav-item"><a class="nav-link" href="#">Statistics</a></li>
							<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
								href="#" id="navbarDropdown" role="button"
								data-bs-toggle="dropdown" aria-expanded="false"> Administration </a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><?php echo $this->Html->link(__('Persons'), ['controller' => 'persons', 'action' => 'index'], ['class' => 'dropdown-item']) ?></li>
									<li><?php echo $this->Html->link(__('Institutions'), ['controller' => 'institutions', 'action' => 'index'], ['class' => 'dropdown-item']) ?></li>
									<li><?php echo $this->Html->link(__('Pieces of correspondence'), ['controller' => 'letters', 'action' => 'index'], ['class' => 'dropdown-item']) ?></li>
									<li><hr class="dropdown-divider"></li>
									<li><?php echo $this->Html->link(__('System Administration'), ['controller' => 'pages', 'action' => 'adminpages'], ['class' => 'dropdown-item']) ?></li>
								</ul></li>
						</ul>
	<!-- 					<form class="d-flex"> -->
	<!-- 						<input class="form-control me-2" type="search" -->
	<!-- 							placeholder="Search" aria-label="Search"> -->
	<!-- 						<button class="btn btn-outline-success" type="submit">Search</button> -->
	<!-- 					</form> -->
					</div>
				</div>
			</nav>
		</div>
	</div>

	<div class="container">
	    <main class="main">
	        <div class="container">
	            <?= $this->Flash->render() ?>
	            <?= $this->fetch('content') ?>
	        </div>
	    </main>
    <footer style="margin-bottom:40px;">
    </footer>
	</div>
</body>
</html>
