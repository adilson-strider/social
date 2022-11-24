<?php
 
if(isset($_POST['signup'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$screenName = $_POST['screenName'];
	
	$error = '';

	if(empty($screenName) or empty($password) or empty($email)){
		$error = 'Todos os campos precisam ser preenchidos.';
	}else {
		$email = $getFromU->checkInput($email);
		$password = $getFromU->checkInput($password);
		$screenName = $getFromU->checkInput($screenName);
		

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = 'Formato de email inválido';
		}else if(strlen($screenName) > 20){
			$error = 'Nome deve possuir de 6-20 caracteres.';
		}else if(strlen($password) < 5){
			$error = 'Senha é muito curta.';
		}else {
			if($getFromU->checkEmail($email) === true){
				$error = 'O email já está sendo utilizado.';
			}else {
				$password = md5($password);
				$user_id = $getFromU->create('users', array('email' => $email, 'password' => $password , 'screenName' => $screenName, 'profileImage' => 'assets/images/defaultProfileImage.png', 'profileCover' => 'assets/images/defaultCoverImage.png'));
				$_SESSION['user_id'] = $user_id;
				header('Location: includes/registrar.php?step=1');
			}
		}
	}
}
?>
<form method="post">
<div class="signup-div">
	<h3>Registrar </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Nome completo"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Senha"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Registrar">
		</li>
		<?php
      if(isset($error)){
        echo '<li class="error-li">
        <div class="span-fp-error">'.$error.'</div>
        </li>';
      }
    ?>
	</ul>

</div>
</form>
