<?php

session_start();
session_destroy();
header("Location: ../front-end/landing-page.php");
exit;