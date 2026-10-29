# 速い Hayai — Sistema de Gerenciamento de Estoque para MEI

> Trabalho de Conclusão de Curso (TCC) do curso Técnico em Informática para Internet — **Etec de Poá, 2023**.
> Este repositório também registra a minha evolução técnica: do projeto original até as melhorias que venho aplicando hoje, já cursando Análise e Desenvolvimento de Sistemas na FATEC.

*"Organizando seus sonhos para caminhos melhores"*

## Sobre o projeto

Muitos microempreendedores ainda controlam o estoque no papel e na caneta, o que causa perda de informação, falta de produtos na hora do serviço, atrasos e prejuízo.

Em uma pesquisa feita pela equipe com 28 microempreendedores:

- **67,9%** não possuíam nenhum sistema de controle de estoque
- **59,3%** dos que não usavam sistema controlavam tudo com papel e caneta
- **82,1%** concordaram que um sistema online facilitaria o trabalho

O Hayai nasceu para resolver esse problema. O sistema foi pensado a partir de entrevistas com uma estética automotiva que fazia o controle de estoque manualmente.

## Funcionalidades

- Login e logout com controle de sessão
- Dois perfis de acesso: **administrador** e **funcionário**
  - Administrador: cadastra, edita e exclui usuários e produtos, controla o estoque e registra entradas e baixas
  - Funcionário: visualiza o estoque e acessa o próprio perfil
- Cadastro de produtos por nome, grupo (insumo, consumo ou matéria-prima), quantidade e estoque mínimo
- Entrada e baixa de produtos no estoque
- Controle de estoque com **alerta visual**: normal, em alerta e em falta, de acordo com o estoque mínimo
- Pesquisa de produtos e usuários por nome
- Perfil do usuário com foto
- Tela de suporte

## Tecnologias

- PHP
- MySQL
- HTML, CSS e JavaScript
- jQuery e jQuery Mask
- Bootstrap
- Protótipos no Figma
- XAMPP (ambiente de desenvolvimento)
- Git e GitHub

## Banco de dados

Três tabelas principais:

| Tabela | Descrição |
|---|---|
| `cadastros` | Usuários do sistema (nome, e-mail, telefone, senha, cargo, foto) |
| `produtos` | Produtos (nome, grupo, quantidade, validade, estoque mínimo) |
| `estoque` | Movimentações de entrada e saída, ligadas aos produtos |

## Prints

<!-- Coloque os prints na pasta docs/img e ajuste os nomes abaixo -->

| Login | Painel de controle |
|---|---|
| ![Login](docs/img/login.png) | ![Painel](docs/img/painel.png) |

| Cadastro de produto | Controle de estoque |
|---|---|
| ![Cadastro](docs/img/cadastro-produto.png) | ![Estoque](docs/img/controle-estoque.png) |

## Como executar

1. Instale o [XAMPP](https://www.apachefriends.org/) e inicie o **Apache** e o **MySQL**.
2. Clone este repositório dentro da pasta `htdocs` do XAMPP:
   ```
   git clone https://github.com/Fabricio-Campos/TCC.git
   ```
3. Acesse o phpMyAdmin (`http://localhost/phpmyadmin`), crie um banco chamado `sistema-hayai` e importe o arquivo `schema.sql`.
4. Na pasta `php`, copie `conexao.example.php` para `conexao.php` e preencha com os dados do seu MySQL.
5. Acesse `http://localhost/TCC/login.html`.

## Minha evolução

Este projeto foi desenvolvido durante o curso técnico, e hoje consigo enxergar pontos que quero melhorar. Registro aqui o que já fiz e o que vem pela frente.


**Melhorias planejadas**
- [ ] Armazenar senhas com `password_hash()` e validar com `password_verify()`
- [ ] Usar *prepared statements* nas consultas para evitar SQL injection
- [ ] Proteger as páginas internas com verificação de sessão e de perfil de acesso
- [ ] Organizar o código em camadas (padrão MVC)
- [ ] Refazer o sistema em **Java com Spring Boot** e **PostgreSQL**, com API REST

## Minha participação

Fui responsável pela maior parte da programação do sistema:

- **Front-end:** desenvolvimento das telas em HTML, CSS, JavaScript e Bootstrap, a partir dos protótipos feitos no Figma
- **Back-end (em dupla com uma colega):** cadastro e controle de usuários, cadastro de produtos, controle de estoque com entradas e baixas, login com sessão e upload de foto de perfil
- **Banco de dados:** implementação das tabelas no MySQL e integração com o PHP

## Equipe

Projeto desenvolvido em equipe por seis alunos (Takaki's Company) da Etec de Poá, sob orientação das professoras Carla Fabiane Calixto da Silva Nunes e Kelly Cristine de Oliveira Dal Pozzo.

## Autor

**Fabrício Campos**
Estudante de Análise e Desenvolvimento de Sistemas na FATEC Ferraz de Vasconcelos

[LinkedIn](https://www.linkedin.com/in/fabricio-silva-campos/)
