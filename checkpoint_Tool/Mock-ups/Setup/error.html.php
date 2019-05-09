<!-- /*
Lead Developers: Albert Warner &  Olufemi Olusina
Description: This page displays error from activities on other pages.
*/ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../Staff/css/style4.css?<?php echo time();?>">

    <title>Error!</title>
</head>
<body>
    <form class="setup.php" action = 'setup.php' method = 'POST'>
        <div class="container3">
            <h1 class="title">Error</h1>
            <p> <?php echo $message; ?> </p>
            <input class="button btn btn-info btn-lg" type='submit' name='Return' value='Return' />        
        </div>
    </form>
</body>
</html>

