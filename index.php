<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The dream</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <p id="titleContent">Currencies converter</p>
    <div id="formContent">
        <form>
            <div id="amountDiv">
                <label id="mainLabels" for="amount">Enter money amount :</label>
                <input type="text" id="moneyAmount" name="amount" placeholder="Amount" value="<?php if (isset($_GET['amount'])){ echo $_GET['amount']; }; ?>">
            </div>
            
            <br><br>
            <label id="mainLabels">Choose currencies :</label>
            <br>
            <div id="selects">
                <label class="secondaryLabels" id="secondaryLabels1" for="currencyFrom">From :</label>
                <label class="secondaryLabels" id="secondaryLabels2" for="currencyTo">To :</label>

                <select id="currencyFrom" name="currencyFrom">
                <option value="EUR" <?php if (isset($_GET['currencyFrom']) && $_GET['currencyFrom'] == "EUR") {echo ' selected="selected"';} ?>>Euros (EUR)</option>
                <option value="USD" <?php if (isset($_GET['currencyFrom']) && $_GET['currencyFrom'] == "USD") {echo ' selected="selected"';} ?>>Americain Dollars (USD)</option>
                <option value="CAD" <?php if (isset($_GET['currencyFrom']) && $_GET['currencyFrom'] == "CAD") {echo ' selected="selected"';} ?>>Canadian Dollars (CAD)</option>
                <option value="AUD" <?php if (isset($_GET['currencyFrom']) && $_GET['currencyFrom'] == "AUD") {echo ' selected="selected"';} ?>>Australian Dollars (AUD)</option>
                <option value="GBP" <?php if (isset($_GET['currencyFrom']) && $_GET['currencyFrom'] == "GBP") {echo ' selected="selected"';} ?>>Great-Britain Pounds (GBP)</option>
                <option value="EGP" <?php if (isset($_GET['currencyFrom']) && $_GET['currencyFrom'] == "EGP") {echo ' selected="selected"';} ?>>Egyptian Pounds (EGP)</option>
                <option value="JPY" <?php if (isset($_GET['currencyFrom']) && $_GET['currencyFrom'] == "JPY") {echo ' selected="selected"';} ?>>Japanese Yens (JPY)</option>
                <option value="CLP" <?php if (isset($_GET['currencyFrom']) && $_GET['currencyFrom'] == "CLP") {echo ' selected="selected"';} ?>>Chilean Pesos (CLP)</option>
                <option value="COP" <?php if (isset($_GET['currencyFrom']) && $_GET['currencyFrom'] == "COP") {echo ' selected="selected"';} ?>>Colobian Pesos (CUP)</option>
                <option value="MXN" <?php if (isset($_GET['currencyFrom']) && $_GET['currencyFrom'] == "MXN") {echo ' selected="selected"';} ?>>Mexicain Pesos (MXN)</option>
                </select>

                <select id="currencyTo" name="currencyTo">
                <option value="EUR" <?php if (isset($_GET['currencyTo']) && $_GET['currencyTo'] == "EUR") {echo ' selected="selected"';} ?>>Euros (EUR)</option>
                <option value="USD" <?php if (isset($_GET['currencyTo']) && $_GET['currencyTo'] == "USD") {echo ' selected="selected"';} ?>>Americain Dollars (USD)</option>
                <option value="CAD" <?php if (isset($_GET['currencyTo']) && $_GET['currencyTo'] == "CAD") {echo ' selected="selected"';} ?>>Canadian Dollars (CAD)</option>
                <option value="AUD" <?php if (isset($_GET['currencyTo']) && $_GET['currencyTo'] == "AUD") {echo ' selected="selected"';} ?>>Australian Dollars (AUD)</option>
                <option value="GBP" <?php if (isset($_GET['currencyTo']) && $_GET['currencyTo'] == "GBP") {echo ' selected="selected"';} ?>>Great-Britain Pounds (GBP)</option>
                <option value="EGP" <?php if (isset($_GET['currencyTo']) && $_GET['currencyTo'] == "EGP") {echo ' selected="selected"';} ?>>Egyptian Pounds (EGP)</option>
                <option value="JPY" <?php if (isset($_GET['currencyTo']) && $_GET['currencyTo'] == "JPY") {echo ' selected="selected"';} ?>>Japanese Yens (JPY)</option>
                <option value="CLP" <?php if (isset($_GET['currencyTo']) && $_GET['currencyTo'] == "CLP") {echo ' selected="selected"';} ?>>Chilean Pesos (CLP)</option>
                <option value="COP" <?php if (isset($_GET['currencyTo']) && $_GET['currencyTo'] == "COP") {echo ' selected="selected"';} ?>>Colobian Pesos (CUP)</option>
                <option value="MXN" <?php if (isset($_GET['currencyTo']) && $_GET['currencyTo'] == "MXN") {echo ' selected="selected"';} ?>>Mexicain Pesos (MXN)</option>
                </select>
            </div>

            <input type="submit" id="convertBtn" name="submit" value="Convert">
        </form>
        <div id="resultDiv">
            <p id="result"> 
                <?php
                    if (isset($_GET['amount'])){
                        if(is_numeric($_GET['amount'])){
                            $amountToConvert = $_GET['amount'];
                            $currencyFrom = $_GET['currencyFrom'];
                            $currencyTo = $_GET['currencyTo'];
    
                            $result = $_GET['amount'] * GetCurrencyRate($currencyFrom, $currencyTo);
    
                            echo "$amountToConvert $currencyFrom → $result $currencyTo";
                        }
                        else{
                            echo "Invalid input amount";
                        }
                    };
                ?>
            </p>
            <p id="time">(based on the currencies values on 1st July 2022 at 9:00 (UTC+2))</p>
        </div>
    </div>

    <?php
        function GetCurrencyRate($currency1, $currency2){
            $currencyRate = 0;

            switch ($currency1) {
                case "EUR":
                    switch ($currency2) {
                        case "EUR": $currencyRate = 1; break;
                        case "USD": $currencyRate = 1.05; break;
                        case "CAD": $currencyRate = 1.35; break;
                        case "AUD": $currencyRate = 1.54; break;
                        case "GBP": $currencyRate = 0.86; break;
                        case "EGP": $currencyRate = 19.65; break;
                        case "JPY": $currencyRate = 141.74; break;
                        case "CLP": $currencyRate = 958.48; break;
                        case "COP": $currencyRate = 4340.01; break;
                        case "MXN": $currencyRate = 21.12; break;
                        default : $currencyRate = 0;
                    }
                break;

                case "USD":
                    switch ($currency2) {
                        case "EUR": $currencyRate = 0.96; break;
                        case "USD": $currencyRate = 1; break;
                        case "CAD": $currencyRate = 1.29; break;
                        case "AUD": $currencyRate = 1.47; break;
                        case "GBP": $currencyRate = 0.83; break;
                        case "EGP": $currencyRate = 18.80; break;
                        case "JPY": $currencyRate = 135.56; break;
                        case "CLP": $currencyRate = 916.75; break;
                        case "COP": $currencyRate = 4151.37; break;
                        case "MXN": $currencyRate = 20.21; break;
                        default : $currencyRate = 0;
                    }
                break;

                case "CAD":
                    switch ($currency2) {
                        case "EUR": $currencyRate = 0.74; break;
                        case "USD": $currencyRate = 0.77; break;
                        case "CAD": $currencyRate = 1; break;
                        case "AUD": $currencyRate = 1.14; break;
                        case "GBP": $currencyRate = 0.64; break;
                        case "EGP": $currencyRate = 14.56; break;
                        case "JPY": $currencyRate = 104.95; break;
                        case "CLP": $currencyRate = 709.79; break;
                        case "COP": $currencyRate = 3214.20; break;
                        case "MXN": $currencyRate = 15.64; break;
                        default : $currencyRate = 0;
                    }
                break;
                
                case "AUD":
                    switch ($currency2) {
                        case "EUR": $currencyRate = 0.65; break;
                        case "USD": $currencyRate = 0.68; break;
                        case "CAD": $currencyRate = 0.88; break;
                        case "AUD": $currencyRate = 1; break;
                        case "GBP": $currencyRate = 0.56; break;
                        case "EGP": $currencyRate = 12.80; break;
                        case "JPY": $currencyRate = 92.28; break;
                        case "CLP": $currencyRate = 624.11; break;
                        case "COP": $currencyRate = 2826.17; break;
                        case "MXN": $currencyRate = 13.76; break;
                        default : $currencyRate = 0;
                    }
                break;

                case "GBP":
                    switch ($currency2) {
                        case "EUR": $currencyRate = 1.16; break;
                        case "USD": $currencyRate = 1.21; break;
                        case "CAD": $currencyRate = 1.56; break;
                        case "AUD": $currencyRate = 1.78; break;
                        case "GBP": $currencyRate = 1; break;
                        case "EGP": $currencyRate = 22.75; break;
                        case "JPY": $currencyRate = 164.03; break;
                        case "CLP": $currencyRate = 1109.73; break;
                        case "COP": $currencyRate = 5024.26; break;
                        case "MXN": $currencyRate = 24.45; break;
                        default : $currencyRate = 0;
                    }
                break;

                case "EGP":
                    switch ($currency2) {
                        case "EUR": $currencyRate = 0.051; break;
                        case "USD": $currencyRate = 0.053; break;
                        case "CAD": $currencyRate = 0.069; break;
                        case "AUD": $currencyRate = 0.078; break;
                        case "GBP": $currencyRate = 0.044; break;
                        case "EGP": $currencyRate = 1; break;
                        case "JPY": $currencyRate = 7.21; break;
                        case "CLP": $currencyRate = 48.78; break;
                        case "COP": $currencyRate = 220.91; break;
                        case "MXN": $currencyRate = 1.08; break;
                        default : $currencyRate = 0;
                    }
                break;

                case "JPY":
                    switch ($currency2) {
                        case "EUR": $currencyRate = 0.0071; break;
                        case "USD": $currencyRate = 0.0074; break;
                        case "CAD": $currencyRate = 0.0095; break;
                        case "AUD": $currencyRate = 0.011; break;
                        case "GBP": $currencyRate = 0.0061; break;
                        case "EGP": $currencyRate = 0.14; break;
                        case "JPY": $currencyRate = 1; break;
                        case "CLP": $currencyRate = 6.76; break;
                        case "COP": $currencyRate = 30.63; break;
                        case "MXN": $currencyRate = 0.15; break;
                        default : $currencyRate = 0;
                    }
                break;

                case "CLP":
                    switch ($currency2) {
                        case "EUR": $currencyRate = 0.001; break;
                        case "USD": $currencyRate = 0.0011; break;
                        case "CAD": $currencyRate = 0.0014; break;
                        case "AUD": $currencyRate = 0.0016; break;
                        case "GBP": $currencyRate = 0.0009; break;
                        case "EGP": $currencyRate = 0.02; break;
                        case "JPY": $currencyRate = 0.15; break;
                        case "CLP": $currencyRate = 1; break;
                        case "COP": $currencyRate = 4.44; break;
                        case "MXN": $currencyRate = 0.022; break;
                        default : $currencyRate = 0;
                    }
                break;

                case "COP":
                    switch ($currency2) {
                        case "EUR": $currencyRate = 0.00023; break;
                        case "USD": $currencyRate = 0.00024; break;
                        case "CAD": $currencyRate = 0.00032; break;
                        case "AUD": $currencyRate = 0.00036; break;
                        case "GBP": $currencyRate = 0.0002; break;
                        case "EGP": $currencyRate = 0.0046; break;
                        case "JPY": $currencyRate = 0.033; break;
                        case "CLP": $currencyRate = 0.22; break;
                        case "COP": $currencyRate = 1; break;
                        case "MXN": $currencyRate = 0.0049; break;
                        default : $currencyRate = 0;
                    }
                break;

                case "MXN":
                    switch ($currency2) {
                        case "EUR": $currencyRate = 0.047; break;
                        case "USD": $currencyRate = 0.05; break;
                        case "CAD": $currencyRate = 0.064; break;
                        case "AUD": $currencyRate = 0.073; break;
                        case "GBP": $currencyRate = 0.041; break;
                        case "EGP": $currencyRate = 0.93; break;
                        case "JPY": $currencyRate = 6.71; break;
                        case "CLP": $currencyRate = 45.40; break;
                        case "COP": $currencyRate = 205.60; break;
                        case "MXN": $currencyRate = 1; break;
                        default : $currencyRate = 0;
                    }
                break;

                default : $currencyRate = 0;
            }

            return $currencyRate;
        }
    ?>

</body>
</html>