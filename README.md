# API de cadastro de motoristas e carros

Este projeto é uma API desenvolvida em Laravel/PHP que permite o cadastro de motoristas e seus carros. Através desta API, é possível criar, atualizar, excluir e buscar motoristas e carros, bem como associar um motorista a um carro e buscar por nome, documento ou placa do carro.

A API é implementada seguindo as melhores práticas de arquitetura REST, utilizando verbos HTTP para as diferentes operações, e retornando respostas em formato JSON.

## Como usar a API

Para utilizar a API, é necessário fazer requisições HTTP para as URLs disponibilizadas pelo servidor onde a API está hospedada. A API utiliza autenticação via token de acesso, de forma que todas as requisições devem incluir um cabeçalho `Authorization` / bearer com o token correspondente.

## Como instalar e executar a API

Para instalar e executar a API em um servidor local, siga os seguintes passos:

1. Clone o repositório para sua máquina `git clone https://github.com/mjrdev/drivers-application.git`
2. Execute com o docker compose `docker compose up -d --build`
3. Caso não possua o php com composer na versão usada instalada localmente, acesse o container `docker exec -it laravel_app bash`
4. Instale as dependências do projeto executando o comando `composer install`
5. Crie um arquivo `.env` na raiz do projeto, copiando o conteúdo do arquivo `.env.example`, execute `cp .env.example .env`
6. Execute o comando `php artisan key:generate` para gerar uma chave única para o projeto
7. Execute o comando `php artisan migrate` para criar as tabelas no banco de dados (dentro do container)

Com isso, a API estará disponível na URL `http://localhost:8000`. Você pode então fazer requisições para a API utilizando um cliente HTTP como o Postman ou o Insomnia.

## Rotas 

> /api/login -> Rota de login \
> /api/register -> Criar usuário administrador
### Rotas de motoristas:

> /api/driver/new \
> /api/driver/all \
> /api/driver/get/{id} \
> /api/driver/update/{id} \
> /api/driver/delete/{id} \
> /api/driver/search/{content}