<?php include "../includes/header.php"; ?>
<main>
    <h2 class="page-header">
        Archief
    </h2>
    <div class="btn-group" role="group">
        <a href="overzicht.php" type="button" class="btn btn-primary"><i class="bi bi-calendar-check"></i> Overzicht</a>
        <a type="button" class="btn btn-primary active"><i class="bi bi-archive"></i> Archief</a>
    </div>
    <input class="form-control mb-3 mt-3" id="searchTable" type="text" placeholder="Zoeken">
    <table class='table table-responsive-xxl table-hover overflow-scroll'>
        <thead>
            <tr class="m-3 rounded">
                <th>ID</th>
                <th>Naam</th>
                <th>Omschrijving</th>
                <th>Begintijd</th>
                <th>Datum</th>
                <th>Locatie</th>
                <th>Zitplaatsen</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        <tbody>
        <?php
        require_once "../control/class/performanceDL.php";
        $performance = new performanceDL();

        $allperformances = $performance->readAllPerformance();

        foreach ($allperformances as $row)
        {
            $currentDate = new DateTimeImmutable();
            $date = $row->date->format('d-m-Y');

            if ($row->date < $currentDate)
            {
                echo "
                    <tr class='table-light'>
                        <td class='text-center'><p>$row->showID</p></td>
                        <td class='text-center'><p>$row->name</p></td>
                        <td class='text-center'><p>$row->description</p></td>
                        <td class='text-center'><p>$row->starttime</p></td>
                        <td class='text-center'><p>$date</p></td>
                        <td class='text-center'><p>$row->location</p></td>
                        <td class='text-center'><p>$row->max</p></td>
                        <td><button class='btn btn-warning' id='$row->showID' disabled><i class='bi bi-pencil' disabled></i></button></td>
                        <td><button class='btn btn-danger delete' id='$row->showID'><i class=\"bi bi-trash\"></i></button></td>
                        <td><a href='/control/exportExcel.php?id=$row->showID' class='btn btn-success export'><i class='bi bi-file-earmark-spreadsheet'></i></a></td>
                    </tr>
                    ";
            }
        }
        ?>
        </tbody>
    </table>
</main>
<?php include "../includes/footer.php"; ?>
