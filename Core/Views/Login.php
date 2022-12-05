<h1>Login</h1>
<form class="ContentWrapper InputForm" action="<?= $Request->RootURL; ?>Login.html?LGNRQST=1" method="post">
    <p>
        <label for="User">Benutzername</label>
        <input type="text" name="User" id="User" />
    </p>
    <p>
        <label for="Password">Passwort</label>
        <input type="password" name="Password" id="Password" />
    </p>
    
    <p><input type="submit" value="Login"/></p>
</form>