<?php 
$con = mysqli_connect("localhost", "root", "", "crud-sederhana");

// $data = mysqli_query($con, "SELECT * FROM barang");
// $rows = [];
// while($row = mysqli_fetch_assoc($data)){
//   $rows[]=$row;
// }

function query($query){
  global $con;
  $result = mysqli_query($con, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
};

?>