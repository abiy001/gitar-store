<?php 
include "koneksi.php";

function tampilkan($query) {
    global $koneksi;
    $result = mysqli_query($koneksi,$query);

    while($data = mysqli_fetch_assoc($result)) {
        $items[] = array(
            'id' => $data["id"],
            'name' => $data["name"],
            'brand' => $data["brand"],
            'stock' => $data["stock"],
            'photo' => $data["photo"],
            'description' => $data["description"],
            'price' => $data["price"],
        );
        $response = array(
            'status' => 'ok',
            'items' => $items,
        );

        return $response;
        
    }
}
?>