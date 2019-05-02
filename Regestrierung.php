<!DOCTYPE html>
<html lang="de">
<!-- Seite für die Registrierung -->

<head>
    <meta charset="utf-8">
    <title>Fahrrad Stellpätze</title>
    <link href="Bilder/IconTransparent.png" rel="icon">
</head>

<body>
    <?php include "php/header.php"; ?>

    <section>
        <form>
            <p>Name: <input type="text" id="name" name="n" value="" placeholder="Name" autocomplete="off" /></p>
            <p>Email: <input type="text" id="email" name="e" value="" placeholder="Email" autocomplete="off" /></p>
            <p>Passwort: <input type="text" id="password" name="p" value="" placeholder="Passwort" autocomplete="off" /></p>
            <p>Passwort wiederholen: <input type="text" id="passwordRepeat" name="pr" value="" placeholder="Passwort" autocomplete="off" /></p>
            <p>Acountname: <input type="text" id="accountname" name="a" value="" placeholder="Accountname" autocomplete="off" /></p>
        </form>
    </section>

    <?php include "php/footer.php"; ?>

</body>

</html>
