<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<form class="form-horizontal" action='reg_form.php' method="POST">
   <fieldset>
      <div id="legend">
         <legend class="">Register</legend>
      </div>
      <div class="control-group">
         <!-- Username -->
         <label class="control-label"  for="username">Username</label>
         <div class="controls">
            <input type="text" required="required"  id="username" name="username" placeholder="" class="input-xlarge">
         </div>
      </div>
      <div class="control-group">
         <!-- E-mail -->
         <label class="control-label" for="email">E-mail</label>
         <div class="controls">
            <input type="text" required = "required" id="email" name="email" placeholder="" class="input-xlarge">
         </div>
      </div>
      <div class="control-group">
         <!-- Password-->
         <label class="control-label" for="password">Password</label>
         <div class="controls">
            <input type="password" required = "required" id="password" name="password" placeholder="" class="input-xlarge">
         </div>
      </div>
      <div class="control-group">
         <!-- Password -->
         <label class="control-label"  for="password_confirm">Password (Confirm)</label>
         <div class="controls">
            <input type="password" id="password_confirm" required = "required" name="password_confirm" placeholder="" class="input-xlarge">
         </div>
      </div>
      <style type="text/css">
      	select{position: relative;
      		left: 3%;}

      </style>
      <div class="control-group" for="role">
		<label class="control-label" for="role">I am: </label>
      <select name = "role" value="Role" id="role" >
      	<option>Student</option>
      	<option>Landlord</option>
      </select>
      </div>
      <div class="control-group">
         <p class="text-justify">
          Already a member? <a href="login.php">Sign in</a>
         </p>
      </div>

      <div class="control-group">
         <!-- Button -->
         <div class="controls">
            <button class="btn btn-success">Register</button>
         </div>
      </div>
   </fieldset>
</form>