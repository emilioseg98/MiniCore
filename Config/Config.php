<?php
    const base_url = "http://localhost/MiniCore/Clientes";
    $jawsdb_url = parse_url(getenv("JAWSDB_URL"));
    /* const host = "localhost";
    const user = "root";
    const pass = "sd23";
    const db = "minicore";
    const charset = "charset=utf8mb4"; */
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
    ?>
?>