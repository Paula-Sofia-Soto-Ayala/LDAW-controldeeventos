<?php

$students = [
    "A00123456" => [
        "name" => "Pedro",
        "lastname" => "Hernández",
        "career" => "IMT",
        "active" => true,
        "grades" => [60,50,85]
    ],
    "A00765438" => [
        "name" => "Agustín",
        "lastname" => "Melgar",
        "career" => "ISD",
        "active" => false,
        "grades" => [87,94,76,97,92]
    ],
    "A00396276" => [
        "name" => "Josefa",
        "lastname" => "Ortíz",
        "career" => "ISC",
        "active" => true,
        "grades" => []
    ]
];


function average($values){
    return !empty($values) ? array_sum($values)/count($values) : "Sin datos";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body{
            background-color: #71417a;
        }
    </style>

</head>
<body>

    <main class="container">
        
        <ul class="list-group mt-5">

            <?php 
            foreach($students as $id => $student){ 
                
                $name = implode(" ", [$student["name"], $student["lastname"]]);
                $career = $student["career"];
                $avg = average($student["grades"]);
                $gradeClass = ($avg < 70) ? "text-danger" : "";
                $liDisabledClass = !$student["active"] ? "disabled" : "";
            ?>

                <li class="list-group-item <?php echo($liDisabledClass); ?>">
                    <p class="mb-1">
                        <strong>
                            <?php echo("$id - $career $name"); ?>
                        </strong>
                    </p>
                    <p class="my-1">
                        <strong>Promedio: </strong>
                        <span class="<?php echo($gradeClass) ?>"><?php echo($avg); ?></span>
                    </p>
                </li>

            <?php } ?>

            <!-- <li class="list-group-item">
                <p class="mb-1">
                    <strong>A00123456 - IMT Pedro López</strong>
                </p>
                <p class="my-1">
                    <strong>Promedio: </strong>
                    <span class="text-danger">64</span>
                </p>
            </li>
            <li class="list-group-item disabled" aria-disabled="true">
                <p class="mb-1">
                    <strong>A00765438 - ISD Agustín Melgar</strong>
                </p>
                <p class="my-1">
                    <strong>Promedio: </strong>
                    <span>89.2</span>
                </p>
            </li>
            <li class="list-group-item">
                <p class="mb-1">
                    <strong>A00765438 - ISC Josefa Ortíz</strong>
                </p>
                <p class="my-1">
                    <strong>Promedio: </strong>
                    <span>Sin datos</span>
                </p>
            </li> -->
        </ul>
        

    </main>
    
</body>
</html>