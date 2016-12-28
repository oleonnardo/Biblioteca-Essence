# Biblioteca Essence
<small>Web site simulando o controle e cadastro de empréstimos/reservas de livros aos clientes. Desenvolvido com a linguagem PHP e com a utilização do framework Laravel em sua versão 5.3.</small>
<br><br><br>
<img src="https://s5.postimg.org/z8ppi9v9z/pag_inicial.png" width="800">
<br><br><br>

<h3>Introdução</h3>
<p>Essence é uma web site para biblioteca simples, mas possui uma facilidade enorme para se localizar registros. A aplicação permite o cadastro de clientes, livros, renovações e reservas. Além do cálculo da multa de 0.50 centavos ao dia quando o cliente ultrapassar o prazo de 14 dias, para a entrega do livro.</p>
<br><br>
<img src="https://s5.postimg.org/m3a7c61ef/pag_confirmacao_do_emprestimo.png" width="800">
<br>
<hr>
<h4>Cadastro de Clientes</h4>
<p>Informar dados básicos como nome, endereço, telefone, email, etc. No momento do cadastro, automaticamente o sistema já reconhece o cliente como <b>ativo</b>. Há possibilidade de realizar alterações em seus dados e o cliente sempre pode consultar suas informações através de seu código único, gerado automaticamente no momento do cadastro.</p>
<img src="https://s5.postimg.org/xecv0j89j/pag_cadastro_cliente.png" width="800">
<br><small>Página de cadastro</small><br><br>
<img src="https://s5.postimg.org/4sjsk59qv/pag_listagem_de_clientes.png" width="800">
<br><small>Página de listagem de clientes</small><br><br>

<hr>
<h4>Cadastro dos Livros</h4>
<p>Nessa seção da página, o administrador deve informar dados importantes do livro a ser cadastrado como titulo, autor(es), gênero,  descrição/resumo/sipnose, localização do livro na biblioteca, além de de realizar o upload da capa do livro. Nesse cadastro, também é gerado automaticamente um código, para ser localizado com facilidade no momento do empréstimo/reserva ou em alteração de dados.</p>
<img src="https://s5.postimg.org/ucm2qkv4n/pag_visualizacao_de_livros.png" width="800">
<br><small>Listagem dos livros</small><br><br>

<hr>
<h4>Empréstimo dos Livros</h4>
<p>O prazo máximo para o empréstimo é de 14 dias, o cliente pode renovar o empréstimo até duas vezes. Caso o livro esteja em atraso, não será possível realizar a renovação, automaticamente a multa é gerada.O cálculo do valor da multa é 5A centavos é multiplicado por dias em atraso.</p>
<br><img src="https://s5.postimg.org/m3a7c61ef/pag_confirmacao_do_emprestimo.png" width="800"><br><br>

<hr>
<p><b>Leonardo Araujo<br> Ciência da Computação</b></p>
