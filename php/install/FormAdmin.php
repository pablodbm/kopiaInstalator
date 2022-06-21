<main class="form-signin">
    <form action="php/install/AddUser.php" method="POST">
        <div class="form-group">
            <label>Imię</label>
            <input type="text" class="form-control" name="name" placeholder="Podaj imię" required pattern="[\D]{3,50}"
                oninput="this.setCustomValidity('')"
                oninvalid="this.setCustomValidity('Imię musi składać się z przynajmniej 3 liter')">
        </div>
        <div class="form-group">
            <label>Nazwisko</label>
            <input type="text" class="form-control" name="surname" placeholder="Podaj nazwisko" required
                pattern="[\D]{3,50}" oninput="this.setCustomValidity('')"
                oninvalid="this.setCustomValidity('Nazwisko musi składać się z przynajmniej 3 liter')">
        </div>
        <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" name="login" placeholder="Podaj login" required pattern=".{4,25}"
                oninput="this.setCustomValidity('')"
                oninvalid="this.setCustomValidity('Login musi składać się z przynajmniej 4 znaków')">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="Podaj email" required pattern=".{4,25}"
                oninput="this.setCustomValidity('')"
                oninvalid="this.setCustomValidity('Email musi zawierać @')">
        </div>
        <div class="form-group">
            <label>Hasło</label>
            <input type="password" class="form-control" name="password" placeholder="Podaj hasło" required
                pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"
                oninput="this.setCustomValidity('')"
                oninvalid="this.setCustomValidity('Hasło musi składać się z przynajmniej 8 znaków, litery, cyfry, znaku specjalnego oraz małej i dużej litery')">
        </div>
        <button class="btn-install-two" type="submit">Zakończ</button>
    </form>
</main>