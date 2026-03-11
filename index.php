<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require_once 'Database.php';
require_once 'VisitorModel.php';

$db = new Database();
$visitorModel = new VisitorModel($db);

$isLoggedIn = $_SESSION['is_logged_in'] ?? false;
$isRegistrated = $_SESSION['registrated'] ?? false;

if($isRegistrated) {
	$name = $_SESSION['name'];
	unset($_SESSION['registrated']);
	unset($_SESSION['name']);
}

if($isLoggedIn) {
 
	if(isset($_GET['clear_all'])) {

		$visitorModel->deleteAll();

		header("Location: index.php");
		exit;
	}

	if(isset($_GET['delete_id'])) {

		$idToDelete = (int)$_GET['delete_id'];
		$visitorModel->delete($idToDelete);

		header("Location: index.php");
		exit;
	}

	$logItems = $visitorModel->getAll();
	$message = "Вітаю, {$_SESSION['user_name']}";

} 



require 'view.php';
