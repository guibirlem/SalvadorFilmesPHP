<?php

class Filme {
    public ?string $titulo;
    public ?string $diretor;
    public ?string $sinopse;
    public ?int $ano;

    public function __construct(?string $titulo, ?string $sinopse , ?string $diretor , ?int $ano ,) {
        $this->titulo = $titulo;
        $this->sinopse = $sinopse;
        $this->diretor = $diretor;
        $this->ano = $ano;
    }

    public function criaConexaoComBanco() {
    
        $host = "mysql";
        $user = "root";
        $pass = "1q2w3e4r5t";
        $db = "db";
        $port = "3306";
    
        $mysqli = new mysqli($host,$user,$pass,$db,$port);
    
        if ($mysqli->connect_errno) {
            echo "Falha: " . $mysqli -> connect_error;
            exit();
      }
      return $mysqli;
    }

    public function salvar()
{
    $sql = "INSERT INTO filmes (titulo, sinopse, diretor, ano) 
            VALUES ('{$this->titulo}', '{$this->sinopse}', '{$this->diretor}', {$this->ano})";

    $conn = $this->criaConexaoComBanco();

    if ($conn->query($sql) === TRUE) {
        echo "Registro salvo com sucesso";
    } else {
        echo "Erro ao salvar no banco de dados: " . $conn->error;
    }
}


    public function listar()
    {
        $conn = $this->criaConexaoComBanco();

        $result = mysqli_query($conn, "select * from filmes");

        $arrayFilmes = [];
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            $filme = [];
            $filme["titulo"] = $row["titulo"];
            $filme["sinopse"] = $row["sinopse"];
            $filme["diretor"] = $row["diretor"];
            $filme["ano"] = $row["ano"];
            $arrayFilmes[] = $filme;
        }

        return $arrayFilmes;
    }


}