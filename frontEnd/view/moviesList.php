<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Liste des Tâches</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>description</th>
            <th>duration</th>
            <th>release_year</th>
            <th>genre</th>
            <th>director</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>

        <?php
        foreach ($movies as $movie): ?>
            <?php echo "<tr id='" . $movie['id'] . "'>"; ?>
            <?php echo "<td>" . htmlspecialchars($movie['id']) . "</td>"; ?>
            <?php echo "<td>" . $movie['title'] . "</td>"; ?>
            <?php echo "<td>" . $movie['description'] . "</td>"; ?>
            <?php echo "<td>" . $movie['duration'] . "</td>"; ?>
            <?php echo "<td>" . $movie['release_year'] . "</td>"; ?>
            <?php echo "<td>" . $movie['genre'] . "</td>"; ?>
            <?php echo "<td>" . $movie['director'] . "</td>"; ?>
            <?php echo "<td>" . $movie['created_at'] . "</td>"; ?>
            <?php echo "<td>" . $movie['updated_at'] . "</td>"; ?>
            <?php echo "<td> <a href='/backEnd/delete?id=" ?>    <?php echo $movie['id']; ?>    <?php echo "'>Supprimer</a> </td>"; ?>
            <?php echo "<td> <button onclick='modifierMovie(this)'>Modifier </button></td>"; ?>
            <?php echo "</tr>"; ?>
        <?php endforeach; ?>
    </table>
    <form id="form" action="/backEnd/add" method="POST">
        <input type="text" name="title">
        <input type="text" name="description">
        <input type="number" pattern="[0-9]*" name="duration">
        <input type="number" pattern="[0-9]*" name="release_year">
        <input type="text" name="genre">
        <input type="text" name="director">
        <input type="date" name="created_at">
        <input type="date" name="updated_at">
        <button type="submit">Add</button>
    </form>

    <form id="form" action="/backEnd/update" method="POST">
        <input id="input-id" type="number" name="id" style="display: none;">
        <input id="input-title" type="text" name="title">
        <input id="input-desc" type="text" name="description">
        <input id="input-dur" type="number" pattern="[0-9]*" name="duration">
        <input id="input-year" type="number" pattern="[0-9]*" name="release_year">
        <input id="input-genre" type="text" name="genre">
        <input id="input-dir" type="text" name="director">
        <input id="input-create" type="date" name="created_at">
        <input id="input-update" type="date" name="updated_at">
        <button id="submit" type="submit">Update</button>
    </form>
</body>
<script src="/frontEnd/script.js"></script>

</html>