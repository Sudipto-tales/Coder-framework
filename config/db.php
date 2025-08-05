<?php
$db_type = 'sqlite'; // Options: sqlite, mysql, mongo

switch ($db_type) {
        case 'sqlite':
        $pdo = new PDO("sqlite:" . __DIR__ . '/../database/database.sqlite');
        break;

    case 'mysql':
        $host = 'localhost';
        $dbname = 'your_db';
        $user = 'root';
        $pass = '';
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        break;

    case 'mongo':
        require_once __DIR__ . '/../vendor/autoload.php';
        $mongoClient = new MongoDB\Client("mongodb://localhost:27017");
        $mongoDB = $mongoClient->selectDatabase('your_database');
        break;

    default:
        die("Unsupported database type: $db_type");
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// SQL-based reusable functions
function db_query($sql, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

function db_fetch_all($sql, $params = []) {
    return db_query($sql, $params)->fetchAll();
}

function db_fetch_one($sql, $params = []) {
    return db_query($sql, $params)->fetch();
}

function db_execute($sql, $params = []) {
    return db_query($sql, $params)->rowCount();
}

function db_last_insert_id() {
    global $pdo;
    return $pdo->lastInsertId();
}

// MongoDB helper functions (basic)
function mongo_find($collection, $filter = []) {
    global $mongoDB;
    return $mongoDB->$collection->find($filter)->toArray();
}

function mongo_insert($collection, $document) {
    global $mongoDB;
    return $mongoDB->$collection->insertOne($document);
}

function mongo_update($collection, $filter, $update) {
    global $mongoDB;
    return $mongoDB->$collection->updateMany($filter, ['$set' => $update]);
}

function mongo_delete($collection, $filter) {
    global $mongoDB;
    return $mongoDB->$collection->deleteMany($filter);
}
?>
