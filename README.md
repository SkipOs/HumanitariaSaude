# HumanitariaSaude
Este é um projeto desenvolvido em PHP utilizando o framework Laravel. Este README.md fornece as instruções para configurar o ambiente de desenvolvimento e executar o projeto localmente.

---

## Pré-requisitos
Antes de começar, certifique-se de que os seguintes requisitos estão instalados no seu sistema:

1. **PHP** (versão 8.2 ou superior)
2. **Composer** 
3. **MySQL** 
4. **Node.js e NPM**
5. **XAMPP**

---

## Instalação do Laravel e Composer

### 1. Instale o Composer
O Composer é necessário para gerenciar as dependências do projeto. Faça o download e instale o Composer seguindo as instruções abaixo:

- Site oficial: [getcomposer.org/download/](https://getcomposer.org/download/)

Após a instalação, verifique se o Composer foi instalado corretamente:

```bash
composer --version
```

### 2. Instale o Laravel
Você pode instalar o Laravel globalmente usando seguindo o guia presente em [laravel.com/](https://laravel.com/docs/11.x#installing-php), utilizando o Laravel Herd presente em [herd.laravel.com](https://herd.laravel.com/docs/windows/getting-started/installation) do ou iniciar um novo projeto diretamente. No caso deste projeto, o Laravel já está incluído no arquivo `composer.json`.

---

## Configuração do Projeto

1. **Clone o repositório do projeto:**

```bash
git clone https://github.com/SkipOs/HumanitariaSaude.git
```

2. **Navegue até o diretório do projeto:**

```bash
cd HumanitariaSaude
```

3. **Instale as dependências do projeto com o Composer:**

```bash
composer install
```

4. **Copie o arquivo de configuração do ambiente:**

```bash
cp .env.example .env
```

5. **Gere a chave da aplicação:**

```bash
php artisan key:generate
```

6. **Configure o arquivo `.env` com os detalhes do banco de dados e outras configurações necessárias:**

Exemplo de configuração de banco de dados no `.env`:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=humanitaria_saude
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

7. **Execute as migrações do banco de dados:**

```bash
php artisan migrate
```

8. **Instale as dependências de frontend:**

```bash
npm install
```

9. **Compile os assets de frontend:**

```bash
npm run dev
```

---

## Executando o Projeto

1. Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

O projeto estará disponível no navegador em [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## Ferramentas e Dependências

- Laravel Framework: ^11.31
- Laravel Sanctum: ^4.0 (para autenticação API)
- Laravel Breeze: ^2.3 (starter kit de autenticação simples)
- Barryvdh Debugbar: (para depuração)
- PestPHP: (para testes)

---

**Autor**: Eduardo Henrique Alves Martins
**Licença**: MIT
