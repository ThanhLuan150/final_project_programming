<?php 
include ('../connect/connect.dp.php');
function bill($id_users ,$note, $phone, $address){
    global $conn;
    $query = mysqli_query($conn, "INSERT INTO bills (id_users, note, phone, address) VALUES ($id_users, '$note', '$phone', '$address')");

}

function billSelect(){
    global $conn;
    $query1 = mysqli_query($conn, "SELECT * FROM bills");
    $rows = array();
    
    while ($row = mysqli_fetch_assoc($query1)) {
        $rows[] = $row;
    }
    
    return $rows;


}

function delProductsinCart(){
    global $conn; // Kết nối đến CSDL.
    $sql_carts = "DELETE FROM carts ";
    $result = mysqli_query($conn, $sql_carts);
}
    

// function billDetail($id,$quantity,$id_bils,$rent_prices,$id_bils,$tiencoc){
//     global $conn;
//     $query=mysqli_query($conn, "INSERT into bill_detail(id_clothes,quatity,id_bills,rent_prices,tiencoc) values('$id','$quantity',$id_bils,'$rent_prices','$tiencoc')");
//     $result = mysqli_query($conn, $query);
//     $row = mysqli_fetch_assoc($result); // Lấy kết quả truy vấn.
//     return $row;
// }
