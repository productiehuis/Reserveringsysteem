<?php
    $currentTime = date("H:i");
    $currentDate = date("y-m-d")
?>
<div class="card mt-2 col-sm-3 container-sm">
    <img src="./img/placeholder.png" class="rounded mt-2 card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Kaart titel</h5>
        <p class="card-text">
            Lorem ipsum dolor sit amet.
        </p>
        <a href="#" class="btn btn-primary mb-2">Reserveren</a>
        <p class="card-text"><small class="text-muted">Laatste update <?php echo $currentTime . " " .  $currentDate?></small></p>
    </div>
</div>