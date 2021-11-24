<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste fpdf</title>
</head>
<body> 
    <?php 
    
    $sql = "SELECT * FROM fpdf";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
    ?>
    <a href="gerarpdf.php?id=<?php echo $row['id'];?>"><button>Gerar PDF</button></a>
    <?php }; ?>
</body>
</html>