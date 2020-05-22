<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Strona Adama Lecha</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
        <link rel="icon" href="src/favicon.ico">
        <link rel="stylesheet" href="src/styl.css">
    </head>

    <body>
        <div id="mainFrame">
            <aside>
                <div id="menuHolder">
                    <div id ="logo">
                        <a href="index.html">Praktyka zawodowa</a>
                    </div>
                    <p class="category">Tydzień pierwszy</p>
                        <a class="menu" href="przepisy.html">1.Przepisy BHP</a>
                        <a class="menu" href="sysop.html">2.Instalacja systemu operacyjnego</a>
                        <a class="menu" href="pakiet.html">3.Instalacja oprogramowania biurowego</a>
                        <a class="menu" href="doc.html">4.Dokumentacja techniczna</a>
                        <a class="menu" href="peryf.html">5.Podłączanie urządzeń peryferyjnych do komputera</a>
                    <p class="category">Tydzień drugi</p>
                        <a class="menu" href="skrecanie.html">6.Montaż komputera z części komputerowych</a>
                        <a class="menu" href="diag.html">7.Testowanie i diagnozowanie sprzętu komputerowego</a>
                        <a class="menu" href="#">8.Podłączanie drukarki do komputera</a>
                        <a class="menu" href="#">9.Sieć LAN w firmie</a>
                        <a class="menu" href="#">10.Korzystanie z zasobów sieci Internet</a>
                    <p class="category">Tydzień trzeci</p>
                        <a class="menu" href="#">11.Projektowanie relacyjnej bazy danych</a>
                        <a class="menu" href="#">12.Tworzenie tabel przechowujących dane</a>
                        <a class="menu" href="#">13.Budowa formularzy dodających dane do bazy</a>
                        <a class="menu" href="#">14.Kwerendy wybierające dane z bazy danych</a>
                        <a class="menu" href="#">15.Raporty w bazie danych</a>
                    <p class="category">Tydzień czwarty</p>
                        <a class="menu" href="#">16.Tworzenie serwisu internetowego na potrzeby firmy</a>
                        <a class="menu" href="#">17.Wykorzystanie bloków przy tworzeniu serwisu</a>
                        <a class="menu" href="#">18.Wykorzystanie menu w serwisie internetowym</a>
                        <a class="menu" href="#">19.Tworzenie galerii na potrzeby serwisu</a>
                        <a class="menu" href="#">20.Tworzenie formularzy w serwisie internetowym</a>
                </div>
                
            </aside>
            <section>
                <div class="jumbotron">
                    <h1 class="display-4">Formularze przesyłające dane do bazy danych</h1>
                    <hr class="my-4">
                    <?php
                        error_reporting(0);
                        $status = "";
                        // Create connection
                        $conn = mysqli_connect("localhost", "root","","praktyki");
                        // Check connection
                        if ($conn) {
                            $status = "Połączono";
                        }
                        else{
                            exit("Brak połączenia z bazą danych.");
                        }
                        echo "Status połączenia:".$status;
                        if (isset($_POST["imie"])){

                            echo "<br>Przesłane dane:";
                            echo "<br>Imie: ".$_POST["imie"];
                            echo "<br>Nazwisko: ".$_POST["nazwisko"];
                            echo "<br>Adres: ".$_POST["adres"];

                            $sql = "INSERT INTO pracownik (imie, nazwisko, adreszamieszkania)
                            VALUES ('".$_POST["imie"]."','".$_POST["nazwisko"]."','".$_POST["adres"]."')";
                            if (mysqli_query($conn, $sql)) {
                              echo "<br> <span class='badge badge-success'>Dodano nowy rekord pomyślnie!</span>";
                            } else {
                              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            
                            mysqli_close($conn);

                        }

                    ?>
                   <form action="formularz.php" method="post">
                        <div class="form-group">
                            <label for="imie">Imię</label>
                            <input required type="text" class="form-control" name="imie"id="imie" aria-describedby="imiePomoc" placeholder="Wpisz imie">
                        </div>
                        <div class="form-group">
                            <label for="imie">Nazwisko</label>
                            <input required type="text" class="form-control" name="nazwisko" id="nazwisko" aria-describedby="nazwiskoPomoc" placeholder="Wpisz nazwisko">
                        </div>
                        <div class="form-group">
                            <label for="imie">Adres </label>
                            <input  required type="text" class="form-control" name="adres" id="adres" aria-describedby="adresPomoc" placeholder="Wpisz adres">
                        </div>
                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </form>

                </div>



            </section>
            
            <footer>
                <p>strone zrobil adam lech</p>
            </footer>

        </div>
    </body>



</html>