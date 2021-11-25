<?php

$conn = mysqli_connect("localhost", "root", "", "inventory_db");

$sql = "INSERT INTO products (product_name, product_price, product_category)
	VALUES('$_POST[product_name]', '$_POST[product_price]', '$_POST[product_category]')";

$result = mysqli_query($conn, $sql);

if ($result) {
	header("Location: index.php?id=add-product#add-product");
} else {
	echo mysqli_error($conn);
}
