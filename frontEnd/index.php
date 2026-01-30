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
            <input type="text" name="title">
            <input type="text" name="description">
            <input type="number" pattern="[0-9]*" name="duration">
            <input type="number" pattern="[0-9]*" name="release_year">
            <input type="text" name="genre">
            <input type="text" name="director">
            <input type="date" name="created_at">
            <input type="date" name="updated_at">
            <button id="submit" type="submit">Add</button>
        </form>
        <?php
        
        ?>

    </div>

</body>
 <script src="../backEnd/script.js"></script>
</html>

