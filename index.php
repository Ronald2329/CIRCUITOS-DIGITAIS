<?php
//ARRAY DE ARRAY QUE CRIA TODAS AS INFORMAÇÕES RELACIONADAS AS QUESTÕES TANTO COMO RESPOSTAS E AS ALTERNATIVAS
$questoes = array(

  array(
        'pergunta' => 'O que é computação em nuvem??',
        'alternativas' => array(
            'Uma rede de computadores conectados em um data center',
            'Um modelo de computação em que recursos de TI são entregues pela internet',
            'Uma técnica de programação avançada'
        ),
        'resposta' => 'Um modelo de computação em que recursos de TI são entregues pela internet'
  ),
  array(
        'pergunta' => 'Quais são os três principais modelos de serviço em nuvem?',
        'alternativas' => array(
            'IaaS, SaaS e PaaS',
            'IaaS, DaaS e PaaS',
            'DaaS, SaaS e FaaS'
        ),
        'resposta' => 'IaaS, SaaS e PaaS'
  ),
  array(
        'pergunta' => 'Quais são os benefícios da computação em nuvem?',
        'alternativas' => array(
            'Redução de custos, escalabilidade e agilidade',
            'Melhoria de desempenho, segurança e privacidade',
            'Melhoria da usabilidade, acessibilidade e confiabilidade'
        ),
        'resposta' => 'Redução de custos, escalabilidade e agilidade'
  ),
  array(
    'pergunta' => 'Qual é a diferença entre nuvem pública e nuvem privada?',
    'alternativas' => array(
        'A nuvem pública é gerenciada por um provedor de serviços em nuvem e a nuvem privada é gerenciada internamente pela empresa',
        'A nuvem pública é mais segura do que a nuvem privada',
        'A nuvem pública é mais cara do que a nuvem privada'
    ),
    'resposta' => 'A nuvem pública é gerenciada por um provedor de serviços em nuvem e a nuvem privada é gerenciada internamente pela empresa'
  ),
  array(
    'pergunta' => 'O que é um provedor de serviços em nuvem?',
    'alternativas' => array(
        'Uma empresa que fornece serviços em nuvem',
        'Um data center que hospeda aplicativos em nuvem',
        'Uma tecnologia de virtualização de servidores'
    ),
    'resposta' => 'Uma empresa que fornece serviços em nuvem'
  ),
  array(
    'pergunta' => 'O que é a escalabilidade em nuvem?',
    'alternativas' => array(
        'A capacidade de aumentar ou diminuir o uso de recursos de TI em nuvem conforme a demanda',
        'A capacidade de proteger os dados armazenados na nuvem contra ameaças cibernéticas',
        'A capacidade de criar e implantar aplicativos em nuvem rapidamente'
    ),
    'resposta' => 'A capacidade de aumentar ou diminuir o uso de recursos de TI em nuvem conforme a demanda'
  ),
  array(
    'pergunta' => 'O que é um serviço de infraestrutura em nuvem (IaaS)?',
    'alternativas' => array(
        'Um serviço que fornece recursos de computação, como servidores virtuais e armazenamento',
        'Um serviço que fornece aplicativos em nuvem prontos para uso',
        'Um serviço que fornece recursos de automação de processos de negócios'
    ),
    'resposta' => 'Um serviço que fornece recursos de computação, como servidores virtuais e armazenamento'
  ),
  array(
    'pergunta' => 'O que é um serviço de plataforma em nuvem (PaaS)?',
    'alternativas' => array(
        'Um serviço que fornece uma plataforma de desenvolvimento em nuvem',
        'Um serviço que fornece recursos de rede, como firewalls e roteadores virtuais',
        'Um serviço que fornece recursos de automação de processos de negócios'
    ),
    'resposta' => 'Um serviço que fornece uma plataforma de desenvolvimento em nuvem'
  ),
  array(
    'pergunta' => 'O que é um serviço de software em nuvem (SaaS)?',
    'alternativas' => array(
        'Um serviço que fornece aplicativos em nuvem prontos para uso',
        'Um serviço que fornece recursos de computação, como servidores virtuais e armazenamento',
        'Um serviço que fornece uma plataforma de desenvolvimento em nuvem'
    ),
    'resposta' => 'Um serviço que fornece aplicativos em nuvem prontos para uso'
  ),
  array(
    'pergunta' => 'O que é o modelo de nuvem pública?',
    'alternativas' => array(
        'É um modelo em que os serviços de cloud computing são disponibilizados por um provedor terceirizado para uso público',
        'É um modelo em que os serviços de cloud computing são disponibilizados apenas para uso privado de uma empresa',
    ),
    'resposta' => 'É um modelo em que os serviços de cloud computing são disponibilizados por um provedor terceirizado para uso público'
  ),
  array(
    'pergunta' => 'Quais são as principais preocupações em relação à segurança em cloud computing?',
    'alternativas' => array(
        'Perda de controle, vulnerabilidades de rede, proteção de dados e conformidade regulatória',
        'Falta de recursos, lentidão no acesso e alta demanda por capacidade de processamento'
    ),
    'resposta' => 'Perda de controle, vulnerabilidades de rede, proteção de dados e conformidade regulatória'
  ),
  array(
    'pergunta' => 'Quais são os principais tipos de serviços de cloud computing?',
    'alternativas' => array(
        'Software as a Service (SaaS), Platform as a Service (PaaS) e Infrastructure as a Service (IaaS)',
        'Email as a Service (EaaS), Document as a Service (DaaS) e Storage as a Service (StaaS)'
    ),
    'resposta' => 'Software as a Service (SaaS), Platform as a Service (PaaS) e Infrastructure as a Service (IaaS)'
  ),
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Se a requisição foi feita via POST, verifica se a resposta está correta
  $pergunta_atual = $_POST['pergunta_atual'];
  $resposta_atual = $_POST['resposta_atual'];
  $resposta_dada = $_POST['resposta_dada'];

  $alternativas = $questoes[$pergunta_atual]['alternativas'];
  $resposta_index = array_search($resposta_atual, $alternativas);

  if ($resposta_dada === $alternativas[$resposta_index]) {
    echo "<p>Parabéns, você acertou a pergunta". $pergunta_atual + 1  ."!</p>";
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
  $alternativas = $questoes[$indice_pergunta]['alternativas'];
  $resposta = $questoes[$indice_pergunta]['resposta'];

  echo "<form class='questionario' method='POST'>";
  echo "<h2>Pergunta " . ($indice_pergunta + 1) . "</h2>";
  echo "<p>$pergunta</p>";
  echo "<input type='hidden' name='pergunta_atual' value='$indice_pergunta'>";
  echo "<input type='hidden' name='resposta_atual' value='$resposta'>";
  echo "<label>Alternativas:</label>";
  echo "<select name='resposta_dada'>";
  foreach ($alternativas as $alternativa) {
    echo "<option value='$alternativa'>$alternativa</option>";
  }
  echo "</select>";
  echo "<input type='submit' value='Responder'>";
  echo "</form>";
}

?>
<link rel="stylesheet" href="estilo.css">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" shink-to-fit=no>