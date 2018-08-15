<?php
$pyscript = 'C:\\xampp\\htdocs\\estimasi\\visual.py';
$python = 'C:\\Users\\USER\\Anaconda2\\python.exe';
$cmd = "$python $pyscript";
echo $cmd;
echo "test";
echo "<br>";
exec("$cmd", $output);

foreach($output as $result) {
    echo $result, '<br>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Testing</title>
</head>
<body>

</body>
</html>