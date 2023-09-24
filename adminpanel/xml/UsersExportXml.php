<?php
include "../../db.php";

$users= SELECT('SELECT * FROM user');
$now = DateTime::createFromFormat('U.u', microtime(true));
$now->format("Y-m-d H-i-s.u");
$filename = 'Users_' . $now->format("Y-m-d H-i-s") . '.xml';
$xml = new XMLWriter();
$xml->openMemory();
$xml->setIndent(true);
$xml->startDocument('1.0', 'UTF-8');
$xml->startElement('users');
foreach ($users as $user) {
    $xml->startElement('user');
    $xml->writeElement('id', $user['id']);
    $xml->writeElement('name', $user['name']);
    $xml->writeElement('login', $user['login']);
    $xml->writeElement('passwordHash', $user['passwordHash']);
    $xml->writeElement('profileImage', $user['profileImage']);
    // $xml->writeElement('isAdmin', $user['isAdmin']);
    $xml->writeElement('createDate', $user['createDate']);
    $xml->writeElement('updateDate', $user['updateDate']);
    $xml->endElement(); 
}
$xml->endElement(); 
$xml->endDocument();
header('Content-type: application/xml');
header('Content-Disposition: attachment; filename="' . $filename . '"');
echo $xml->outputMemory();

?>