<h2 class="text-center">Login</h2>
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="login.php" method="post" id="form">
            <p class="error"><?= $message ?></p>
            <div class="form-group">
                <label for="username">Username: ss100103@gmail.com</label>
                <input type="text" name="username" id="username" class="form-control" required>  
            </div>
            <div class="form-group">
                <label for="password">Password: Test123</label>
                <input type="password" name="password" id="password" class="form-control" required>  
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>    
    </div>
</div>

<script>
    $("#form").validate({
        rules: {
            username: "required",
            password: "required" 
        },
        messages: {
            username: "Frist Name is required!",
            password: "Password is required!"
        }
    });
</script>