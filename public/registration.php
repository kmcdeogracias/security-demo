<html>
    <head>
        <title></title>
    </head  >
    <body>
        <div class="container">
            <form class="form-signin" method="POST" action="process_registration.php">
                <h2 class="form-signin-heading">Registration Page</h2>
                <p class="input-group">
        	        <label for="inputUsername" class="sr-only">Username</label>
        	        <input type="text" name="username" class="form-control" placeholder="Username">
    	        </p>
                <p>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                </p>
                <p>
                    <label for="inputFirstName" class="sr-only">First Name</label>
                    <input type="text" name="first_name" id="inputFirstName" class="form-control" placeholder="First Name">
                </p>
                <p>
                    <label for="inputLastName" class="sr-only">Last Name</label>
                    <input type="text" name="last_name" id="inputLastName" class="form-control" placeholder="Last Name">
                </p>
                <p>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                </p>
                <?php if ($_GET["success"] == true) { ?>
                    <p>User created successfully</p>
                <?php } ?>

                <?php if ($_GET["success"] == false) { ?>
                    <p>User registration failed</p>
                <?php } ?>
          </form>
        </div>
    </body>
</html>
