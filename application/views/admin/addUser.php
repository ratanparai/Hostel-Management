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
                    <label for="userid"><i class="glyphicon glyphicon-user"></i> user ID</label>
                    <input id="username" type="text" class="form-control"  placeholder="Enter ID">
                  </div>
                  <div class="form-group password">
                    <label for="password"><i class="glyphicon glyphicon-lock"></i> Password</label>
                    <input id="password" type="text" class="form-control" value="<?php echo Generate::generateDefaultPassword();?>" placeholder="Password" disabled>
                  </div>
                  <div class="form-group usertype">
                    <label for="usertype">User Type</label>
                    <select class="form-control">
                        <option value="1">Student</option>
                        <option value="2">Admin</option>
                    </select>
                  </div>
                  <button id="register" type="submit" class="btn btn-default" >Create Account</button>

                  <div class="message">
                  </div>
              </div>

            </div>
        </div>
    </div>
</div> <!-- end .container -->