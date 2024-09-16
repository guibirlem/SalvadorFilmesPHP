<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <h1>Cadastro de Filmes</h1>
    <form action="http://localhost:8081/aula-4/controller/FilmeController.php?metodo=cadastrarFilmes" method="post">
    
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" id="titulo">      
    
    
    <label for="diretor">Diretor</label>
    <input type="text" name="diretor" id="diretor">  

    <label for="ano">ano:</label>
    <input type="text" name="ano" id="ano">  

    <label for="sinopse">Sinopse :</label>
    <input type="text" name="sinopse" id="sinopse">  

    <button type="submit">Enviar</button>

    </form>




</body>
</html>