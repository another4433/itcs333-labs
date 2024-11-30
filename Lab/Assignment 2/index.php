<?php

//API call
$URL = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';

$reponse = file_get_contents($URL);
$result = json_decode($reponse); //API results
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>statistics</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>UOB IT Collage Enrollement Data (2018-2023)</header>
    <main class='overflow-auto '>
      <table>
        <thead data-theme="light">
          <tr>
            <th>Year</th>
            <th>Semester</th>
            <th>The Programs</th>
            <th>Nationality</th>
            <th>Colleges</th>
            <th>Number of Students</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($result->results as $semester): ?>
            <tr>
              <td><?=$semester->year?></td>
              <td><?=$semester->semester?></td>
              <td><?=$semester->the_programs?></td>
              <td><?=$semester->nationality?></td>
              <td><?=$semester->colleges?></td>
              <td><?=$semester->number_of_students?></td>
            </tr>
          <?php endforeach?>
        </tbody>
      </table>
    </main>
  </body>
</html>