<html>
	<head>
		<title>ShotDev.Com Tutorial</title>
	</head>
<body>
<?php
	//*** Connect to MySQL Database ***//
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "php_excel_graph";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	//$objDB = mysql_select_db("mydatabase");
	
	$strSQL = "SELECT * FROM customer";
	//$objQuery = mysql_query($strSQL);
	
	$objQuery = $conn->query($strSQL);
	//echo $objQuery->num_rows;die;
	
	if ($objQuery->num_rows > 0) {
		//*** Get Document Path ***//
		$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp

		//*** File Name Gif,Jpeg,... ***//
		$FileName = "MyXls/MyChart.xls";
		
		//*** Connect to Excel.Application ***//
		$xlApp = new COM("Excel.Application");
		$xlBook = $xlApp->Workbooks->Add();

		$intStartRows = 3;
		$intEndRows = $result->num_rows + ($intStartRows-1);

		$xlSheet = $xlBook->Worksheets(1);

		$xlApp->Application->Visible = False;

		//*** Delete Sheet (2,3) - Sheet Default ***//
		$xlBook->Worksheets(2)->Select;
		$xlBook->Worksheets(2)->Delete;
		$xlBook->Worksheets(2)->Select;
		$xlBook->Worksheets(2)->Delete;
		
		//*** Sheet Data Rows ***//
		$xlBook->Worksheets(1)->Name = "MyReport";
		$xlBook->Worksheets(1)->Select;

		$xlBook->ActiveSheet->Cells(1,1)->Value = "My Customer";
		$xlBook->ActiveSheet->Cells(1,1)->Font->Bold = True;
		$xlBook->ActiveSheet->Cells(1,1)->Font->Name = "Tahoma";
		$xlBook->ActiveSheet->Cells(1,1)->Font->Size = 16;

		$xlBook->ActiveSheet->Cells(2,1)->Value = "Customer Name";
		$xlBook->ActiveSheet->Cells(2,1)->Font->Name = "Tahoma";
		$xlBook->ActiveSheet->Cells(2,1)->BORDERS->Weight = 1;
		$xlBook->ActiveSheet->Cells(2,1)->Font->Size = 10;
		$xlBook->ActiveSheet->Cells(2,1)->MergeCells = True;
		
		$xlBook->ActiveSheet->Cells(2,2)->Value = "Used";
		$xlBook->ActiveSheet->Cells(2,2)->BORDERS->Weight = 1;
		$xlBook->ActiveSheet->Cells(2,2)->Font->Name = "Tahoma";
		$xlBook->ActiveSheet->Cells(2,2)->Font->Size = 10;
		$xlBook->ActiveSheet->Cells(2,2)->MergeCells = True;

		//*** Data Rows ***//
		$i = 0;
		//While($result = mysql_fetch_array($objQuery)){
		
		while($row = $result->fetch_assoc()) {
			echo "<pre>";
			print_r($row);
			echo "<pre>";
			
			/* $xlBook->ActiveSheet->Cells($intStartRows+$i,1)->Value = $result["Name"];
			$xlBook->ActiveSheet->Cells($intStartRows+$i,2)->Value = $result["Used"];
			$xlBook->ActiveSheet->Cells($intStartRows+$i,2)->NumberFormat = "$#,##0.00"; */
			$i++;
		}
		//*** End Data Rows ***//
die;
		//*** Creating Chart ***//
		$xlBook->Charts->Add;
		$xlBook->ActiveChart->Name = "MyChart";
		$xlBook->ActiveChart->ChartType = 54;
		$xlBook->ActiveChart->SetSourceData ($xlBook->Sheets("MyReport")->Range("A".$intStartRows.":B".$intEndRows.""));
			
		//*** Sheet Properties ***//
		$xlBook->ActiveChart->HasTitle = True;
		$xlBook->ActiveChart->ChartTitle->Characters->Text = "My Chart";
		
		//*** Save Excel ***//
		@unlink($strPath."/".$FileName);
		$xlBook->SaveAs($strPath."/".$FileName);

		$xlApp->Application->Quit;
	}		
?>
Excel Created <a href="<?=$FileName?>">Click here</a> to Download.
</body>
</html>
<!--- This file download from www.shotdev.com -->