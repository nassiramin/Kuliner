	<?php 
	include "koneksi.php";
	$get=mysql_query("SELECT * FROM jenis_pengguna"); 
	?>
	<div class="container">
		<div class="row">
			<h2>Log In</h2>
			<div class="login">
				
				<?php
				if(isset($_POST['login'])){
					include("koneksi.php");
					
					$username	= $_POST['username'];
					$password	= md5($_POST['password']);
					$id_jenis_pengguna		= $_POST['id_jenis_pengguna'];
					
					$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
					if(mysqli_num_rows($query) == 0){
						echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
					}else{
						$row = mysqli_fetch_assoc($query);
						
						if($row['level'] == 1 && $level == 1){
							$_SESSION['username']=$username;
							$_SESSION['level']='admin';
							header("Location: index.php");
						}else if($row['level'] == 2 && $level == 2){
							$_SESSION['username']=$username;
							$_SESSION['level']='user';
							header("Location: #");
						}
						else{
							echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
						}
					}
				}
				?>
				
				<form role="form" action="" method="post">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required autofocus />
					</div>
					
				<div class="form-group">
					<label class="col-form-label" for="jenis_pengguna">Jenis Pengguna </label>
					   <select  name="jenis_pengguna" class="form-control"> 
					    <option>Please Select</option>
					        <?php
					            while($row = mysql_fetch_assoc($get))
					            {
					            ?>
					            <option  value = "<?php echo($row['id_jenis_pengguna'])?>" >
					                <?php echo($row['nama_jenis_pengguna']) ?>
					            </option>
					            <?php
					            }               
					        ?>

					    </select>

					  </div>
					<div class="form-group">
						<input type="submit" name="login" class="btn btn-primary btn-block" value="Log me in" />
					</div>
				</form>
			</div>
			
		</div>
	</div>