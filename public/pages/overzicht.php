<?php include "../includes/header.php"; ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Overzicht</li>
        </ol>
    </nav>
    <main>
        <h2 class="page-header">
            Overzicht
        </h2>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a type="button" class="btn btn-primary active"><i class="bi bi-calendar-check"></i> Huidig</a>
            <a href="archief.php" type="button" class="btn btn-primary"><i class="bi bi-archive"></i> Archief</a>
            <a href="vertoning.php" type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Toevoegen</a>
        </div>
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
                if(!$row->past == 1)
                {
                    $past = strval($row->past);
                    echo "
                    <tr class='table-light'>
                        <td class='text-center'><p>$row->showID</p></td>
                        <td class='text-center'><p>$row->name</p></td>
                        <td class='text-center'><p>$row->description</p></td>
                        <td class='text-center'><p>$row->starttime</p></td>
                        <td class='text-center'><p>$row->date</p></td>
                        <td class='text-center'><p>$row->location</p></td>
                        <td class='text-center'><p>$row->max</p></td>
                        <td><button class='btn btn-warning' id='$row->showID'><i class='bi bi-pencil'></i></button></td>
                        <td><button class='btn btn-danger delete' id='$row->showID'><i class=\"bi bi-trash\"></i></button></td>
                    </tr>
                    ";
                }
            }
            ?>
            </tbody>
        </table>
    </main>
<?php include "../includes/footer.php"; ?>
