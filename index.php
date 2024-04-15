<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$filteredValue = $_GET['filter'];
//var_dump($filteredValue);
foreach ($hotels as $hotel) {
    //var_dump($hotel[$park]);
    switch($filteredValue)
    {
        case 'parking';
            if ($hotel[$filteredValue] == 'parking') {
                $filteredHotels[] = $hotel ;
            }
            
            break;
        case 'distance_to_center';
            if ($hotel[$filteredValue] < 10 ) {
                $filteredHotels[] = $hotel ;
            }
            break;
        case 'vote';
        if ($hotel[$filteredValue] > 3 ) {
            $filteredHotels[] = $hotel ;
        }
        break;
        case 'start';
                $filteredHotels[] = $hotel ;
            break;
    }
}
//var_dump($filteredHotels);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <h5 class="text-light my-3">Select to filter our hotels</h5>
    <form action="" method="get" class="d-flex align-items-center">

        <label for="filter">
            
            <select name="filter" id="filter" class="form-select">
                <option selected>Options...</option>
                <option value="parking">Parking</option>
                <option value="distance_to_center">Near the city-center</option>
                <option value="vote">Most rated</option>
                <option value="start">Show all</option>
            </select>
        </label>
        <button type="submit" class="btn btn-secondary ">Filter</button>
    </form>
    <div class="container">
        <h1 class="text-center text-light my-3">Our Hotels</h1>
    <table class="table table-light table-striped mt-4 text-center">
        <thead class="table-danger">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Parking</th>
                <th>Vote</th>
                <th>Distance to center</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (($filteredValue ? $filteredHotels : $hotels) as $hotel) :?>
                
                <tr>
                <td class="fw-medium">
                    <?=$hotel['name']?> 
                </td>
                <td>
                    <?=$hotel['description']?>
                </td>
                <td>
                    <?php
                    if($hotel['parking'])
                    {
                        echo '<i class="fa-solid fa-circle-check text-success"></i>';
                    }else{
                        echo '<i class="fa-solid fa-circle-xmark text-danger"></i>';
                    }
                    ?>
                </td>
                <td>
                    <?=$hotel['vote']?> / 5
                </td>
                <td>
                    <?=$hotel['distance_to_center']?> Km
                </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
    </div>
</body>
</html>