<?php include "../includes/header.php"; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Overzicht / Event toevoegen</li>
    </ol>
</nav>
<main>
    <h2 class="page-header">Voorstelling / Event toevoegen</h2>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="overzicht.php" type="button" class="btn btn-primary"><i class="bi bi-calendar-check"></i> Overzicht</a>
        <a href="archief.php" type="button" class="btn btn-primary"><i class="bi bi-archive"></i> Archief</a>
        <a href="vertoning.php" type="button" class="btn btn-primary active"><i class="bi bi-plus-circle"></i> Toevoegen</a>
    </div>
    <div class="center col-sm-6 col-sm-offset-3">
        <form method="POST" action="/reserveringsysteem/public/control/addPerformance.php">
            <div class="row mb-3">
                <label for="inputName" class="col-sm-2 col-form-label"> Naam</label>
                <div class="col-sm-10">
                    <input
                            type="text"
                            name="title"
                            class="form-control"
                            id="inputName"
                            placeholder="Titel vertoning"
                            required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputDescription" class="col-sm-2 col-form-label"> Omschrijving</label>
                <div class="col-sm-10">
                    <input
                            type="text"
                            name="description"
                            class="form-control"
                            id="inputDescription"
                            placeholder="Extra informatie"
                            required>
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0"> Locatie</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="location" id="gridRadios1" value="option1">
                        <label class="form-check-label" for="gridRadios1">
                            Koningszaal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="other" name="location" value="other" />
                        <label class="form-check-label" for="other">Ruimte</label>
                        <label for="otherValue"></label><input type="text" id="otherValue" name="location" />
                    </div>
                </div>
            </fieldset>
            <div class="row mb-3">
                <label for="form-size" class="col-sm-2 col-form-label"> Hoeveelheid</label>
                <div class="col-sm-10">
                    <label>
                        <input
                                class="form-control"
                                type="number"
                                placeholder="Capaciteit"
                                id="form-size"
                                name="max"
                        />
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <label for="form-size" class="col-sm-2 col-form-label"> Datum</label>
                <div class="col-sm-10">
                    <label>
                        <input
                                type="date"
                                name="date"
                                class="form-control">
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <label for="form-size" class="col-sm-2 col-form-label"> Tijd</label>
                <div class="col-sm-10">
                    <label>
                        <input
                                type="time"
                                name="time"
                                class="form-control">
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-success">
                Toevoegen
            </button>
            <?php
            if (isset($_GET["s"]))
            {
                switch ($_GET["s"])
                {
                    case "1":
                        echo "<div class='alert alert-success'>
                                  <strong>Success!</strong> Je word doorgestuurd.
                                </div>";
                        echo '<script>window.location="./overzicht.php";</script>;';
                        break;
                    default:
                        echo "<div class='alert alert-danger'>
                                  <strong>ERROR!</strong> Er is iets fout gegaan.
                                </div>";
                        break;
                }
            }
            ?>
        </form>
    </div>
</main>
<?php include "../includes/footer.php"; ?>
