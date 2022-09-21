<?php
session_destroy();

unset($_SESSION["Username"]);

if (isset($_SESSION["Username"]))
{
    echo "Session set";
}
else
{
    echo "Not set";
}
