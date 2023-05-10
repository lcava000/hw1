<?php
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_51HkPqZKomNJ2WTb0NXki7qdii9e90Dve1qseQKOmHJOe5nDifspazL0x6PzF9adcFdUNUznJXPs6jXWSyj5APE2d00oMT8RnY5');
header('Content-Type: application/json');

try {
  $token = $_POST['stripeToken'];

  $amount = $_POST['amount'];
  $currency = $_POST['currency'];
  $desc = $_POST['description'];

  $charge = \Stripe\Charge::create([
    'amount' => $amount, // importo in AED
    'currency' => $currency,
    'description' => $desc,
    'source' => $token,
  ]);

  // Gestisci il successo del pagamento (ad esempio, aggiornare il database, inviare una ricevuta via email)
  $response = [
    'success' => true,
    'message' => 'Pagamento completato con successo',
    'charge' => $charge
  ];

} catch (\Stripe\Error\Card $e) {
  // Errore nella carta di credito
  $response = [
    'success' => false,
    'error' => 'Errore nella carta di credito: ' . $e->getMessage()
  ];

} catch (\Stripe\Error\RateLimit $e) {
  // Troppe richieste a Stripe API
  $response = [
    'success' => false,
    'error' => 'Troppe richieste: ' . $e->getMessage()
  ];

} catch (\Stripe\Error\InvalidRequest $e) {
  // Parametri non validi nella richiesta
  $response = [
    'success' => false,
    'error' => 'Parametri non validi: ' . $e->getMessage()
  ];

} catch (\Stripe\Error\Authentication $e) {
  // Autenticazione con Stripe API non riuscita
  $response = [
    'success' => false,
    'error' => 'Autenticazione non riuscita: ' . $e->getMessage()
  ];

} catch (\Stripe\Error\ApiConnection $e) {
  // Errore di connessione con Stripe API
  $response = [
    'success' => false,
    'error' => 'Errore di connessione: ' . $e->getMessage()
  ];

} catch (\Stripe\Error\Base $e) {
  // Errore generico
  $response = [
    'success' => false,
    'error' => 'Errore: ' . $e->getMessage()
  ];

} catch (Exception $e) {
  // Errore generico non correlato a Stripe
  $response = [
    'success' => false,
    'error' => 'Errore generico: ' . $e->getMessage()
  ];
}

echo json_encode($response);
?>
