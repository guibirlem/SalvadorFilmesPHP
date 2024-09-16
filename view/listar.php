<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Diretor</th>
                <th>Ano</th>
                <th>Sinopse</th>
            </tr>
        </thead>
        <tbody>
            <?php
            function criaConexaoComBanco() {
                $host = "mysql";
                $user = "root";
                $pass = "1q2w3e4r5t";
                $db = "db";
                $port = "3306";
            
                $mysqli = new mysqli($host, $user, $pass, $db, $port);
            
                if ($mysqli->connect_errno) {
                    echo "Falha: " . $mysqli->connect_error;
                    exit();
                }
                return $mysqli;
            }

            $conn = criaConexaoComBanco();

            $result = $conn->query("SELECT * FROM filmes");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['diretor']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ano']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['sinopse']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum filme encontrado.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
