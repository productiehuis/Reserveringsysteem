<?php include "../includes/header.php"; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Vertoningen toevoegen</li>
    </ol>
</nav>
<main>
    <h2 class="page-header">Vertoningen toevoegen</h2>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="overzicht.php" type="button" class="btn btn-primary active"><i class="bi bi-calendar-check"></i> Overzicht</a>
        <a href="archief.php" type="button" class="btn btn-primary"><i class="bi bi-archive"></i> Archief</a>
        <a href="vertoning.php" type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Toevoegen</a>
    </div>
    <form method="POST" action="/reserveringsysteem/public/control/addPerformance.php">
        <table>
            <tr>
                <td>
                    Vertoningen titel:
                </td>
                <td>
                    <label>
                        <input type="text" name="title" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Locatie:
                </td>
                <td>
                    <label>
                        <input type="text" name="location" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <label>
                        <textarea rows="5" cols="40" name="description" required></textarea>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Tijd:
                </td>
                <td>
                    <label>
                        <input type="time" name="time" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Datum:
                </td>
                <td>
                    <label>
                        <input type="date" name="date" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Maximum aantal zitplaatsen:
                </td>
                <td>
                    <label>
                        <input type="number" name="max" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
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
                    echo "<p class='succes'>Vertoning succesvol toegevoegd.</p>";
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
