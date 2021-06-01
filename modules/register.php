<!-- MAIN content -->
<div id = "main">
    <div id="main-content">
        <h3>Register User</h3>
        <form method="post" class="form-register">
            <p>
                <label>Username: </label>
                <input type="text" name="username" />
            </p>
            <p>
                <label>Email: </label>
                <input type="text" name="email" />
            </p>
            <p>
                <label>Full Name: </label>
                <input type="text" name="fullname" />
            </p>
            <p>
                <label>Password: </label>
                <input type="password" name="password" />
            </p>
            <p><input type="submit" value="Register"/></p>
        </form>
    </div>
    <!-- embed sidebar.php -->
    <?php require __DIR__. '/partials/sidebar.php'; ?>
</div>
