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
                var_dump($rida[0])."<br>";
            }
             ?>
       </tbody>
       </table>
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
