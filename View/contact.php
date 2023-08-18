<!doctype html>
<html lang="en">
<?php include("../Controller/controller.php");?>
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="../fontawesome-free-6.2.1-web/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body {
            background-color: bisque;
        }

        .container {
            margin-top: 10px;
            padding: 0px;
            background-color: rgb(255, 255, 255);
        }

        .container-fluid {
            padding: 0px;
        }
    </style>
</head>

<body>
<?php 
  include('header.php');
  include('banner.php');
  ?>


    <div class="container" style="margin-bottom: 180px;height: 100%;">
        <header>
            <h1>Contact us</h1>
          </header>
          
          <div id="form">
          
          <div class="fish" id="fish"></div>
          <div class="fish" id="fish2"></div>
          
          <form id="waterform" action="../Controller/controller.php" method="post" style="margin: 0 auto;width: 500px;padding-top: 40px;color: white;position: relative;">
          
          <div class="formgroup" id="name-form">
              <label for="name">Your name*</label>
              <input type="text" id="name" Required name="name" />
          </div>
          
          <div class="formgroup" id="email-form">
              <label for="email">Your e-mail*</label>
              <input type="email" id="email" Required name="email" />
          </div>
          
          <div class="formgroup" id="message-form">
              <label for="message">Your message</label>
              <textarea rows="5" id="message" name="message" Required></textarea>
          </div>
          
            <input type="submit" value="Send your message!" name="action"/>
          </form>
          </div>
    </div>
    

    <?php 
 include('footer.php')
 ?>
</body>
</html>