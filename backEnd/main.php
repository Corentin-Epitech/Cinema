<?php
$servername = "localhost";
$username = "Coco";
$password = "Coconuts77";
$dbname = "Cinema";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("Could not connect. " . $e->getMessage());
};


$prp =  $conn->prepare("INSERT INTO movies VALUES (:id,:title,:description,:duration,:release_year,:genre,:director,:created_at,:updated_at)");
$prp->bindParam(":id",$_POST["id"]);
$prp->bindParam(":title",$_POST["title"]);
$prp->bindParam(":description",$_POST["description"]);
$prp->bindParam(":duration",$_POST["duration"]);
$prp->bindParam(":release_year",$_POST["release"]);
$prp->bindParam(":genre",$_POST["genre"]);
$prp->bindParam(":director",$_POST["director"]);
$prp->bindParam(":created_at",$_POST["created"]);
$prp->bindParam(":updated_at",$_POST["updated"]);

$prp->execute();


$sql = "SELECT *  FROM movies";

$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    echo "<table><tr><th>ID</th><th>title</th><th>description</th><th>duration</th><th>release_year</th><th>genre</th><th>director</th><th>created_at</th><th>updated_at</th></tr>";
    // Output data of each row
    while($row = $result->fetch()) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['title'] . "</td>";
      echo "<td>" . $row['description'] . "</td>";
      echo "<td>" . $row['duration'] . "</td>";
      echo "<td>" . $row['release_year'] . "</td>";
      echo "<td>" . $row['genre'] . "</td>";
      echo "<td>" . $row['director'] . "</td>";
      echo "<td>" . $row['created_at'] . "</td>";
      echo "<td>" . $row['updated_at'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    unset($result);
}
  else {
    echo "No records found.";
  }
?>