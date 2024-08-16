<?php
// index.php

// Función para mostrar un mensaje de saludo
function showGreeting() {
    echo '<h1 class="greeting">Jose Airam Valadez Salas!</h1>';
}

// Función para mostrar la fecha actual en la zona horaria de Cd. Juárez
function showCurrentDate() {
    // Establecer la zona horaria a Ciudad Juárez
    date_default_timezone_set('America/Chihuahua');
    
    // Mostrar la fecha y hora actual
    echo '<p class="date">Current date is: ' . date('Y-m-d H:i:s') . '</p>';
}

// Función para imprimir una lista de elementos con sub-elementos
function printList($items) {
    echo '<ul class="item-list">';
    foreach ($items as $item => $details) {
        echo '<li>' . htmlspecialchars($item);
        if (is_array($details)) {
            echo '<ul class="sub-item-list">';
            foreach ($details as $detail) {
                echo '<li>' . htmlspecialchars($detail) . '</li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
    echo '</ul>';
}

// Función para calcular la edad a partir de una fecha de nacimiento
function calculateAge($birthDate) {
    $birthDate = new DateTime($birthDate);
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;
    return $age;
}

// Función para convertir una cadena a mayúsculas
function convertToUpperCase($string) {
    return strtoupper($string);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled PHP Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .greeting {
            color: #007bff;
            text-align: center;
        }
        .date {
            text-align: center;
            font-style: italic;
        }
        .item-list {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
        }
        .item-list li {
            padding: 10px;
            background-color: #f8f9fa;
            margin: 5px 0;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .sub-item-list {
            list-style-type: none;
            padding: 0;
            margin-left: 20px;
        }
        .sub-item-list li {
            padding: 5px;
            background-color: #e9ecef;
            margin: 3px 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Mostrar saludo
        showGreeting();

        // Mostrar fecha actual
        showCurrentDate();

        // Crear una lista de elementos con sub-elementos
        $items = [
            'Datos personales' => ['Nombre', 'Edad', 'Dirección'],
            'Datos escolares' => ['Nivel académico', 'Institución', 'Promedio'],
            'Datos Curriculares' => ['Experiencia laboral', 'Habilidades', 'Certificaciones']
        ];
        printList($items);

        // Calcular la edad (suponiendo una fecha de nacimiento específica)
        $birthDate = '1990-08-15'; // Ejemplo de fecha de nacimiento
        $age = calculateAge($birthDate);
        echo '<p class="age">Your age is: ' . $age . ' years old.</p>';

        // Convertir un texto a mayúsculas
        $text = 'este es un ejemplo de texto.';
        $uppercaseText = convertToUpperCase($text);
        echo '<p class="uppercase-text">Uppercase text: ' . $uppercaseText . '</p>';
        ?>
    </div>
</body>
</html>
