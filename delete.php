<?php

$conn = mysqli_connect("localhost", "root", "", "inventory_db");

$sql = "DELETE FROM products WHERE product_id='$_POST[product_id]'";
$result = mysqli_query($conn, $sql);


if ($result) {
	header("Location: index.php?id=add-product#add-product");
} else {
	echo mysqli_error($conn);
}
