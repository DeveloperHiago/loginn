<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

<html>

<head>
<title>Sistema de Cadastro</title>
</head>

<body>
     <form name="signup" method="post" action ="cadastrandodados.php">
												     <form class="navbar-form pull-left">
												     Nome: <input type="text" class="span2"><br \>

												     <form class="navbar-form pull-left">
												     Login: <input type="text" class="span2"><br \>

												     <form class="navbar-form pull-left">
												     Email: <input type="text" class="span2"><br \>


												     <form class="navbar-form pull-left">
												      Senha: <input type="password" class="span2"><br \>


<form class="pure-form pure-form-stacked">
<fieldset>
                     <label for="state">State</label>
        <select id="state">
            <option>AL</option>
            <option>CA</option>
            <option>IL</option>
        </select>
  </fieldset>
</form>



                                                     <td class="style_texto">Imagem :</td>
													 <td><label for="imagem"></label>
													 <input type="file" name="arquivo" id="arquivo" /></td>
																	</tr><br>



  												    <button type="submit" class="btn">Enviar</button>
    </form>

</body>

</html>