<!DOCTYPE html>
<html lang="de">
<!-- Seite für die Registrierung -->

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Fahrrad Stellpätze</title>
    <link href="Bilder/IconTransparent.png" rel="icon">
</head>

<body>
    <?php include "php/header.php"; ?>
    <?php include "php/navigation.php"; ?>
    <?php include "php/search.php"; ?>

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
