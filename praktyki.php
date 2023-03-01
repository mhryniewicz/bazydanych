<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktyki uczniow</title>
</head>
<body>
    <header>
        <h1>Praktyki uczniow technikum</h1>
    </header>
    <nav>
        <button>Wyswietl zaklady pracy</button>
    </nav>
    <main>

    </main>
    <section class="wprowadzanie danych">
    <?php
    $connect=mysqli_connect('localhost','root','','praktyki');
    if($connect){
        echo "Polaczenie dziala"
        $zapytanie="SELECT * FROM osoba";
        $wynik=mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_array($wynik)){
            $imie[]= $wiersz['imie'];
            $nazwisko[]= $wiersz['nazwisko'];
            $iddane[]=$wiersz['id'];
        }
        $zapytanie="SELECT * FROM zakład_pracy";
        $wynik=mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_array($wynik)){
            $zakład_pracy[]= $wiersz['zakład_pracy'];
       }
        echo "<br>";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $imie=$_POST['imie'];
            $nazwisko=$_POST['nazwisko'];
           $iddane=$_POST['id'];
            $zakład_pracy=$_POST['zakład_pracy'];
            
          
            $insert="INSERT INTO pra VALUES(null, '')";
                if(mysqli_query($polaczenie,$insert)){
                    echo "Dodano do bazy";
                }
    else{
        echo "Blad polaczenia"
    }
}
    }
    mysqli_close($connect);
?>
        <form method="POST">
            <label for="osoba">Wybierz osobe</label>
            <select name="osoba" id="osoba">
            <?php
                for ($x=0;$x<count($imie);$x++){
                    echo "
                    <option value=$iddane[$x] id='osoba$iddane[$x]' name='osoba$iddane[$x]'>
                        $imie[$x] $nazwisko[$x]
                        </option>
                    ";
                }
                    
            ?>
            </select>
            <br>
            <label for="zakład_pracy ">Wybierz zaklad pracy </label>
            <select name="zakład_pracy ">
                <?php
                for ($x=0;$x<count($zakład_pracy y);$x++){
                    echo "<option value=$zakład_pracy [$x]>$zakład_pracy y[$x]</option>";
                }
                    
                ?>
            </select>
            <br>
            <label for="data_r">Wybierz datę rozpoczecia</label>
            <input type="date" name="data_r" id="data_r">
            <br>
            <label for="data_z">Wybierz datę zakonczenia</label>
            <input type="date" name="data_z" id="data_z">
            <br>
            <label for="ocena">Podaj ocene</label>
            <input type="text" name="ocena" id="ocena">
            <br>
            <input type="submit" value="zapisz do bazy">
            <input type="reset" value="resetuj dane">
        </form>
    </section>
    <section class="komunikaty">
      

    </section>
    <section class="zaklady">

    </section>
    <footer>
        Michal Hryniewicz
    </footer>
</body>
</html>