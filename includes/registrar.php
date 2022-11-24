<?php
if(isset($_GET['step']) === true && empty($_GET['step']) === false){
include '../core/init.php';
 

$user_id = $_SESSION['user_id'];
$user = $getFromU->userData($user_id);
$step = $_GET['step'];

if(isset($_POST['next'])){
  $username = $getFromU->checkInput($_POST['username']);

  if (!empty($username)) {
    if(strlen($username) > 20){
      $error = "Nomes de usuários devem estar entre 6 a 20 caracteres";
    }else if(!preg_match('/^[a-zA-Z0-9]{6,}$/', $username)){
      $error = 'O nome de usuário deve ter mais de 6 caracteres alfanuméricos sem espaços';
    } else if($getFromU->checkUsername($username) === true){
      $error = "Esse nome já existe!";
    }else{
      $getFromU->update('users', $user_id, array('username' => $username));
      header('Location: registrar.php?step=2');
    }
  }else{
    $error = "Por favor, digite seu nome de usuário para escolher";
  }
}
  ?>
  <!doctype html>
  <html>
  	<head>
  		<title>twitter</title>
  		<meta charset="UTF-8" />
   		<link rel="stylesheet" href="../assets/css/style-complete.css"/>
  	</head>
  	<!--Helvetica Neue-->
  <body>
  <div class="wrapper">
  <!-- nav wrapper -->
  <div class="nav-wrapper">

  	<div class="nav-container">
  		<div class="nav-second">
  			<ul>
  				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
  			</ul>
  		</div><!-- nav second ends-->
  	</div><!-- nav container ends -->

  </div><!-- nav wrapper end -->

  <!---Inner wrapper-->
  <div class="inner-wrapper">
  	<!-- main container -->
  	<div class="main-container">
  		<!-- step wrapper-->
    <?php if ($_GET['step'] == '1') {?>
   		<div class="step-wrapper">
  		    <div class="step-container">
  				<form method="post">
  					<h2>Escolha um nome de usuário</h2>
  					<h4>Não se preocupe, você sempre pode alterá-lo mais tarde.</h4>
  					<div>
  						<input type="text" name="username" placeholder="Username"/>
  					</div>
  					<div>
  						<ul>
  						  <li><?php if (isset($error)){echo $error;} ?></li>
  						</ul>
  					</div>
  					<div>
  						<input type="submit" name="next" value="Next"/>
  					</div>
  				 </form>
  			</div>
  		</div>
    <?php } ?>
    <?php if ($_GET['step'] == '2'){?>
  	<div class='lets-wrapper'>
  		<div class='step-letsgo'>
  			<h2>Estamos felizes por você estar aqui, <?php echo $user->screenName; ?> </h2>
  			<p>Estamos trabalhando constantemente em prol da comunicação eficiente e o bem-estar da comunidade.</p>
  			<br/>
  			<p>
              Conte-nos sobre todas as coisas que você ama e nós o ajudaremos a se preparar.
  			</p>
  			<span>
  				<a href='../home.php' class='backButton'>Let's go!</a>
  			</span>
  		</div>
  	</div>
  <?php } ?>

  	</div><!-- main container end -->

  </div><!-- inner wrapper ends-->
  </div><!-- ends wrapper -->

  </body>
  </html>

  <?php
}
?>