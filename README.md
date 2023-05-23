
# API de Cadastro de Alunos, Turmas e Funcionários (Lumen PHP)

Bem-vindo à documentação da API de cadastro de dados para uma escola, desenvolvida em Lumen PHP. Esta API permite o gerenciamento de alunos, turmas e funcionários de uma escola, oferecendo recursos para criar, atualizar, visualizar e excluir informações relacionadas.




## Instalação

Para começar a usar a API, você precisará seguir estas etapas:

1 - Certifique-se de ter o PHP e o Composer instalados em sua máquina.

2 - Faça o download ou clone este repositório do GitHub.

3 - Navegue até o diretório do projeto em seu sistema.

4 - Instale as dependências do projeto executando o seguinte comando:

```bash
  composer install
```
5 - Copie o arquivo .env.example para um novo arquivo chamado .env:

```bash
  cp .env.example .env
```

6 - Configure o arquivo .env com as informações do seu ambiente (banco de dados, etc.).

7 - Execute o servidor local usando o seguinte comando:
```bash
  php -S localhost:8000 -t public
```
8 - A API estará acessível em http://localhost:8000.


    
## Endpoint

A API oferece os seguintes endpoints:

### Alunos
`GET api/students`: Retorna a lista de todos os alunos cadastrados.

`GET api/students/{id}`: Retorna os detalhes de um aluno específico com base no ID fornecido.

`POST api/students`: Cria um novo aluno com base nos dados fornecidos no corpo da solicitação.

`PUT api/students/{id}`: Atualiza os dados de um aluno específico com base no ID fornecido.

`DELETE api/students/{id}`: Exclui um aluno específico com base no ID fornecido.

### Funcionários

`GET /employees`: Retorna a lista de todos os funcionários cadastrados.

`GET /employees/{id}`: Retorna os detalhes de um funcionário específico com base no ID fornecido.

`POST /employees`: Cria um novo funcionário com base nos dados fornecidos no corpo da solicitação.

`PUT /employees/{id}`: Atualiza os dados de um funcionário específico com base no ID fornecido.

`DELETE /employees/{id}`: Exclui um funcionário específico com base no ID fornecido.

### Turmas

`GET /classes`: Retorna a lista de todas as turmas cadastradas.

`GET /classes/{id`}: Retorna os detalhes de uma turma específica com base no ID fornecido.

`POST /classes`: Cria uma nova turma com base nos dados fornecidos no corpo da solicitação.

`PUT /classes/{id}`: Atualiza os dados de uma turma específica com base no ID fornecido.

`DELETE /classes/{id}`: Exclui uma turma específica com base no ID fornecido.
## Licença

Este projeto está licenciado sob a [MIT](https://choosealicense.com/licenses/mit/)

