<?php
$pyscript = 'C:\\xampp\\htdocs\\estimasi\\training_SVR.py';
$python = 'C:\\Users\\USER\\Anaconda2\\python.exe';
$cmd = "$python $pyscript";
echo $cmd;
echo "test";
echo "<br>";
//exec("$cmd", $output);
$output = shell_exec("python -c \"import training_SVR; print training_SVR.get_prediksi()\"");
var_dump($output);
//echo "python -c \"import training_SVR; print training_SVR.get_prediksi()\""

//foreach($output as $result) {
//    echo $result, '<br>';
//}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Testing</title>
</head>
<body>

</body>
</html>