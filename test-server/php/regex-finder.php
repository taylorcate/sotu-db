<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://github.com/tymonaghan/sotu-db/raw/master/images/favicon.png">
    <link rel="stylesheet" href="/style/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SOTU-db</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
      body {
        background: url("../images/Obama_waves_State_of_the_Union_2011-lightened.jpg") no-repeat center;
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $rawQuery = $_GET["searchTerm"];
      $rawChunkSize = $_GET["chunkSize"];
      $query = escapeshellcmd($rawQuery);
      $chunkSize = escapeshellcmd($rawChunkSize);
    } //if the form is filled out, clean the "searchTerm" and store as query

    function clean_input($data) { //function to clean input
    $data = trim($data); //trim white space from end
    $data = stripslashes($data); //remove backslashes (since they are escape characters)
    $data = htmlspecialchars($data); //convert special characters to html entities
    $data = strtolower($data); //convert input to lowercase
    return $data;
    }

    #$output = `C:\"Program Files"\R\R-3.5.1\bin\RScript.exe ../r-scripts/regex-finder.R $query`;
    $output = `/usr/lib/R/bin/Rscript ../r-scripts/regex-finder.R $query`;

    ?>

    <div class="w3-top">
      <?php include 'topnav.php';?>
    </div> <!-- end w3-top -->
  <div class="w3-content w3-container">
    <div class = "w3-card w3-white">
    <p>your query: <?php echo $query ?> </p>
    <p>using chunkSize of <?php echo $chunkSize ?> </p>
    <br>
    <p><b>results:</b></p>
    <p>here is each instance of your query in Obama's 2013 SOTU:</p>
    <h4>test22</h2>
    <iframe src="../output/test22.txt" style="height:300px;width:100%"></iframe>
    <h4>test11</h4>
    <iframe src="../output/test11.txt" style="height:300px;width:100%"></iframe>
  </div> <!-- end w3-card -->
  </div> <!-- end w3-content div -->

    </body>
  </html>
