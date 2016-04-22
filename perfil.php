<link rel="stylesheet" type="text/css" href="css/perfil.css">

<?
   



   $rs = $con->query("SELECT * FROM loginsenha"); 
   while($row = $rs->fetchAll(PDO::FETCH_OBJ)){
    echo $row->idpessoa  <br />;
    echo $row->nome  <br />;
    echo $row->email  <br />; }


?>
<body>
<div id ="pefil">

<img src="" width="600" height="250" alt="Imagem de perfil"
title="Imagem de perfil"/>

<div id="dados">
   <p><? echo $nome ?></p>
   <p>17</p>
   <p>email     <a href="alterarsenha.php">Alterar Email</a> </p>
   <p>Marques</p>
</div>

</div>

</body