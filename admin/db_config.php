<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'seuri_dental');

function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8mb4");
    
    return $conn;
}

function escapeString($conn, $string) {
    return $conn->real_escape_string($string);
}

function query($sql) {
    $conn = getDBConnection();
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function fetchAll($sql) {
    $conn = getDBConnection();
    $result = $conn->query($sql);
    $data = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    $conn->close();
    return $data;
}

function fetchOne($sql) {
    $conn = getDBConnection();
    $result = $conn->query($sql);
    $data = null;
    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
    }
    $conn->close();
    return $data;
}

function fetchAllPrepared($query, $types = '', $params = []) {
    $conn = getDBConnection();
    $stmt = $conn->prepare($query);
    if ($types && !empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    $conn->close();
    return $data;
}

function fetchOnePrepared($query, $types = '', $params = []) {
    $conn = getDBConnection();
    $stmt = $conn->prepare($query);
    if ($types && !empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->num_rows > 0 ? $result->fetch_assoc() : null;
    $stmt->close();
    $conn->close();
    return $data;
}
?>
