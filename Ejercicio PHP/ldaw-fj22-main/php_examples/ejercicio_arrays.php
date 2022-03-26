<?php

$students = [
    "A00123456" => "Pedro López, IMT",
    "A00765438" => "Agustín Melgar, ISD",
    "A00396276" => "Ignacio Allende, ISC",
];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <ul class="list-group">

        <?php 
        foreach($students as $id => $student){ 
            
            $data = explode(",", $student);
        ?>

            <li class="list-group-item">
                <strong><?php echo($id); ?></strong> - <?php echo("$data[1] $data[0]"); ?>
            </li>

        <?php } ?>
    
    
    </ul>
    
</body>
</html>