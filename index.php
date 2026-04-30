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


$filtered_hotels = $hotels;

// Filtro in Base alla disponibilità di parcheggio --> se parking è fornito come parametro nell'url ed è vero ( === "1")
if (isset($_GET["parking"]) && $_GET["parking"] === "1") {
  $hotels_with_parking = [];
  foreach ($filtered_hotels as $hotel) {
    if ($hotel["parking"] === true) {
      $hotels_with_parking[] = $hotel;
    }
  }
  $filtered_hotels = $hotels_with_parking;
}

// Filtro in base al voto

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

<div class="container mt-5">
    <form action="index.php" method="GET" >
        <div class="row">
            <div class="col-4">
                <label for="parking">With Parking filter</label>
                <select name="parking" id="parking" class="form-select">
                    <option value="">No selection</option>
                    <option value="1" <?php echo (isset($_GET['parking']) && $_GET['parking'] === '1') ? 'selected' : '' ?>>With parking spots</option>
                </select>
            </div>
            <div class="col-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <table class="table table-dark table-striped-columns">
        <thead class="table-success">
            <tr>
            <?php
            // estrazione delle chiavi dall'array per evitare di doverle inserire a mano --> (riutilizzo)
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
            <?php foreach ($filtered_hotels as $hotel) { ?>
                <tr>
                    <td><?php echo $hotel['name']; ?></td>
                    <td><?php echo $hotel['description']; ?></td>
                    <td><?php echo $hotel['parking'] ? 'yes' : 'no'; ?></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel['distance_to_center']; ?> km</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
</body>
</html>
