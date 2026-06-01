<?php
include "header.php";
?>
<section class="login">
    <div class="login-card">
        <h2>Login</h2>
        <form action="sv_login.php" method="post" name="form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="password" name="password">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</section>