<!DOCTYPE html>
<html lang="en">
<head>
    <title>Strona Stajni XXXXX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
   
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage">
                <img src="logo2.png" alt="" width="150" height="30">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.html">HOME</a></li>
                <li><a href="index.html#onas">O NAS</a></li>
                <li><a href="index.html#pensjonat">PENSJONAT</a></li>
                <li><a href="index.html#galeria">GALERIA</a></li>
                <li><a href="index.html#zawody">ZAWODY JEŹDZIECKIE</a></li>
                <li><a href="kalendarz.html">KALENDARZ</a></li>
                <li><a href="index.html#kontakt">KONTAKT</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h5>Logowanie</h5>
		<p class="text">Zaloguj się aby zapisać się na jazdy</p>
		<p class="text">Wybierz odpowiedni sposób logowania</p>
		<a href = 'stadnina1/kursant_logowanie.php'><button type="button" class="btn btn-dark"><span style="color: white">Kursant</span></button></a>
		<a href = 'stadnina1/instruktor/'><button type="button" class="btn btn-dark"><span style="color: white">Instruktor</span></button></a>
		<a href = 'stadnina1/admin'><button type="button" class="btn btn-dark"><span style="color: white">Administrator</span></button></a>
		<p class="text">Nie posiadasz konta?</p>
		<a href = 'stadnina1/rejestracja.php'><button type="button" class="btn btn-dark"><span style="color: white">Zarejestruj się!!!</span></button></a>
    </div>
</div>


<footer class="text-center">
    <a class="up-arrow" href="logowanie.php" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p>Stajnia XXXXXX </p>
</footer>

</body>
</html>