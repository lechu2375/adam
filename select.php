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
                        <a class="menu" href="drukarka.html">8.Podłączanie drukarki do komputera</a>
                        <a class="menu" href="siecilan.html">9.Sieć LAN w firmie</a>
                        <a class="menu" href="zasoby.html">10.Korzystanie z zasobów sieci Internet</a>
                    <p class="category">Tydzień trzeci</p>
                        <a class="menu" href="relacyjnabaza.html">11.Projektowanie relacyjnej bazy danych</a>
                        <a class="menu" href="tworzenietabel.html">12.Tworzenie tabel przechowujących dane</a>
                        <a class="menu" href="formularz.php">13.Budowa formularzy dodających dane do bazy</a>
                        <a class="menu" href="select.php">14.Kwerendy wybierające dane z bazy danych</a>
                        <a class="menu" href="raporty.html">15.Raporty w bazie danych</a>
                    <p class="category">Tydzień czwarty</p>
                        <a class="menu" href="tworzenieserwisu.html">16.Tworzenie serwisu internetowego na potrzeby firmy</a>
                        <a class="menu" href="blokiserwis.html">17.Wykorzystanie bloków przy tworzeniu serwisu</a>
                        <a class="menu" href="menuserwis.html">18.Wykorzystanie menu w serwisie internetowym</a>
                        <a class="menu" href="galeriaserwis.html">19.Tworzenie galerii na potrzeby serwisu</a>
                        <a class="menu" href="formularzeserwis.html">20.Tworzenie formularzy w serwisie internetowym</a>
                </div>
            </aside>

            <section>
                <div class="jumbotron">
                    <h1 class="display-4">Pobieranie danych z bazy i ich sortowanie</h1>
                    <hr class="my-4">
                    <?php
                        error_reporting(0);
                        $status = "";
                        // Create connection
                        $conn = mysqli_connect("localhost", "root","","praktyki");
                        // Check connection
                        if ($conn) {
                            $status = "Połączono";
                            echo "<span class='badge badge-success'>Połączono z bazą danych!</span><br>";
                        }
                        else{
                            exit("<span class='badge badge-danger'>Brak połączenia z bazą danych!</span>");
                        }

                        $sql = "SELECT * FROM pracownik";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        echo "Lista wszystkich pracowników:<br>";
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "id:" . $row["idpracownika"]. "|Imie: " . $row["imie"]. "|Nazwisko:" . $row["nazwisko"]."|Adres:" . $row["adreszamieszkania"]. "<br>";
                        }
                        } else {
                        echo "0 results";
                        }

                        echo "<hr>";

                        $sql = "SELECT * FROM pracownik INNER JOIN stanowisko on pracownik.idstanowiska = stanowisko.idstanowiska";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "Lista wszystkich pracowników z ich pensjami:<br>";
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "id:" . $row["idpracownika"]. "|Imie: " . $row["imie"]. "|Nazwisko:" . $row["nazwisko"]."|Pensja:" . $row["pensja"]. "<br>";
                            }
                        } 
                        else {
                            echo "0 results";
                        }

                        echo "<hr>";
                        $sql = "SELECT * FROM pracownik INNER JOIN stanowisko on pracownik.idstanowiska = stanowisko.idstanowiska WHERE pensja>300";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "Lista wszystkich pracowników z wypłatami większymi od 300:<br>";
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "id:" . $row["idpracownika"]. "|Imie: " . $row["imie"]. "|Nazwisko:" . $row["nazwisko"]."|Pensja:" . $row["pensja"]. "<br>";
                            }
                        } 
                        else {
                            echo "0 results";
                        }    

                        echo "<hr>";
                        $sql = "SELECT * FROM pracownik INNER JOIN stanowisko on pracownik.idstanowiska = stanowisko.idstanowiska ORDER BY pensja DESC";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "Lista wszystkich pracowników z wypłatami posortowanymi:<br>";
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "id:" . $row["idpracownika"]. "|Imie: " . $row["imie"]. "|Nazwisko:" . $row["nazwisko"]."|Pensja:" . $row["pensja"]. "<br>";
                            }
                        } 
                        else {
                            echo "0 results";
                        }  

                        mysqli_close($conn);


                    ?>


                </div>



            </section>
            
            <footer>
                <p>strone zrobil adam lech</p>
            </footer>

        </div>
    </body>



</html>