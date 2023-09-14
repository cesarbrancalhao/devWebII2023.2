<?php

require_once("util/Connection.php");

$conn = Connection::getConnection();
print_r($conn);