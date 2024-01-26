<?php
$conn = new mysqli ("localhost", "root", "BAbalola2018","pgcgpa");

if ($conn->connect_error) {
    die ("server not found" . $conn->connect_error);
}
