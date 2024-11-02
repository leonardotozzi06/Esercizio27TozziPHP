<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Resoconto Acquisto</title>
</head>
<body>
    <h1>Resoconto dell'Acquisto</h1>

    <?php
    // Recupero dei dati dalla form
    $nome = $_POST['nome'];
    $costo = floatval($_POST['costo']);
    $quantita = intval($_POST['quantita']);
    $usato = isset($_POST['usato']) ? "Oggetto usato" : "Oggetto nuovo";
    $pagamento = $_POST['pagamento'];

    // Calcolo del prezzo iniziale
    $prezzoIniziale = $costo * $quantita;

    // Applicazione sconto del 20% se l'oggetto è usato
    if ($usato === "Oggetto usato") {
        $prezzoFinale = $prezzoIniziale * 0.8;
    } else {
        $prezzoFinale = $prezzoIniziale;
    }

    // Aggiunta di 2 euro se il pagamento è con carta
    if ($pagamento === "carta") {
        $prezzoFinale += 2;
    }

    // Mostra i dati in una lista non ordinata
    echo "<ul>";
    echo "<li>Nome dell'oggetto: $nome</li>";
    echo "<li>Costo per unità: €$costo</li>";
    echo "<li>Quantità: $quantita</li>";
    echo "<li>Stato: $usato</li>";
    echo "<li>Metodo di pagamento: $pagamento</li>";
    echo "<li>Prezzo iniziale: €" . number_format($prezzoIniziale, 2) . "</li>";
    echo "<li>Prezzo finale: €" . number_format($prezzoFinale, 2) . "</li>";
    echo "</ul>";
    ?>

</body>
</html>
