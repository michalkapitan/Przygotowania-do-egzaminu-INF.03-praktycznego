<?php
function wysylanie()
{
    if(isset($_POST["imie"]) && $_POST["imie"] != "" && $_POST["nazwisko"] != "" && $_POST["wiek"] != "")
    {
        $conn = mysqli_connect("localhost", "root", "", "dziennik");
        if(!$conn)
        {
            echo "nie udało się połączyć z bazą danych";
            return;
        }
        $imie = $_POST["imie"];
        $nazwisko = $_POST["nazwisko"];
        $wiek = $_POST["wiek"];

        $sql = "INSERT INTO uczniowie VALUES ('$imie', '$nazwisko', '$wiek')";
        $res = mysqli_query($conn, $sql);
        if ($res)
        {
            echo "Dodałeś użytkownika: $imie $nazwisko $wiek";
        }
        else
        {
            echo "Nie udało się dodac ucznia";
        }
        mysqli_close($conn);

        
    }
    else
    {
        echo "dodaj imie ucznia";
    }
}
?>