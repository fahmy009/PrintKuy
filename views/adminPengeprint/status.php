<!DOCTYPE html>
<html>
<head>
	<title>PrintKuy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron" style="background-color: white;">
			<div class="container text-center">
				<img src="./assets/img/printkuy.png">
			</div>
		</div>

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="#"><img src="assets/img/printkuy.png" style="width: 6vw; height: 100%;"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo $this->config['route']->getAlamatRoot().'?c=c_user&f=homePengeprint'?>">Print</a></li>
						<li class="active"><a href="<?php echo $this->config['route']->getAlamatRoot().'?c=c_user&f=statusPengeprint'?>">Status</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']; ?></a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Setting</a>
							<ul class="dropdown-menu">
								<li><a href="#" onclick="setData(<?php echo $_SESSION['id_users']; ?>)" data-toggle="modal" data-target="#modalSetting">Edit User</a></li>
								<li><a href="<?php echo $this->config['route']->getAlamatRoot().'?c=c_user&f=logout'?>#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

			<!-- MODAL -->
			<div class="modal fade" id="modalSetting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Users</h4>
						</div>
						<form method="POST" action="<?php echo $this->config['route']->getAlamatRoot().'?c=c_user&f=edit'?>">
							<div class="modal-body">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" name="username">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password">
								</div>
								<button type="submit" class="btn btn-default">Simpan</button>
								<input type="hidden" name="id_user" id="id">
							</div>
						</form>
					</div>
				</div>
			</div>
		</nav>
		<br>
		<div class="text-center">
			<table class="table">
				<thead style="color: white; background-color: #5D4B3E; border-color:  #5D4B3E;">
					<tr>
						<th class="text-center">Nomor</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Nama File</th>
						<th class="text-center">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						require './models/m_print.php';
						$model = new m_print();
						$print = $model->showAll();
						foreach ($print as $print) {
					 ?>
					<tr>
						<td><?php echo $print['id_print']; ?></td>
						<td><?php echo $print['tanggal']; ?></td>
						<td><?php echo $print['nama_file']; ?></td>
						<td><?php echo $print['status_print']; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>

<script>
	function setData(id) {
		var id_user = id;
			// alert(id);
			<?php 
			$model = new m_user();
			$users = $model->showAll();
			foreach ($users as $users) {
				echo "if (id_user==$users[id_users]) 
				{\$(\"#username\").val(\"$users[username]\");
				\$(\"#password\").val(\"$users[password]\");
				\$(\"#id\").val(\"$users[id_users]\");}";
			}
			?>
		}
	</script>
	</html>