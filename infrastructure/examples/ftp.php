<?php

$ftp_server = "127.0.0.1";
$ftp_user = "r2d2";
$ftp_pass = "r2d2";

$con = ftp_connect($ftp_server);

$login_result = ftp_login($con, $ftp_user, $ftp_pass);

print_r(json_encode([$login_result]));echo "\n\n";

$pwd = ftp_raw($con, "pwd");

print_r(json_encode([$pwd]));echo "\n\n";

ftp_close($con);
