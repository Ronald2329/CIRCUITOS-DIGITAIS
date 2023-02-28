<?php
$questoes = array(
  array(
    'pergunta' => 'Qual é a capital do Brasil?',
    'resposta' => 'Brasília'
  ),
  array(
    'pergunta' => 'Quem é o criador do Facebook?',
    'resposta' => 'Mark Zuckerberg'
  ),
  array(
    'pergunta' => 'Quantos elementos químicos a tabela periódica possui?',
    'resposta' => '118'
  )
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Se a requisição foi feita via POST, verifica se a resposta está correta
  $pergunta_atual = $_POST['pergunta_atual'];
  $resposta_atual = $_POST['resposta_atual'];
  $resposta_dada = $_POST['resposta_dada'];

  if ($resposta_dada === $resposta_atual) {
    echo "<p>Parabéns, você acertou a pergunta!</p>";
    $proxima_pergunta = $pergunta_atual + 1;
    if ($proxima_pergunta < count($questoes)) {
      // Se ainda houver perguntas, exibe a próxima pergunta
      exibir_pergunta($proxima_pergunta);
    } else {
      // Se não houver mais perguntas, exibe uma mensagem de sucesso
      echo "<p>Você respondeu todas as perguntas com sucesso!</p>";
    }
  } else {
    // Se a resposta estiver incorreta, exibe a mesma pergunta novamente
    echo "<p>Ops, a resposta está incorreta. Tente novamente!</p>";
    exibir_pergunta($pergunta_atual);
  }
} else {
  // Se a requisição foi feita via GET, exibe a primeira pergunta
  exibir_pergunta(0);
}

function exibir_pergunta($indice_pergunta) {
  global $questoes;
  $pergunta = $questoes[$indice_pergunta]['pergunta'];
  $resposta = $questoes[$indice_pergunta]['resposta'];

  echo "<form method='POST'>";
  echo "<h2>Pergunta " . ($indice_pergunta + 1) . "</h2>";
  echo "<p>$pergunta</p>";
  echo "<input type='hidden' name='pergunta_atual' value='$indice_pergunta'>";
  echo "<input type='hidden' name='resposta_atual' value='$resposta'>";
  echo "<label>Resposta:</label>";
  echo "<input type='text' name='resposta_dada'>";
  echo "<input type='submit' value='Responder'>";
  echo "</form>";
}
?>
