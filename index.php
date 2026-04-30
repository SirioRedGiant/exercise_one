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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 1: php-hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h1>
    Hotel vote & features
    </h1>
    <?php
    
    foreach ($hotels as $hotel) {
        foreach ($hotel as $key => $value) {
            echo "$key: $value <br>";
        }
    }
 ?>
<table class="table table-dark table-striped-columns">
  <thead class= "table-success">
    <tr>
      <?php
      // estrazione delle chiavi dall'array per evitare di doverle inserire a mano
      $keys = array_keys($hotels[0]);

      foreach ($keys as $key) {
        // pulizia degli "_"
        $clean_intestazione = ucfirst(str_replace("_", " ", $key));
      

      ?>
      <th scope="col"><?php echo $clean_intestazione ?></th>
      <?php
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($hotels as $hotel) {
    ?>
    <tr>
      <th scope="row"><?php echo $hotel["name"];  ?></th>
      <td><?php echo $hotel["description"];  ?></td>
      <td><?php echo $hotel["parking"] ? "yes" : "no"; ?></td>
      <td><?php echo $hotel["vote"] ?></td>
      <td><?php echo $hotel["distance_to_center"] ?></td>
    </tr>
    <?php
    }
  ?>
  </tbody>
</table>
</body>
</html>