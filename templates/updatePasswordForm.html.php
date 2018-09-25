<h2 class="text-center">Update Password</h2>
<form action="updatePassword.php" method="post" id="form">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group">
                <label for="current">Current Password</label>
                <input type="password" name="current" id="current" class="form-control" required>  
            </div>
            <p class="error text-center"><?= $message ?></p>  
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>  
            </div>
            <div class="form-group">
                <label for="confirm">Confirm Password</label>
                <input type="password" name="confirm" id="confirm" class="form-control" required>  
            </div>
            <button type="submit" class="btn btn-primary">Save</button> 
        </div>
    </div>
</form>

<script>
    $("#form").validate({
        rules: {
            current: "required",
            password: "required",
            confirm: {
                required: true,
                equalTo: "#password"
            }    
        },
        messages: {
            current: "Current Password is required!",
            password: "Password is required!",
            confirm: {
                required: "Confirm Password is required!",
                equalTo: "Confirm Password must match with Password!"
            }
        }
    });
</script>