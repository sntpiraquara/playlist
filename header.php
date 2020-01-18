<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		table{
			border-collapse: collapse;
			width: 100%;
			border:1px solid #667;
		}
		thead{
			background: #ccc;
			border-top: 1px solid #a5a5a5;
			border-bottom: 1px solid #a5a5a5;
		}
		th:hover{
			background-color: transparent;
			color: inherit;
		}
		tr:nth-child(even){
			background-color: #edf5ff;
		}
		th{
			font-weight: normal;
			text-align: center;
		}
		th, td{
			padding: 0,9em;
			text-align: center;
			border: 1px solid #a5a5a5;
		}

	</style>
</head>

