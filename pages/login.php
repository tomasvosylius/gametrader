<h2>Login</h2>

<form action="callbacks/login.php" method="post">
<div class="input-group">
    <div class="input-item">
        <label for="username">
            <img src="./assets/icons/person.svg"/>
            <small>Username</small>
        </label>
        <input type="text" name="username" id="username" placeholder="Username (6-32 chars)"/>
    </div>
    <div class="input-item">
        <label for="password">
            <img src="./assets/icons/lock.svg"/>
            <small>Password</small>
        </label>
        <input type="password" name="password" id="password" placeholder="Password (6-32 chars)"/>
    </div>

    <div class="input-item">
        <button type="submit">Login</button>&nbsp;
        <a href="index.php?page=register"><small>Create an account</small></a>
    </div>
</div>
</form>
