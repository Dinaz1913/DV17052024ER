<?php

/**
 * Currency Converter
 *
 * This script converts currency from one currency to another using an external API.
 */

declare(strict_types=1);

$sourceForCurrency = "https://latest.currency-api.pages.dev/v1/currencies/eur.json";
$currencyFrom = trim(strtolower(readline("Currency From(eur,aud):")));
$currencyToConvert = trim(strtolower(readline("Currency To(gbp,usd):")));
$urlAddress = "https://latest.currency-api.pages.dev/v1/currencies/$currencyFrom.json";
$data = "";


if (file_get_contents($urlAddress) !== false) {
    $data = json_decode(file_get_contents($urlAddress), true);
}

if ((string)isset($data[$currencyFrom][$currencyToConvert])) {

    $conversion = $data[$currencyFrom][$currencyToConvert];
    $amount = $conversion * (int)trim(readline("Enter amount of currency:"));

    echo "\n\n";
    echo "The price of '$currencyFrom' in '$currencyToConvert' is $conversion $currencyToConvert \n";
    echo "And your total converted money is $amount $currencyToConvert\n";
    echo "\n\n";

}




