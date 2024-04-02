<?php include("config.php"); ?>

<!doctype html>
<html lang="en">
    <head>
        <title>Tallinna Maraton</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container">
    <h1>Tallinna maratoni andmed</h1>
    </div>
       <div class="container mt-5 ">
        <h2>ID, nimi ja riik</h2>
        <table class="table">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Nimi</th>
                    <th>Riik</th>
                </tr>
            </thead>
            <tbody>
        <?php
            // Kuvab id, nime ja riigi ning piirab tulemusi esimese 10ni
            $paring = 'SELECT id, nimi, riik from tallinn_marathon limit 10';
            $valjund = mysqli_query($yhendus, $paring);
            while($rida = mysqli_fetch_row($valjund)){
                print_r("<tr>"); 
                print_r("<td>" . $rida[0] . "</td>"); 
                print_r( "<td>" . $rida[1] . "</td>"); 
                print_r( "<td>" . $rida[2] . "</td>"); 
            }
             ?>
       </tbody>
       </table>
       </div>
       <div class="container mt-5 ">
        <h2>Osalejad Soomest, kes on registreerunud pärast 1. märts 2024</h2>
        <table class="table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nimi</th>
                <th>Vanus</th>
                <th>Telefon</th>
                <th>Riik</th>
                <th>Sugu</th>
                <th>T-särgi suurus</th>
                <th>Registreerimine</th>
                <th>Finish</th>
                </tr>
            </thead>
            <tbody>
        <?php
            // Kuvab osalejad Soomest, kes on registreerunid peale 1.märtsi 2024 finishiaja järgi
            $paring = 'SELECT * FROM tallinn_marathon  WHERE riik="Finland" AND registreerimine>"2024-03-01" ORDER BY finish';
            $valjund = mysqli_query($yhendus, $paring);
            while($rida = mysqli_fetch_row($valjund)){
                print_r("<tr>"); 
                print_r("<td>" . $rida[0] . "</td>");
                print_r("<td>" . $rida[1] . "</td>");
                print_r("<td>" . $rida[2] . "</td>");
                print_r("<td>" . $rida[3] . "</td>");
                print_r("<td>" . $rida[4] . "</td>");
                print_r("<td>" . $rida[5] . "</td>");
                print_r("<td>" . $rida[6] . "</td>");
                print_r("<td>" . $rida[7] . "</td>");
                print_r("<td>" . $rida[8] . "</td>");  
            }
             ?>
       </tbody>
        </table>
       </div>
       <div class="container mt-5">
       <h2>Osalejate arv vanusegruppides</h2>
        <table class="table">
            <thead>
                <tr>
                <th>18-30</th>
                <th>31-43</th>
                <th>44-56</th>
                <th>57-69</th>
                <th>70-82</th>
                <th>83-95</th>
                </tr>
            </thead>
            <tbody>
        <?php
            // Päringud kuvavad osalejate arvu erinevates vanusegruppides
            $paring1 = 'SELECT COUNT(*) FROM tallinn_marathon WHERE vanus BETWEEN "18" AND "30"';
            $paring2 = 'SELECT COUNT(*) FROM tallinn_marathon WHERE vanus BETWEEN "31" AND "43"';
            $paring3 = 'SELECT COUNT(*) FROM tallinn_marathon WHERE vanus BETWEEN "44" AND "56"';
            $paring4 = 'SELECT COUNT(*) FROM tallinn_marathon WHERE vanus BETWEEN "57" AND "69"';
            $paring5 = 'SELECT COUNT(*) FROM tallinn_marathon WHERE vanus BETWEEN "70" AND "82"';
            $paring6 = 'SELECT COUNT(*) FROM tallinn_marathon WHERE vanus BETWEEN "83" AND "95"';
            $valjund1 = mysqli_query($yhendus, $paring1);
            while($rida = mysqli_fetch_row($valjund1)){
                print_r("<tr>"); 
                print_r("<td>" . $rida[0] . "</td>");
            }
                $valjund2 = mysqli_query($yhendus, $paring2);
            while($rida = mysqli_fetch_row($valjund2)){
                print_r("<td>" . $rida[0] . "</td>");
            }
                $valjund3 = mysqli_query($yhendus, $paring3);
            while($rida = mysqli_fetch_row($valjund3)){
                print_r("<td>" . $rida[0] . "</td>");
            }
                $valjund4 = mysqli_query($yhendus, $paring4);
            while($rida = mysqli_fetch_row($valjund4)){
                print_r("<td>" . $rida[0] . "</td>");
            }
                $valjund5 = mysqli_query($yhendus, $paring5);
            while($rida = mysqli_fetch_row($valjund5)){
                print_r("<td>" . $rida[0] . "</td>");
            }
            $valjund6 = mysqli_query($yhendus, $paring6);
            while($rida = mysqli_fetch_row($valjund6)){
                print_r("<td>" . $rida[0] . "</td>");
            }
             ?>
       </tbody>
        </table>
       </div>
       <div class="container mt-5">
       <h2>3 juhuslikku naisosalejat, kes lõpetasid maratoni</h2>
        <table class="table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nimi</th>
                <th>Vanus</th>
                <th>Telefon</th>
                <th>Riik</th>
                <th>Sugu</th>
                <th>T-särgi suurus</th>
                <th>Registreerimine</th>
                <th>Finish</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Kuvab 3 suvalist naisosalejat, kes lõpetasid maratoni
            $paring = 'SELECT * FROM tallinn_marathon WHERE sugu = "Female" AND finish !=0 LIMIT 3';
            $valjund = mysqli_query($yhendus, $paring);
            while($rida = mysqli_fetch_row($valjund)){
                print_r("<tr>");
                print_r("<td>" . $rida[0] . "</td>");
                print_r("<td>" . $rida[1] . "</td>");
                print_r("<td>" . $rida[2] . "</td>");
                print_r("<td>" . $rida[3] . "</td>");
                print_r("<td>" . $rida[4] . "</td>");
                print_r("<td>" . $rida[5] . "</td>");
                print_r("<td>" . $rida[6] . "</td>");
                print_r("<td>" . $rida[7] . "</td>");
                print_r("<td>" . $rida[8] . "</td>");
            }
            ?>
            </tbody>
       </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
