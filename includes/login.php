<?php

    if(isset($_POST['login']) && !empty($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) or !empty($password)){

            $email = $getFromU->checkInput($email);
            $password = $getFromU->checkInput($password);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error = "Formato inválido.";
            } else {

                if($getFromU->login($email, $password) === false){

                    $error = "O email ou a senha estão incorretos";
                }
            }

        } else {

            $error = "Por favor, digite seu email e senha!";
        }
    }

?>

<div class="login-div">
<form method="post"> 
	<ul>
		<li>
		  <input type="text" name="email" placeholder="Digite seu email aqui"/>
		</li>
		<li>
		  <input type="password" name="password" placeholder="Digite sua senha"/><input type="submit" name="login" value="Logar"/>
		</li>
		<li>
		  <input type="checkbox" Value="Lembrar-me">Lembrar-me
		</li>
	</ul>
	<?php
         if(isset($error)){
            echo '<li class="error-li">
            <div class="span-fp-error">'.$error.'</div>
           </li>';
         }
    ?>
	 
	
	</form>
</div>