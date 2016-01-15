<div id="header-wrapper">	
	<div class="container">
		<div class="row">
		<?php print "<a href='/' style='float:left' class='btn btn-primary'>Save the Hippos</a>";
			if(isset($_SESSION['username'])){
				print '<a href="/post.php" style="float:left" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>New Post</a>';
			}
		 ?>
			<div id='button-wrapper' style="float:right">
				<?php
					if(isset($_SESSION['username'])){
						print '<div class="white-text">Welcome Back, <a href="user.php?user='.$_SESSION['uid'].'">' . $_SESSION['username'] . '</a></div>&nbsp &nbsp &nbsp';
						print '<a href="/index.php?logout=true" class="btn btn-danger">Logout</a>';
					}else{
						print '<a href="/login.php" class="btn btn-primary">Login</a>';
						print '<a href="/signup.php" class="btn btn-success">Register</a>';
					}
				?>
			</div>
		
		</div>
	</div>
</div>