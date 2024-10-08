<?php
if (isset($_GET["password-length"]) && $_GET["password-length"] != '') {
    if (!is_numeric($_GET["password-length"])) {
        $message = "Devi inserire un numero";
    } elseif ($_GET["password-length"] < 8) {
        $message = "Devi inserire un valore maggiore o uguale a 8";
    }

    if (isset($message)) {
        var_dump($message);
    } else {
        // Creo la stringa per recuperare i caratteri
        $basestring = 'abcdefghijklmnopqrstuvwxyz' . strtoupper('abcdefghijklmnopqrstuvwxyz') . '0123456789' . '!@#$%^&*()-_=+[]{}|;:,.<>?/~';

        // Definisco la stringa Password
        $password = '';

        // Ciclo for per generare la password della lunghezza richiesta
        for ($i = 0; $i < $_GET['password-length']; $i++) {
            $randomindex = rand(0, strlen($basestring) - 1);
            $password .= $basestring[$randomindex];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Password Generator</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 border text-center mt-2">
                <h2>Strong Password Generator</h2>
                <h3>Genera una password sicura</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 border">
                <div class="rounded">
                    <form action="./index.php" method="GET">
                        <div class="col-12 py-4 px-4">
                            <div class="form-group row align-items-center">
                                <label class="col-form-label col-sm-4 fw-bolder text-sm-end" for="password-length">Lunghezza Password:</label>
                                <div class="col-sm-8">
                                    <input id="password-length" name="password-length" class="form-control form-control-sm fw-bolder" type="number" max="20" placeholder="Scegli una cifra da 8 a 20, per decidere quanto sarà lunga la tua password!">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary fw-bold">Genera Password</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php if (isset($password)): ?>
                        <p class="mt-3">La tua password generata è: <strong><?php echo $password; ?></strong></p>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>

