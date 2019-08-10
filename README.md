# rei-do-almoco

O projeto foi feito com PHP e framework laravel 5.8

Foi utilizado banco de dados mysql 5.7

O arquivo do banco de dados encontra-se da pasta documentos, neste repositório!

Para rodar o projeto é preciso renomear o arquivo .env.example para .env e configurar os parametros de acesso ao banco de dados e email, para o envio de email do vencedor!
Exemplo:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

É necessário também ter instalado o Composer.

Rodar o comando composer install na pasta do projeto, onde se encontra o arquivo packages.json.

Para que o envio de email funcione é necessário criar uma entrada no cron do servidor, conforme documentação do Laravel.

Para rodar o projeto, executar o comando: "php artisan serve" na pasta raiz do projeto e acessar a URL localhost:8000

Para testar o envio de email, foi configurada a rota "localhost:8000/fechar" que vai gravar o rei do almoço do dia e enviar o email do almoço para o mesmo!

Também é possivel enviar o email com o comando "php artisan winemail:send"

Fiz um deploy do site em um dominio de teste também!

http://www.temtudovale.site
