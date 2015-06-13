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