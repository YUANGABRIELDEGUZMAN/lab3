<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Cycle Admin</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Roboto:400,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <div class="top_contact-container">
        </div>
      </div>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.html">
            <img src=" " alt="">
            <span>
              Cycle
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center w-100 justify-content-between">
              <ul class="navbar-nav  ">
                <li class="nav-item">
                  <a class="nav-link" href="index.html"> <b>Cycle</b></a>
                </li>
              </ul>
              <form class="form-inline ">
                <input type="search" placeholder="Search">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
              <div class="login_btn-contanier ml-0 ml-lg-5">
                <a href="/logout">
                  <img src="images/user.png" alt="">
                  <span href="/logout">
                    Logout
                  </span>
                </a>
              </div>
            </div>
          </div>

        </nav>
      </div>
    </header>





<?= view('/adminfile/design'); ?>


<body>

  <!--table items-->
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">


        <!--add items-->
        <div id="addEmployeeModal">
                        <div class="edit">
                            <form method="post" action="/save" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="image">Product Image</label>
                      <input type="hidden" name="id" value="<?= isset($pro['id']) ? $pro['id'] : '' ?>">
                                        <input type="file" class="form-control-file" id="image" name="image"
                                            accept="image/*" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required
                                            value="<?= isset($pro['name']) ? $pro['name'] : '' ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"
                                            required><?= isset($pro['description']) ? $pro['description'] : '' ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" id="price" name="price" required
                                            value="<?= isset($pro['price']) ? $pro['price'] : '' ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin" class="btn btn-secondary" style="background-color: #ff6316;">Cancel</a>
                                    <button type="submit" class="btn btn-success" style="background-color: #17a2b8;">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

				<table class="table table-striped table-hover" style="background-color: #17a2b8;">
					<thead>
						<tr style="color: #ffffff;">

							<th>Image</th>
							<th>Item Name</th>
							<th>Item Description</th>
							<th>Item Price</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php if (isset($items)):
							foreach ($items as $item): ?>
								<tr>

									<td><img src="/uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" width="100"></td>

									<td>
										<?= $item['name']; ?>
									</td>
									<td>
										<?= $item['description']; ?>
									</td>
									<td>
										<?= $item['price']; ?>
									</td>
									<td>
										<a href="/edit/<?= $item['id'] ?>" class="edit"><i
												class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></a>
										<a href="/delete/<?= $item['id'] ?>" class="delete"><i data-toggle="tooltip" class="material-icons"
												title="Delete">&#xE872;</i></a>
									</td>
								</tr>
							<?php endforeach; else: ?>
							<tr>
								<td colspan="4">No items found</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
				<div class="clearfix">
					<!-- <ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul> -->
				</div>
			</div>
		</div>
	</div>
</body>

</html>
