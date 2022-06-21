<main class="form-signin">
    <form method="POST" action="php/install/CreateConfig.php">
        <div class="form-floating">
            <input type="text" class="form-control" id="host" name="host" required oninput="this.setCustomValidity('')"
                oninvalid="this.setCustomValidity('Wprowadź nazwę lub adres serwera')">
            <label for="floatingInput">Nazwa lub adres serwera</label>
        </div>
        <br />
        <div class="form-floating">
            <input type="text" class="form-control" id="dbname" name="dbname" required
                oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Wprowadź nazwę bazy')">
            <label for="floatingPassword">Nazwa bazy danych</label>
        </div>
        <br />
        <div class="form-floating">
            <input type="text" class="form-control" id="prefix" name="prefix" required
                oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Wprowadź prefix tabel')">
            <label for="floatingPassword">Prefix tabel</label>
        </div>
        <br />
        <div class="form-floating">
            <input type="text" class="form-control" id="user" name="user" required oninput="this.setCustomValidity('')"
                oninvalid="this.setCustomValidity('Wprowadź nazwę użytkownika')">
            <label for="floatingPassword">Nazwa użytkownika</label>
        </div>
        <br />
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" required
                oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Wprowadź hasło')">
            <label for="floatingPassword">Hasło</label>
        </div>
        <button class="btn-install-two" type="submit">Kontynuuj</button>
    </form>
</main>