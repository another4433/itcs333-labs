<?php

//API call
$URL = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';

$reponse = file_get_contents($URL); //Reading content from API
$result = json_decode($reponse); //API results
?>

<!DOCTYPE html>
<!--
Contributers of ITCS333 Assignment 1:
Student names: Ali Mohamed Ali Hassan, Ali Othman
Student IDs: 202105103, 202208581
-->
<html lang="en">
  <head>
    <title>Student Enrollment Statistics</title>
    <meta name="Data Encoder" charset="utf-8"> <!--Format used to read data in the website-->
    <meta name="Color Scheme" content="light dark"> <!--Applying theme to the webpage to be in the color between white and dark-->
    <meta name="Website Layout" content="width=device-width, initial-scale=1.0"> <!--Allowing the page to be responsive on any device-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> <!--CSS Framework used to apply designs and styles to the website-->
    <link rel="stylesheet" href="styles.css"> <!--Custom CSS style that helps applying more style to the website-->
  </head>
  <body>
    <header>UOB IT Collage Enrollement Data (2018-2023)</header>
    <main class="pico">
      <table>
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