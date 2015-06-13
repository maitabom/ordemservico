## Instruções de Instalação

1. Baixe o arquivo de projeto zipado e descompacte no local configurado no servidor Apache
2. Execute a configuração do banco
3. Execute as configurações do sistema.
3. Acesse normalmente o site via browser, segundo o endereço DNS configurado no servidor.

## Instruções de Configuração do Banco de Dados

1. Execute os arquivos na seguinte ordem:
	1. script.sql
	2. funcoes.sql
	3. grupos.sql
	4. usuarios.sql
2. Você também pode utilizar o arquivo de modelo de banco de dados "Ordem de Serviço.mwb", para sincronizar com o banco de dados. Portanto, ainda é preciso executar os scripts na seguinte ordem:
	1. funcoes.sql
	2. grupos.sql
	3. usuarios.sql

## Instruções de Configuração do Sistema

É preciso antes de execução, efetuar modificações em seguintes arquivos para melhor funcionamento do sistema. Todos encontra-se no diretório _app/Config_
1. **database.php:** Configuração do banco de dados.
2. **email.php:** Configuração do envio de e-mail. O sistema está usando o modo SMTP.

Para maiores dúvidas e informações, contate o desenvolvedor.