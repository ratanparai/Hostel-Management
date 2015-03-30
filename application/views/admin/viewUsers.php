<!--  Page Content -->
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Login Panel</h4>
				</div>
				<table class="table">
					<tr>
						<th>user id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Password</th>
					</tr>
					<?php foreach($this->users as $user) {?>
					<tr>
						<td><?php echo $user->user_name; ?></td>
						<td><?php echo ''; ?></td>
						<td><?php echo $user->user_email;?></td>
						<td><?php echo $user->user_password; ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- end .container -->