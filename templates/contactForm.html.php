<section>
    <h2 class="text-center">Contact Us</h2>
    <p class="text-center">Call Toll Free: <a href="tel:1800 915 225">1800 915 225</a></p>
    <form class="form" action="../contact/" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fName">First Name</label>
                    <input type="text" name="fName" id="fName" class="form-control" required>  
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lName">Surname</label>
                    <input type="text" name="lName" id="lName" class="form-control" required>  
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>  
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" required>  
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="10" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>    
</section>
