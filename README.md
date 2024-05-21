<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo"></a></p>

# Management System Laravel Project

O Sistema de Gerenciamento Penitenciário é uma plataforma robusta e segura projetada para administrar todos os aspectos relacionados ao cadastro e controle de indivíduos dentro de uma penitenciária. 

## Recursos e Funções

- Cadastro de Usuários: 
    - Categorizados com diferentes níveis de acesso (administradores, gerentes de visitantes e gerentes de detentos). 

- Gerenciamento de Detentos:
    - Responsáveis pelo gerenciamento de detentos têm acesso específico para inserir, atualizar e visualizar informações sobre os indivíduos sob custódia. 
        - Dados pessoais, registros de conduta, histórico criminal e informações relevantes para a administração penitenciária.

- Administração de Visitantes: 
    - Capacidade de controlar e monitorar as visitas ao complexo penitenciário. 
        - Eles podem cadastrar novos visitantes, agendar visitas, e gerenciar as permissões de acesso de acordo com as políticas de segurança estabelecidas.

- Cadastro de Funcionários: 
    - Possibilidade de registro e gestão dos funcionários, incluindo informações como cargo, horário de trabalho, e dados de contato.  

- Dashboard Interativa: 
    - A dashboard inicial oferece uma visão panorâmica em tempo real de todas as atividades cadastradas no sistema. 
        - Gráficos dinâmicos e relatórios estatísticos fornecem insights valiosos sobre a população carcerária, visitas, e demais aspectos relevantes para a gestão penitenciária.

- Recurso de Busca:
  - Filtragem de resultados de todas as tabelas em todas instâncias.

- Exportação de Dados:
  - Todas os resultados de tabelas podem ser salvas em formato de planilhas Excel (xlxs).

## Stack Utilizada

**Gestão de Ambiente:** WAMP Server

**Front-end:** Laravel Blade, Vue, Tailwind CSS, Bootstrap

**Back-end:** Laravel Framework (PHP)

**Banco de Dados:** MySQL Server

## Utilizando Localmente

Clone o projeto:

```bash
  git clone https://github.com/luccazovedi/Management-System-Laravel-Project.git
```

Entre no diretório do projeto:

```bash
  cd  'Management-System-Laravel-Project'
```

Instale as dependências:

```bash
  npm install
```
```bash
  composer install
```
Crie o Banco de Dados:

```bash
  php artisan migrate
```
Insira os Dados _Fakes_ (Opcional):

```bash
  php artisan db:seed
```
- O Projeto é iniciado com 1 usuário base com acesso 'Administrador':
  - Usuário: admin@email
  - Senha: senha123

Inicie o servidor

```bash
  npm run dev
```
```bash
  php artisan serve
```
## Deploy

Para fazer o deploy desse projeto rode

```bash
  npm run build
```
## Referências

 - [Awesome Readme Templates](https://awesomeopensource.com/project/elangosundar/awesome-README-templates)
 - [Awesome README](https://github.com/matiassingers/awesome-readme)
 - [How to write a Good readme](https://bulldogjob.com/news/449-how-to-write-a-good-readme-for-your-github-project)

## Documentação da API

#### Acesso à Documentação

```http
  GET /docs
```
Powered by Scalar.com / Scribe

Através da URL, é possível analisar os Endpoints e executar a ação de todas as rotas por meio da biblioteca _Scribe_.

Os métodos 'PUT', 'DELETE', 'POST' e 'GET' foram disponibilizados para todos os níveis.

## Suporte e Feedback

Para suporte ou algum feedback, mande um email para luccazovedi@gmail.com.
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
