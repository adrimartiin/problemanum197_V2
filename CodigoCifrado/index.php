<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="container">
    <h2>Descifrador de frases</h2>

    <form method="POST" action="">
        <label for="frase">Introduce la frase:</label><br>
        <input type="text" name="frase" placeholder="Introduce tu frase aquí" required>
        <input type="submit" value="Descifrar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function descifrado($frase_original) {
            $longitud = strlen($frase_original);  //strlen te da la longitud de la frase original
            $frase_transformada = []; //array de la frase transformada para ir metiendo cada una de als letras

            for ($i = 0; $i < $longitud; $i++) {
                if ($i % 2 == 0) {
                    // añado las posiciones pares desde el principio 
                    $frase_transformada[] = $frase_original[$i]; 
                }
            }
            // con este for añado las posiciones impares de manera inversa empezando desde el final 
            for ($i = $longitud - 1; $i >= 0; $i--) {
                if ($i % 2 != 0) {
                    $frase_transformada[] = $frase_original[$i];
                }
            }

            // convierto el array en una cadena para poder mostrarla por pantalla
            return implode('', $frase_transformada); 
        }

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
        
        $frase = $_POST['frase'];
        $frase_transformada = descifrado($frase);
        $frase_descifrada = descifra_mensaje($frase_transformada);
        echo "<div class='result'><strong>Resultado descifrado:</strong> " . $frase_descifrada . "</div>";
    }    

    ?>
</div>
<footer>
    <p>Descifrador de Frases | By Kilian Ruiz  & Adrián Martín</p>
</footer>

</body>
</html> 