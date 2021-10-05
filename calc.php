<?php
header('Content-Type: application/json');


const MIN_DEPOSIT_AMOUNT = 1000;
const MAX_DEPOSIT_AMOUNT = 3000000;
const MIN_DEPOSIT_TERM_MONTH = 1;
const MAX_DEPOSIT_TERM_MONTH = 60;
const MIN_AMOUNT_REPLENISHMENT = 0;
const MAX_AMOUNT_REPLENISHMENT = 3000000;
const MIN_INTEREST_RATE = 3;
const MAX_INTEREST_RATE = 100;

$errorMessages = [];
$json = file_get_contents('php://input');

try {
    $requestData = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
} catch (Exception) {
    $responseError =
        [
            'error' => 'Parse Error Json',
            'status' => '406',
            'data' => $GLOBALS['requestData'],
        ];
    echo json_encode($responseError);
    exit;
}

$date = new DateTime($requestData['startDate'] ?? '');
$depositAmount = (int)($requestData['sum'] ?? -1);
$termAmount = (int)($requestData['term'] ?? -1);
$percentAmount = (int)($requestData['percent'] ?? -1);
$sumAddAmount = (int)($requestData['sumAdd'] ?? 0);

if ($depositAmount < MIN_DEPOSIT_AMOUNT || $depositAmount > MAX_DEPOSIT_AMOUNT) {
    $errorMessages[] = 'The deposit amount is specified in the wrong boundaries';
}

if ($termAmount < MIN_DEPOSIT_TERM_MONTH || $termAmount > MAX_DEPOSIT_TERM_MONTH) {
    $errorMessages[] = 'The term of the deposit is specified in the wrong boundaries';
}

if ($percentAmount < MIN_INTEREST_RATE || $percentAmount > MAX_INTEREST_RATE) {
    $errorMessages[] = 'Interest rate specified in the wrong range';
}

if ($sumAddAmount < MIN_AMOUNT_REPLENISHMENT || $sumAddAmount > MAX_AMOUNT_REPLENISHMENT) {
    $errorMessages[] = 'The amount of replenishment of the deposit is indicated in the wrong boundaries';
}

if (!empty($errorMessages)) {
    $responseError =
        [
            "status" => "error",
            "message" => $errorMessages,
        ];
    echo json_encode($responseError);
    exit;
}

$resultSum = 0;
$accountAmount = $depositAmount;
for ($month = 1; $month <= $termAmount; $month++) {
    $accountAmount = round(
        $accountAmount + ($accountAmount + $sumAddAmount) * $date->format('t') * (($percentAmount / 100) / (365 + (int)$date->format('L'))),
        2);
    $date->modify('+1 month');
}

$resultResponse =
    [
        'sum' => $accountAmount,
    ];

echo json_encode($resultResponse);
