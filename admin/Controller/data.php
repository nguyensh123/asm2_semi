<?php
// Lấy mảng dữ liệu từ database hoặc từ tệp khác
$data = array(
    array("label" => "Blue", "value" => 12.21),
    array("label" => "Red", "value" => 15.58),
    array("label" => "Yellow", "value" => 11.25),
    array("label" => "Green", "value" => 8.32)
);

// Trả về mảng dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
