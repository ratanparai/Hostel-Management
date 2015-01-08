<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Profile</h4>
				</div>
				<div class="panel-body">

					<div class="form-group username">
						<label for="userid"><i class="glyphicon glyphicon-user"></i> user
							ID</label> <input id="username" type="text" class="form-control"
							value="<?php echo Session::get("user_name");?>" readonly>
					</div>
					<div class="form-group full-name">
						<label for="full_name"><i class="glyphicon glyphicon-pencil"></i>
							Full name</label> <input id="full_name" type="text"
							class="form-control" placeholder="Enter your full name"
							value="<?php echo Session::get('full_name'); ?>">
					</div>
					<div class="form-group">
						<label for="department"><i class="glyphicon glyphicon-barcode"></i>
							Department</label> <input id="department" type="text"
							class="form-control" placeholder="Department"
							value="<?php echo Session::get('department'); ?>" readonly>
					</div>

					<div class="form-group email">
						<label for="email"><i class="glyphicon glyphicon-envelope"></i>
							Email</label> <input id="email" type="email" class="form-control"
							placeholder="Enter ID"
							value="<?php echo Session::get('user_email'); ?>">
					</div>
					<div class="form-group">
						<label for="gpa"><i class="glyphicon glyphicon-screenshot"></i>
							GPA</label> <input id="gpa" type="text" class="form-control"
							placeholder="Department"
							value="<?php echo Session::get('gpa'); ?>" readonly>
					</div>
					<div class="form-group">
						<label for="cgpa"><i class="glyphicon glyphicon-screenshot"></i>
							CGPA</label> <input id="cgpa" type="text" class="form-control"
							placeholder="Department"
							value="<?php echo Session::get('cgpa'); ?>" readonly>
					</div>

					<button id="updateprofile" type="submit" class="btn btn-default">Update
						Account</button>

					<div class="add-user-message"></div>
				</div>

			</div>
		</div>

		<div class="col-xs-12 col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Change Password</h4>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="current_password">Current password</label> <input
							type="password" id="current_password" class="form-control">
					</div>
					<div class="form-group">
						<label for="new_password">New password</label> <input
							type="password" id="new_password" class="form-control">
					</div>
					<div class="form-group">
						<label for="repeat_password">Repeat the new password</label> <input
							type="password" id="repeat_password" class="form-control">
					</div>
					<button id="updatepassword" class="btn btn-default">Update password</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end .container -->