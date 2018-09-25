<h2 class="text-center">Create User</h2>
<form action="createUser.php" method="post" id="form">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group">
                <label for="fName">Frist Name</label>
                <input type="text" name="fName" id="fName" class="form-control" required>  
            </div>    
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lName">Surname</label>
                <input type="text" name="lName" id="lName" class="form-control" required>  
            </div>    
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>  
            </div>    
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>  
            </div>
            <div class="form-group">
                <label for="confirm">Confirm Password</label>
                <input type="password" name="confirm" id="confirm" class="form-control" required>  
            </div>    
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<script>
    $("#form").validate({
        rules: {
            fName: "required",
            lName: "required",
            email: {
                required: true,
                email: true
            },
            password: "required",
            confirm: {
                required: true,
                equalTo: "#password"
            }    
        },
        messages: {
            fName: "Frist Name is required!",
            lName: "Surname is required!",
            email: {
                required: "Email is required!"
            },
            password: "Password is required!",
            confirm: {
                required: "Confirm Password is required!",
                equalTo: "Confirm Password must match with Password!"
            }
        }
        

    });
</script>