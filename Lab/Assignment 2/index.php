<?php

//API call
$URL = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';

$response = file_get_contents($URL); //Reading content from API
$result = json_decode($response); //API results
?>

<!DOCTYPE html>
<!--
Contributers of ITCS333 Assignment 2:
Student names: Ali Mohamed Ali Hassan, Ali Othman Abbas
Student IDs: 202105103, 202208581
-->
<html lang="en">
  <head>
    <title>Student Enrollment Information</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>UOB IT Collage Enrollement Data (2018-2023)</header>
    <main class="overflow-auto">
      <table class="striped">
        <thead data-theme="light"> <!--It is used to group the headers together to apply certain style to it-->
          <tr>
            <th>Year</th>
            <th>Semester</th>
            <th>The Programs</th>
            <th>Nationality</th>
            <th>Colleges</th>
            <th>Number of Students</th>
          </tr>
        </thead>
        <tbody> <!--It is another group in tables that shows the contents retrieved from the website-->
          <?php foreach($result->results as $semester): ?> <!--It inserts data retrieved from API into an array and identify each row as 'semester'-->
            <tr>
              <td><?=$semester->year?></td>
              <td><?=$semester->semester?></td>
              <td><?=$semester->the_programs?></td>
              <td><?=$semester->nationality?></td>
              <td><?=$semester->colleges?></td>
              <td><?=$semester->number_of_students?></td>
            </tr> <!--Each row includes table format like this to be adjusted with the table headers-->
          <?php endforeach?> <!--Each row contains the column as year, semester, program, nationality, college, and number of students-->
        </tbody>
      </table>
    </main>
  </body>
</html>
