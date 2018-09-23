<?php
require_once("action/dp_connect.php");
require_once("includes/header.php");


$sql = "SELECT * FROM `sale`";
$result = $connect->query($sql);



$totalmonth = array(12);
for ($i=0; $i < 12; $i++) 
{ 
	$totalmonth[$i] = 0;
}
$numbermonth = array(12);
for ($i=0; $i < 12; $i++) 
{ 
	$numbermonth[$i] = 0;
}
while($row = $result->fetch_assoc())
{
	$month = date("n",strtotime($row["sale_date"]));
	switch ($month) {
		case 1:
			$totalmonth[0] += $row["total_amount"];
			$numbermonth[0] ++;
			break;
		case 2:
			$totalmonth[1] += $row["total_amount"];
			$numbermonth[1] ++;
			break;
		case 3:
			$totalmonth[2] += $row["total_amount"];
			$numbermonth[2] ++;
			break;
		case 4:
			$totalmonth[3] += $row["total_amount"];
			$numbermonth[3] ++;
			break;
		case 5:
			$totalmonth[4] += $row["total_amount"];
			$numbermonth[4] ++;
			break;
		case 6:
			$totalmonth[5] += $row["total_amount"];
			$numbermonth[5] ++;
			break;
		case 7:
			$totalmonth[6] += $row["total_amount"];
			$numbermonth[6] ++;
			break;
		case 8:
			$totalmonth[7] += $row["total_amount"];
			$numbermonth[7] ++;
			break;
		case 9:
			$totalmonth[8] += $row["total_amount"];
			$numbermonth[8] ++;
			break;
		case 10:
			$totalmonth[9] += $row["total_amount"];
			$numbermonth[9] ++;
			break;
		case 11:
			$totalmonth[10] += $row["total_amount"];
			$numbermonth[10] ++;
			break;
		case 12:
			$totalmonth[11] += $row["total_amount"];
			$numbermonth[11] ++;
			break;								
		default:
			
			break;
	}
}
echo "<h2>Monthly Sales Report</h2><hr \>";
echo"<table border='1em' class='table table-bordered table-striped table-hover'>";
echo"
<tr>
  <td>Month</td>
  <td>Number of Sales</td>
  <td>Total Sales Amount</td>
</tr>";
for ($i=1; $i < 13; $i++) 
{ 
	echo"
    <tr>
        <td>".$i."</td>
        <td>".$numbermonth[$i-1]."</td>
        <td>".$totalmonth[$i-1]."</td>
    </tr>";
}


echo"</table>";

if (isset($_GET['csv'])) 
{
	
	ob_end_clean();

	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=monthly_sales_2018.csv');

	$output = fopen('php://output', 'w');

	$months = array('Month','January','February','March','April','May','June','July','August','September','October','November','December');

	array_unshift($totalmonth, 'Total Sales Amount');
	array_unshift($numbermonth, 'Number of Sales');

	fputcsv($output, $months);
	fputcsv($output, $numbermonth);
	fputcsv($output, $totalmonth);

	exit();

}

echo "<a href='monthly_sales.php?csv=true'>Export to csv</a>";


?>

<!--put your content hereeeeeeeeeeeeeee-->

<?php

require_once("includes/footer.php"); ?>