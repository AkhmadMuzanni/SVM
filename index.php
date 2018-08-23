<?php
$pyscript = 'C:\\xampp\\htdocs\\estimasi\\training_SVR.py';
$python = 'C:\\Users\\USER\\Anaconda2\\python.exe';
$cmd = "$python $pyscript";
echo $cmd;
echo "test";
echo "<br>";
//exec("$cmd", $output);
//$input_str = shell_exec("python -c \"import training_SVR; print training_SVR.get_input_data()\"");

$input = json_decode(shell_exec("python -c \"import training_SVR; print training_SVR.get_input_data()\""), true);
print_r($input);
echo "<br>";

// $input = explode("[",$input_str);
// print_r($input);
// echo "<br>";
// $jarak_str = shell_exec("python -c \"import training_SVR; print training_SVR.get_distance()\"");
// echo $jarak_str;
// echo "<br>";
// $hessian_str = shell_exec("python -c \"import training_SVR; print training_SVR.get_hessian()\"");
// echo $hessian_str;


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
	<table>
		<tr>
			<td>Luas Tanam (X1)</td>
			<td>Jumlah Penduduk (X2)</td>
			<td>Luas Lahan (X3)</td>
			<td>Produksi (Y)</td>
		</tr>
		<?php foreach ($input as $i) {
			echo '<tr>';
			echo '<td>'.$i[0].'</td>';
			echo '<td>'.$i[1].'</td>';
			echo '<td>'.$i[2].'</td>';
			echo '<td>'.$i[3].'</td>';
			echo '</tr>';
		}
		?>
	</table>
</body>
</html>