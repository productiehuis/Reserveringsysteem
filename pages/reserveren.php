<?php include "../includes/header.php"; ?>
<main>
    <h2 class="page-header">
        Reserveren
    </h2>
    <div class="center">
        <form method="POST" action="/control/addReservation.php">
            <div class="row mb-3">
                <label for="inputVistor" class="col-sm-2 col-form-label"> Voor & achternaam:</label>
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
                                placeholder="email@kw1c.nl"
                                name="email"
                                required>
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputAmount" class="col-sm-2 col-form-label"> Aantal gasten:</label>
                <div class="col-sm-10">
                    <label>
                        <input
                                type="number"
                                placeholder="0"
                                class="form-control"
                                name="amount"
                                required>
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputDepartment" class="col-sm-2 col-form-label"> Afdeling:</label>
                <div class="col-sm-10">
                    <label>
                        <input
                                type="text"
                                class="form-control"
                                placeholder="ICT and Creative Industries"
                                name="textbox"
                                required>
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputFeedback" class="col-sm-2 col-form-label"> Hoe ben je te weten gekomen over dit evenement / voorstelling:</label>
                <div class="col-sm-10">
                    <label>
                        <select name="feedbackList" required>
                            <option value="">Via het portaal / startpunt</option>
                            <option value="">Via promotie op beeldschermen</option>
                            <option class="form-check-label" for="other" value="">Anders</option>
                            <label for="otherValue"></label><input type="text" id="otherValue" name="feedbackOther"/>
                        </select>
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
                        echo "<div class='alert alert-success'>
                                  <strong>Success!</strong> Reservering succesvol geplaatst, u ontvangt een bevestigingsmail. U word doorgestuurd.
                                </div>";
                        echo '<script>setTimeout(() => {window.location="../index.php"}, 4000);</script>';
                        break;
                    case "2":
                        echo "<p class='error'>Er zijn niet genoeg plaatsen.</p>";
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
