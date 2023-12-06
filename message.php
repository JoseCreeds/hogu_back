<?php

//For using, we should include the name of the file in the wiew's page
if (isset($_SESSION['message'])) {
    echo "<h5>" . $_SESSION['message'] . "</h5>";
    unset($_SESSION['message']);
}
