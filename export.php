<?php
//include_once('loginchk.php');
include_once('db.php');
$conn1=getconnection();

$dept=17;
$year=21;

$table = "form1_main"; 
$filename = "form1_export"; 
$stm = $conn1->prepare("SELECT a.pac_code, a.title, b.budget_allocated, b.budget_utilized, b.fin_year_start, b.fin_year_end FROM project_registration as a JOIN financial_year as b ON a.id = b.project_id WHERE b.fin_year_end = 21 AND a.constituent_unit = 17");
$stm->execute();
// $result = mysqli_query($conn,$sql) or die("Couldn't execute query:<br>" . mysqli_error(). "<br>" . mysqli_errno()); 
$file_ending = "xls";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache"); 
header("Expires: 0");
$sep = "\t"; 

for ($i = 0; $i < $stm->columnCount(); $i++) {
    $col = $stm->getColumnMeta($i);
    $names[] = $col['name'];
}
foreach($names as $name){
    print ($name . $sep);
    }
print("\n");
while($row = $stm->fetchAll()) {
    $schema_insert = "";
    for($j=0; $j<$stm->columnCount();$j++) {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= $row[$j].$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}
?>