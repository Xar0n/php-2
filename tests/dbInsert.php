<?php
require __DIR__ . '/../autoload.php';

use App\DB;

$db = new DB();
$result = $db->insert('articles', ['id' => null, 'title' => 'test new', 'lead' => 'test lead']);
var_dump($result);

