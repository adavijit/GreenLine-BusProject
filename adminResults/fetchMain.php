<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "project");
$columns = array('dates','bus_route','bus_no','driver_name','pump_name','fuel_taken','rate_on_date','distance_covered','chalan_no','oil_cost','amount_paid','due_payment','milage');


$query = "SELECT * FROM main_input WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'dates BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (bus_no LIKE "%'.$_POST["search"]["value"].'%"
  OR bus_route LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY bus_no DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();
$tot_fuel_amt = 0;
$ltr = 0;
$amt_paid =0;
$tot_due = 0;
$ix=0;
while($row = mysqli_fetch_array($result))
{
  $ix=$ix+1;
  $amt_paid = $amt_paid + $row['amount_paid'];
$ltr = $ltr + $row['fuel_taken'];
$tot_fuel_amt = $tot_fuel_amt + $row['oil_cost'];
$tot_due = $tot_due + $row['due_payment'];
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="dates">' . $row["dates"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="bus_route">' . $row["bus_route"] . '</div>';
   $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="bus_no">' . $row["bus_no"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="driver_name">' . $row["driver_name"] . '</div>';
     $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="pump_name">' . $row["pump_name"] . '</div>';
      $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="fuel_taken">' . $row["fuel_taken"] . '</div>';
       $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="rate_on_date">' . $row["rate_on_date"] . '</div>';
        $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="distance_covered">' . $row["distance_covered"] . '</div>';
         $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="chalan_no">' . $row["chalan_no"] . '</div>';
          $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="oil_cost">' . $row["oil_cost"] . '</div>';
           $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="amount_paid">' . $row["amount_paid"] . '</div>';
            $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="due_payment">' . $row["due_payment"] . '</div>';
             $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="milage">' . $row["milage"] . '</div>';

 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';

if($ix==$number_filter_row){
  $sub_array[]="<b>Total Fuel (ltr)</b>"."<br>".$ltr."<br>"."<b>Total Oil Cost</b>"."<br>".$tot_fuel_amt."<br>"."<b>Total Paid (Rs)</b>"."<br>".$amt_paid."<br>"."<b>Total Due(Rs)</b>"."<br>".$tot_due;
}
else{
    $sub_array[]="_";
}


 $data[] = $sub_array;


}

function get_all_data($connect)
{
 $query = "SELECT * FROM main_input";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data


);



echo json_encode($output);


?>
