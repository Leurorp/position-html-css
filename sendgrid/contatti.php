<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contatti_bici_e_cicli</title>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mohave:wght@500&display=swap" rel="stylesheet">
  <style>
    p {font-family: 'mohave', sans-serif}
  </style>
</head>
<body>
  <?php
  require_once './config/config.php';
  require 'vendor/autoload.php'; // If you're using Composer (recommended)
  // Comment out the above line if not using Composer
  // require("<PATH TO>/sendgrid-php.php");
  // If not using Composer, uncomment the above line and
  // download sendgrid-php.zip from the latest release here,
  // replacing <PATH TO> with the path to the sendgrid-php.php file,
  // which is included in the download:
  // https://github.com/sendgrid/sendgrid-php/releases
  if (isset($_POST['invia'])) {
    $emailMittente = $_POST['email'];
    $testo = $_POST['testo'];

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("leuro.borsini@libero.it", "position css");
    $email->setSubject("Messaggio da ".$emailMittente);
    $email->addTo("borsinileuro@gmail.com");
    $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    $email->addContent(
      "text/html",
      "<strong>Messaggio scritto da ".$emailMittente.":<br></strong>".$testo);
    $sendgrid = new \SendGrid(SENDGRID_API_KEY);
    try {
      $response = $sendgrid->send($email);
      // print $response->statusCode() . "\n";
      // print_r($response->headers());
      // print $response->body() . "\n";
    } 
    catch (Exception $e) {
      echo '<p style="color:black"> Caught exception: ' . $e->getMessage() . "\n"."</p>";
    }
    if ($sendgrid->send($email)) {
      echo "<p style='color:black; text-align:center;'> Messaggio inviato con successo!<br>
      <a href='../index.html'>Torna indietro</a></p>";
    }
  }
?>
  <canvas id="demo" width="85" height="60" style="margin-left:20px;">
  </canvas>
  <script>
    let canvas = document.getElementById("demo");
    let context = canvas.getContext("2d");
    context.beginPath();
    context.scale(0.5, 0.3);
    context.moveTo(10, 34);
    context.lineTo(10, 190);
    context.lineTo(110, 190);
    context.lineWidth = 30;
    context.strokeStyle = "#0000cd";
    context, lineCap = "round";
    context.stroke();

    context.beginPath();
    context.lineWidth = 15;
    context.strokeStyle = "#dc143c";
    context.moveTo(42, 155);
    context.lineTo(85, 155);
    context.stroke();

    context.beginPath();
    context.arc(86, 125, 30, 0.5 * Math.PI, 1.5 * Math.PI, true);
    context.lineCap = "round";
    context.stroke();

    context.beginPath();
    context.lineCap = "square";
    context.moveTo(80, 95);
    context.lineTo(60, 95);
    context.stroke();

    context.beginPath();
    context.arc(86, 78, 17, 0.5 * Math.PI, 1.5 * Math.PI, true);
    context.lineCap = "round";
    context.stroke();

    context.beginPath();
    context.lineCap = "square";
    context.moveTo(80, 60);
    context.lineTo(43, 60);
    context.stroke();

    context.beginPath();
    context.lineCap = "square";
    context.moveTo(43, 60);
    context.lineTo(43, 155);
    context.stroke();   
  </script>
  <h3 style="color:rgb(238, 217, 217); display:inline;"> WEB PRODUCTION </h3>
  </div>
</body>

</html>