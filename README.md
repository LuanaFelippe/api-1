# Instalacao

Primeiramente faca um fork deste repositorio para a sua conta e depois clone-o na sua maquina:

`git clone git@github.com:[nomedoseuusuario]/api.git`

obs: substitua [nomedoseuusuario] pelo nome do seu usuario antes de executar o comando

# Execucao

Para iniciar o sistema nos iremos usar docker-compose:

`docker-compose build`

`docker-compose up -d`

# Testando

Podemos rodar os teste usando o seguinte comando:

## Instalacao das bibliotecas 

`docker-compose run --rm cli composer install`

## Rodando os testes

Primeiro criamos a nossa estrutura do banco de dados utilizando o comando:

`docker-compose run --rm cli ./vendor/bin/phinx migrate`

E agora rodamos os testes:

`docker-compose run --rm cli ./vendor/bin/phpunit`
