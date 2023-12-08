<?php

// Front controller logic
$action = $_GET['action'] ?? 'index';

require_once 'app/controllers/MedicalController.php';
$medicalController = new MedicalController();

// Dispatch to the appropriate action
if ($action === 'filter') {
    $medicalController->filter();
} else {
    $medicalController->index();
}