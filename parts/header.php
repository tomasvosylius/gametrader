<html>
<body>
	<div class="container">
        <header id="site-head">
            <a href="?page=home" class="logo-link">
                Game
                <img src="assets/icons/controller.svg" height="20em" style="margin: 0 0.3em 0 0.3em;" />
                Trader<small>.com</small>
            </a>

            <div class="user-area">
                <ul class="profile-quicklinks">
                    <?php if(isset($_SESSION["isLogged"]) && $_SESSION["isLogged"]): ?>
                    <small>Hi, <b><?php echo $_SESSION['username']; ?></b>!</small>
                    <?php endif; ?>

                    <li>
                        <a class="add-game" href="?page=add-game">
                            <img src="./assets/icons/plus.svg"/>
                            <p>Add game</p>
                        </a>

                    <?php if(isset($_SESSION["isLogged"]) && $_SESSION["isLogged"]): ?>
                    <li>
                        <img src="assets/icons/list.svg" height="13em" />
                        <a href="?page=my-listings">Your listings</a>
                    </li>
                    <li>
                        <img src="assets/icons/arrow-bar-left.svg" height="13em" />
                        <a href="?page=logout">Logout</a>
                    </li>
                    <?php else: ?>

                    <li>
                        <img src="./assets/icons/arrow-return-right.svg" height="13em"/>
                        <a href="?page=login">Login</a>
                    </li>
                    <li> 
                        <img src="./assets/icons/person-plus.svg" height="13em"/>
                        <a href="?page=register">Create an account</a>
                    </li>

                    <?php endif; ?>

                </ul>
            </div>
        </header>