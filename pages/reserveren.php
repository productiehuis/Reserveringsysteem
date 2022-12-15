<?php include "../includes/header.php"; ?>
<main>
    <h2 class="page-header">
        Reserveren
    </h2>
    <div class="col-sm-6 col-sm-offset-3 center">
        <form method="POST" action="/control/addReservation.php">
            <div class="row mb-3">
                <label for="inputVistor" class="col-sm-2 col-form-label"> Naam:</label>
                <div class="col-sm-10">
                    <label>
                        <input
                                type="text"
                                name="name"
                                class="form-control"
                                required>
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label"> Email:</label>
                <div class="col-sm-10">
                    <label>
                        <input
                                type="text"
                                class="form-control"
                                name="email"
                                required>
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputAmount" class="col-sm-2 col-form-label"> Aantal bezoekers:</label>
                <div class="col-sm-10">
                    <label>
                        <input
                                type="number"
                                class="form-control"
                                name="amount"
                                required>
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputAmount" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <label>
                        <input type="hidden" name="showID" value="<?php echo $_GET["v"]?>">
                        <input class="btn-primary btn" type="submit" value="Toevoegen">
                    </label>
                </div>
            </div>
            <?php
            if (isset($_GET["s"]))
            {
                switch ($_GET["s"])
                {
                    case "1":
                        echo "<p class='succes'>Reservering succesvol geplaatst, u ontvangt een bevestigingsmail.</p>";
                        break;
                    case "2":
                        echo "<p class='error'>Deze vertoning is volgeboekt.</p>";
                        break;
                    case "3":
                        echo "<p class='error'>E-mailadres is niet juist.</p>";
                        break;
                    default:
                        echo "<p class='error'>Er is iets fout gegaan.</p>";
                        break;
                }
            }
            ?>
        </form>
    </div>
</main>
<?php include "../includes/footer.php"; ?>
