<?php include('links.php') ?>

<body>
    <?php include('header.php') ?>
    <div class="container p-3 mb-3">
        <form action="" method="post">
            <input type="hidden" name="action" value="register">
        <h2 class="text-center mb-3">Sign up</h2>
        <div class="row form-group">
                <div class="col-12 col-xl-6 mb-3 ">
                    <label>userName:</label>
                    <input type="text" class="form-control" required name="userName">
                </div>
                <div class="col-12 col-xl-6 mb-3">
                    <label>Full Name:</label>
                    <input type="text" class="form-control" required name="fullName">
                </div>
                <div class="col-12 col-xl-6 mb-3">
                    <label>Email:</label>
                    <input type="email" class="form-control" required name="email">
                </div>
                <div class="col-12 col-xl-6 mb-3">
                    <label>Address:</label>
                    <input type="text" class="form-control" required name="address">
                </div>
                <div class="col-12 col-xl-6 mb-3">
                    <label>password:</label>
                    <input type="password" class="form-control" required name="password">
                </div>
                <div class="col-12 col-xl-6 mb-3">
                    <label>confirm password:</label>
                    <input type="password" class="form-control" required name="re_password">
                </div>
                <button type="submit" class="btn btn-primary mx-auto mt-4">register</button>
            
        </div>
    </form>
    </div>
    <?php include('footer.php') ?>
</body>