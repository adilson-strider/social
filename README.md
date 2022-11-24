# <h1>Social</h1>

<p>Projeto de redes sociais desenvolvido para a avaliação final do curso de PHP da Faetec. Feita em PDO e MYSQL, e utilizando os conceitos de programação orientada ao objeto, ainda que em fase incipiente, a rede já inclui algumas discretas funcionalidades como:</p>

<ul>
  <li>Sistema de login/logout</li>
  <li>Cadastro de novos usuários</li>
  <li>Alteração de dados do usuário</li>
  <li>Upload de fotos</li>
</ul>  

<h2>SQL da tabela utilizada:</h2>

<pre>
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `screenName` varchar(40) NOT NULL,
  `profileImage` varchar(255) NOT NULL,
  `profileCover` varchar(255) NOT NULL,
  `following` int(11) NOT NULL,
  `followers` int(11) NOT NULL,
  `bio` varchar(140) NOT NULL,
  `country` varchar(255) NOT NULL,
  `website` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
</pre>

<h2>Funcionamento</h2>

<p>Para rodar o projeto, basta baixar a pasta dentro do 'htdocs' do XAMPP, ou clonar com o git.</p>
<p>Imagem utilizada na tela de login: Freepik.com</p>
