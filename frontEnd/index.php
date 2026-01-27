<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="/backEnd/main.php" method="post">
            <input type="text" pattern="[0-9]*" name="id">
            <input type="text" name="title">
            <input type="text" name="description">
            <input type="text" pattern="[0-9]*" name="duration">
            <input type="text" pattern="[0-9]*" name="release">
            <input type="text" name="genre">
            <input type="text" name="director">
            <input type="date" name="created">
            <input type="date" name="updated">
            <button type="submit">Add</button>
        </form>
    </div>
</body>
</html>