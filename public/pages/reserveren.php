<?php include "../includes/header.php"; ?>
<main>
    <h2 class="page-header">
        Reserveren
    </h2>
    <form method="POST" action="/reserveringsysteem/public/control/addReservation.php">
        <table>
            <tr>
                <td>
                    Bezoeker naam:
                </td>
                <td>
                    <input type="text" name="name" required>
                </td>
            </tr>
            <tr>
                <td>
                    E-mail:
                </td>
                <td>
                    <input type="text" name="email" required>
                </td>
            </tr>
            <tr>
                <td>
                    Aantal bezoekers:
                </td>
                <td>
                    <input type="number" name="amount" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input type="hidden" name="showID" value="<?php echo $_GET["v"]?>">
                    <input class="btn-primary btn" type="submit" value="Toevoegen">
                </td>
            </tr>
        </table>
        <?php
        if (isset($_GET["s"]))
        {
            switch ($_GET["s"])
            {
                case "1":
                    echo "<p class='succes'>Reservering succesvol geplaatst, u ontvangt een bevestigingsmail.</p>";
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
</main>
<?php include "../includes/footer.php"; ?>
