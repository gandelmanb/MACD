<?php
if (!isset($_GET["stock_name"])) {
    echo "stock_name must be provided!";
    exit;
}

if (!isset($_GET["start_date"])) {
    echo "start_date must be provided!";
    exit;
}

if (!isset($_GET["end_date"])) {
    echo "end_date must be provided!";
    exit;
}

$script_name = "./MACD_TEMP.py";
$debug_script_name = "./MACD_DEBUG_TEMP.py";

$stock_name_val = $_GET["stock_name"];
$start_date = $_GET["start_date"];
$end_date = $_GET["end_date"];

if (isset($_GET["debug"])) {
	#phpinfo();
	file_put_contents($debug_script_name, "");
	file_put_contents($debug_script_name, fopen("https://raw.githubusercontent.com/icarpis/MACD/master/MACD_DEBUG.py", 'r'));
    $output = shell_exec("py ".$debug_script_name . " " . $stock_name_val . " " . $start_date . " " . $end_date);
    echo $output;
} else {
	file_put_contents($script_name, "");
	file_put_contents($script_name, fopen("https://raw.githubusercontent.com/icarpis/MACD/master/MACD.py", 'r'));
    $output = shell_exec("py ".$script_name . " " . $stock_name_val . " " . $start_date . " " . $end_date);
    echo $output;
}




