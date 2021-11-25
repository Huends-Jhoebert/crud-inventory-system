<?php

$conn = mysqli_connect("localhost", "root", "", "inventory_db");
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
	<!-- MDB -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/style.css">
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="favicon/favicon.ico">
	<title>Inventory-System</title>
</head>

<body class="bg-white">

	<header>
		<!-- Intro settings -->
		<style>
			/* Default height for small devices */
			#intro-example {
				height: 400px;
			}

			/* Height for devices larger than 992px */
			@media (min-width: 992px) {
				#intro-example {
					height: 600px;
				}
			}
		</style>

		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarExample01">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item active">
							<a class="nav-link" aria-current="page" href="#">Home</a>
						</li>

						<li class="nav-item">
							<a class="btn btn-primary" style="background-color: #333333;" href="https://github.com/Huends-Jhoebert/crud-inventory-system" role="button" target="_blank"><i class="fab fa-github"></i></a>

						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Navbar -->

		<!-- Background image -->
		<div id="intro-example" class="p-5 text-center bg-image" style="background-image: url('images/logistics.svg');">
			<div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
				<div class="d-flex justify-content-center align-items-center h-100">
					<div class="text-white">
						<h1 class="mb-3">Inventory System</h1>
						<h5 class="mb-4">Add your precious product now</h5>
						<a class="btn btn-outline-light btn-lg m-2" href="#add-product" role="button" rel="nofollow">Start adding</a>

					</div>
				</div>
			</div>
		</div>
		<!-- Background image -->
	</header>

	<main class="pb-5">
		<div class="container p-0 bg-light shadow-3-strong mt-5">
			<div class="bg-info p-3 __container">
				<h1 class="text-center p-3 pb-0">INVENTORY SYSTEM</h1>
				<hr />
				<p class="text-center"> Jhoebert Huenda - Advanced Database Systems </p>
			</div>
			<button type="button" class="btn btn-success mt-3 ms-3 p-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
				<i class="fas fa-plus" id="add-product"></i> Add Product
			</button>
			<div class="row mt-3">
				<!-- Button trigger modal -->
				<div class="col">
					<div class="p-3 __table-div ">
						<table class="table table-hover text-center">
							<thead class="">
								<tr>
									<th>#</th>
									<th>Product ID</th>
									<th>Product Name</th>
									<th>Product Price</th>
									<th>Product Category</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($products as $key => $product) : ?>
									<tr>
										<th><?php echo $key + 1; ?></th>
										<td><?php echo $product['product_id']; ?></td>
										<td><?php echo $product['product_name']; ?></td>
										<td><?php echo "₱ " . $product['product_price']; ?></td>
										<td><?php echo $product['product_category']; ?></td>
										<td>
											<form style="display: inline-block;" action="delete.php" method="post">
												<input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
												<button type="submit" class="btn btn-danger btn-sm px-3">
													<i class="fas fa-times"></i>
												</button>
											</form>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content" style="background-color: #00AB6B;">
						<div class="modal-body mt-3 mb-4">

							<div class="w-75 p-5 pt-4 bg-light text-center" style="margin: 0 auto; border-radius: 5px;">
								<div>
									<i class="fas fa-cube" style="font-size: 3rem;"></i> <span class="fs-3 fw-meduim ps-2">Product</span>
								</div>
								<div class="__form-container mt-4">
									<form action="insert.php" method="post">
										<div class="form-outline mb-3">
											<input type="text" class="form-control bg-light" name="product_name" />
											<label class="form-label text-center">Product Name</label>
										</div>
										<div class="form-outline mb-3">
											<input type="number" class="form-control bg-light" name="product_price" />
											<label class="form-label">Product Price</label>
										</div>
										<div>
											<select class="w-100 p-1 bg-light form-select mb-3" name="product_category">
												<option value="SMARTHPONE">SMARTHPONE</option>
												<option value="LAPTOP">LAPTOP</option>
												<option value="SMARTWATCH">SMARTWATCH</option>
											</select>
										</div>
										<div class="d-grid gap-2">
											<button class="btn btn-lg btn-success" type="submit">Add PRoduct</button>
										</div>

									</form>
								</div>
							</div>

						</div>
						<div>

						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
		</div>
	</main>

</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"></script>

</html>



<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content bg-success">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">...</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
					Close
				</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div> -->