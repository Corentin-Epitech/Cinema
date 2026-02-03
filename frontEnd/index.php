<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form id="form" action="/backEnd/api.php" method="POST">
            <input id="input-id" type="number" name="id" style="display: none;">
            <input id="input-title" type="text" name="title">
            <input id="input-desc" type="text" name="description">
            <input id="input-dur" type="number" pattern="[0-9]*" name="duration">
            <input id="input-year" type="number" pattern="[0-9]*" name="release_year">
            <input id="input-genre" type="text" name="genre">
            <input id="input-dir" type="text" name="director">
            <input id="input-create" type="date" name="created_at">
            <input id="input-update" type="date" name="updated_at">
            <button id="submit" type="submit">Add</button>
        </form>

        <?php
        include("../backEnd/main.php");

        $sql = "SELECT *  FROM movies";

        $result = $conn->query($sql);

        if ($result->rowCount() > 0) {
            echo "<table><tr><th>ID</th><th>title</th><th>description</th><th>duration</th><th>release_year</th><th>genre</th><th>director</th><th>created_at</th><th>updated_at</th></tr>";
            // Output data of each row
            while ($row = $result->fetch()) {
                echo "<tr id='" . $row['id'] . "'>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['duration'] . "</td>";
                echo "<td>" . $row['release_year'] . "</td>";
                echo "<td>" . $row['genre'] . "</td>";
                echo "<td>" . $row['director'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td>" . $row['updated_at'] . "</td>";
                echo "<td> <button onclick='supprimer(this)'>Supprimer</button> </td>";
                echo "<td> <button onclick='modifier(this)'>Modifier</button> </td>";
                echo "</tr>";

            }
            echo "</table>";
            unset($result);
        } else {
            echo "No records found.";
        }
        ;
        ?>

    </div>

</body>
<script src="../frontEnd/script.js"></script>

</html>