# CRUD Posts - Laravel Project

## Sobre o Projeto
Este é um projeto desenvolvido em Laravel que implementa funcionalidades básicas de CRUD (Create, Read, Update, Delete) para a gestão de posts.

## Requisitos
- PHP >= 8.0
- Composer
- Node.js
- MySQL (ou outro banco de dados compatível)

## Instalação
1. Clone o repositório:
    ```bash
    git clone <link-do-repositório>
    cd crudposts
    ```

2. Instale as dependências do PHP:
    ```bash
    composer install
    ```

3. Instale as dependências do Node.js:
    ```bash
    npm install
    ```

4. Configure o arquivo `.env`:
    - Copie o exemplo:
        ```bash
        cp .env.example .env
        ```
    - Preencha as variáveis de ambiente, como `DB_DATABASE`, `DB_USERNAME`, e `DB_PASSWORD`.

5. Gere a chave da aplicação:
    ```bash
    php artisan key:generate
    ```

6. Execute as migrações para criar as tabelas no banco de dados:
    ```bash
    php artisan migrate
    ```

## Uso
- Para iniciar o servidor de desenvolvimento:
    ```bash
    php artisan serve
    ```

- Para compilar os assets front-end:
    ```bash
    npm run dev
    ```

## Testes
Execute os testes configurados com:
```bash
php artisan test
