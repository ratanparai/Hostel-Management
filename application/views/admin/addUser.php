<!--  Page Content -->
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Login Panel</h4>
				</div>
				<div class="panel-body">

					<div class="form-group username">
						<label for="userid"><i class="glyphicon glyphicon-user"></i> user
							ID (<i style="font-weight: normal;">Example: C000000</i>)</label>
						<input id="username" type="text" class="form-control"
							placeholder="Enter ID">
					</div>
					<div class="form-group email">
						<label for="email"><i class="glyphicon glyphicon-envelope"></i>
							Email (<i style="font-weight: normal;">the password will be send
								to this mail ID</i>)</label> <input id="email" type="email"
							class="form-control" placeholder="Enter ID" required="required">
					</div>
					<!--
                  <div class="form-group password">
                    <label for="password"><i class="glyphicon glyphicon-lock"></i> Password</label>
                    <input id="password" type="text" class="form-control" value="<?php echo Generate::generateDefaultPassword();?>" placeholder="Password" disabled>
                  </div>
                   -->
					<div class="form-group usertype">
						<label for="usertype"><i class="glyphicon glyphicon-chevron-up"></i>
							User Type</label> <select id="access_level" class="form-control">
							<option value="1">Student</option>
							<option value="2">Admin</option>
						</select>
					</div>
					<button id="register" type="submit" class="btn btn-default">Create
						Account</button>

					<div class="add-user-message"></div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- end .container -->