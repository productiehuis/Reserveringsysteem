<?php include "../includes/header.php"; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Vertoningen toevoegen</li>
    </ol>
</nav>
<main>
    <h2 class="page-header">Vertoningen toevoegen</h2>
    <form method="POST" action="/reserveringsysteem/public/control/addPerformance.php">
        <table>
            <tr>
                <td>
                    Vertoningen titel:
                </td>
                <td>
                    <input type="text" name="title" required>
                </td>
            </tr>
            <tr>
                <td>
                    Locatie:
                </td>
                <td>
                    <input type="text" name="location" required>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td>
                    <textarea name="description" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Tijd:
                </td>
                <td>
                    <input type="time" name="time" required>
                </td>
            </tr>
            <tr>
                <td>
                    Datum:
                </td>
                <td>
                    <input type="date" name="date" required>
                </td>
            </tr>
            <tr>
                <td>
                    Maximum aantal zitplaatsen:
                </td>
                <td>
                    <input type="number" name="max" required>
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
