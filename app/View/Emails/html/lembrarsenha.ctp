<p>Prezado <?= $nome ?>,</p>
<p>&nbsp;</p>
<p>Recebemos uma solicitação de lembrete de senha de acesso ao nosso sistema. Para gerar a nova senha, clique neste link <?= $this->Url->makeAbsolute("token") . DS . $token ?>. Lembramos que este link precisa ser acessado no prazo de 48 horas.</p>
<p>Se não foi você quem solicitou a troca de senha, entre em contato com suporte.</p>
<p>&nbsp;</p>
<p>Atenciosamente,</p>
<p>&nbsp;</p>
<p>Moreth e Lopes</p>