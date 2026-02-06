<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Name>Document</Name>
</head>

<body>
    <h1>Liste des Tâches</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Capacity</th>
            <th>Type</th>
            <th>Active</th>
            <th>updated_at</th>
        </tr>

        <?php
        foreach ($rooms as $room): ?>
            <?php echo "<tr id='" . $room['id'] . "'>"; ?>
            <?php echo "<td>" . htmlspecialchars($room['id']) . "</td>"; ?>
            <?php echo "<td>" . $room['Name'] . "</td>"; ?>
            <?php echo "<td>" . $room['Capacity'] . "</td>"; ?>
            <?php echo "<td>" . $room['Type'] . "</td>"; ?>
            <?php echo "<td>" . $room['Active'] . "</td>"; ?>
            <?php echo "<td>" . $room['updated_at'] . "</td>"; ?>
            <?php echo "<td> <a href='/backEnd/delete?id=" ?>    <?php echo $room['id']; ?>    <?php echo "'>Supprimer</a> </td>"; ?>
            <?php echo "<td> <button onclick='modifierRoom(this)'>Modifier </button></td>"; ?>
            <?php echo "</tr>"; ?>
        <?php endforeach; ?>
    </table>
    <form id="form" action="/backEnd/add" method="POST">
        <input type="text" name="Name">
        <input type="text" name="Capacity">
        <input type="number" pattern="[0-9]*" name="Type">
        <input type="number" pattern="[0-9]*" name="Active">
        <input type="date" name="updated_at">
        <button type="submit">Add</button>
    </form>

    <form id="form" action="/backEnd/update" method="POST">
        <input id="input-id" type="number" name="id" style="display: none;">
        <input id="input-Name" type="text" name="Name">
        <input id="input-capacity" type="text" name="Capacity">
        <input id="input-type" type="number" pattern="[0-9]*" name="Type">
        <input id="input-active" type="number" pattern="[0-9]*" name="Active">
        <input id="input-update" type="date" name="updated_at">
        <button id="submit" type="submit">Update</button>
    </form>
</body>
<script src="/frontEnd/script.js"></script>

</html>