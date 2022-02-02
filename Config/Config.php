<?php
    const base_url = "http://localhost/MiniCore/Clientes";
    $jawsdb_url = parse_url(getenv("JAWSDB_URL"));
    /* const host = "localhost";
    const user = "root";
    const pass = "sd23";
    const db = "minicore";
    const charset = "charset=utf8mb4"; */
    $jawsdb_server = $jawsdb_url["host"];
    $jawsdb_username = $jawsdb_url["user"];
    $jawsdb_password = $jawsdb_url["pass"];
    $jawsdb_db = substr($jawsdb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
?>