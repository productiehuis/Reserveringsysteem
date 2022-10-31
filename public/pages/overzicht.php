<?php include "../includes/header.php";

require_once "../control/class/performanceDL.php";

?>
    <main class=\"text-center\">
        <h2>
            Overzicht
        </h2>
    </main>
    <table class='table table-responsive-xxl overflow-scroll'>
        <thead>
            <tr class="m-3 rounded">
                <th>ID</th>
                <th>Naam</th>
                <th>Omschrijving</th>
                <th>Begintijd</th>
                <th>Datum</th>
                <th>Locatie</th>
                <th>Zitplaatsen</th>
                <th>Voorbij</th>
            </tr>
        </thead>
        <tbody>
    <?php

    $performance = new performanceDL();

    $allperformances = $performance->readAllPerformance();

    foreach ($allperformances as $row)
    {
    echo "
            <tr class='table-light'>
                <td class='text-center'>$row->showID</td>
                <td class='text-center'>$row->name</td>
                <td class='text-center'>$row->description</td>
                <td class='text-center'>$row->starttime</td>
                <td class='text-center'>$row->date</td>
                <td class='text-center'>$row->location</td>
                <td class='text-center'>$row->max</td>
                <td class='text-center'>$row->past</td>
            </tr>
        </tbody>
    ";}?>
    </table>
<?php include "../includes/footer.php"; ?>