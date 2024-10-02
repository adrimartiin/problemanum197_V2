<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descifrador de Frases</title>
</head>
<body>
    <form method="POST">
        <label for="frase">Frase:</label>
        <br>
        <input type="text" id="frase" name="frase" required>
        <br><br>
        <input type="submit" value="Descifrar">
    </form>
<?php
    function descifra_mensaje($cadena){
            $vocales = "aeiouAEIOU";
            $frase_descifrada = "";
            $secuencia = "";

            for ($i = 0; $i < strlen($cadena); $i++) {
                $letra = $cadena[$i];
                if (strpos($vocales, $letra) !== false) {
                    $frase_descifrada .= strrev($secuencia) . $letra;
                    $secuencia = ""; 
                } else {
                    $secuencia .= $letra;
                }
            }
            
            return $frase_descifrada . strrev($secuencia); 
        }
    echo "<h2>Frase Descifrada:  "  . descifra_mensaje($_POST['frase']) . "</h2>";
?>
    ?>
</body>
</html>
