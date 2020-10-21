<h2>Register</h2>

<form action="callbacks/register.php" method="post">
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
        <label for="email">
            <img src="./assets/icons/envelope.svg"/>
            <small>Email</small>
        </label>
        <input type="email" name="email" id="email" placeholder="Valid email"/>
    </div>

    <div class="input-item">
        <small>
            You will be required to input your phone number each time you publish a new game.<br>
            By registering to this website, you agree with Terms Of Service.
        </small>
    </div>


    <div class="input-item">
        <button type="submit">Register!</button>
    </div>
</div>
</form> 
