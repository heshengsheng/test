<?php
require_once '/REXP/config.php';
require '/REXP/Connection.php';
$r = new Rserve_Connection(RSERVE_HOST);
$cmd = "YourFunction(ParaA,ParaB)";
$run = $r->evalString($cmd,Rserve_Connection::PARSER_NATIVE);
