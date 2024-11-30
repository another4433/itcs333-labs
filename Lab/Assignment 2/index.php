<?php
//API call
$URL = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';
$reponse = file_get_contents($URL);
//API results
$result = json_decode($reponse); 
?>

<!DOCTYPE html>
<!--
Contributers of ITCS333 Assignment 1:
Student names: Ali Mohamed Ali Hassan, Ali Othman
Student IDs: 202105103
-->
<html lang="en">
  <head>
    <title>Student Enrollment Statistics</title>
    <meta name="Data Encoder" charset="utf-8">
    <meta name="Color Scheme" content="light dark">
    <meta name="Website Layout" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.main.css" referrerpolicy="origin">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h1>UOB IT Collage Enrollement Data (2018-2023)</h1>
    <main class='overflow-auto '>
      <div class="pico">
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
      </div>
    </main>
  </body>
</html>