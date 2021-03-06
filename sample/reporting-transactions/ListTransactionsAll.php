<?php

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\ReportingTransactions;

// ### List all transactions.
// Retrieve all the reporting transactions from object by calling the
// static `all` method on the ReportingTransaction class,
// Refer the method doc for valid values for keys
// (See bootstrap.php for more on `ApiContext`)
try {
    $params = array('page_size' => 1, 'start_date' => '2019-03-20T00:00:00-0700', 'end_date' => '2019-04-10T23:59:59-0700', 'fields' => 'all');

    $response = ReportingTransactions::all($params, $apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("List Payments", "Payment", null, $params, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
ResultPrinter::printResult("List transactions", "Payment", null, $params, $response);
ResultPrinter::printResult("Transaction details", "Payment", null, $params, $response->getTransactionDetails());
