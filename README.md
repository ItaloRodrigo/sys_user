# Informações do desafio

## Dados do candidato
**Nome: Ítalo Rodrigo Soares Silva **
- Mestre em Engenharia com ênfase em Otimização de Processos Industriais
- Cientista da Computação

## Requisitos do projeto
- O sistema contempla um backend rodando em PHP (framework **Laravel**) na versão 11.x, conexão com o banco de dados PostgreSQL
- O sistema contempla um frontend rodando em Javascript (framework **Vue.js**), utilizando o framework de componetização **Vuetify3**
- O sistema contempla um CRUD de usuários (Listar, Cadastrar, Atualizar e Deletar)

## Decisões tomadas

### Análise e planejamento
Após compreender os requisitos, fiz uma análise detalhada das possíveis abordagens para resolver o problema. O principal foi desenhar o fluxo da arquitetura e mapear todos as classes e dependências necessárias para facilitar o start do desenvolvimento. Como tinha pouco tempo, não utilizei ferramentas de prototipagem como adobe XD ou Figma para elaboração do design, fiz no tradicional papel e caneta.

### Orgnanização do Código
Para manter o código organizado, legível e manutenível, adotei uma abordagem modular utilizando o MVC como base. Separei as diferentes partes da solução em módulos e métodos, cada um responsável por uma tarefa específica. Isso facilitou a compreensão do código e permitiu reutilizar componentes em diferentes partes da solução, seguindo os princípios de Clean Code. 

### Refatoração e otimização
Ao revisar o código, identifiquei oportunidades de melhorias. Procurei por trechos de código redundantes, ineficientes ou difíceis de entender e os reescrevi para torná-los mais claros e eficientes, bem como deixar o código mais legível conforme as boas práticas do Clean Code.

### Considerações
A arquitetura base de um software é a parte essencial e que demanda maior esforço, haja vista que, é o momento em se define as stacks, o style design e as metodologias a serem utilizadas que podem ou não impactar em um futuro próximo. Nesse projeto foquei em utilizar o máximo das boas práticas de componetização, hooks life cycle, separação de responsabilidades, reaproveitamento de classes e/ou componentes. Desse modo, a projeção e implementação da integração das duas stacks foi satisfatória, é válido ressaltar os pontos de melhoria que infelizmente não puderam ser feitos como: sistema de autenticação com JWT ou OAuth, Sistema de permissões e grupos e um pequeno Dashboard com Chart.js.

No geral foi um excelente desafio, simples e completo ao mesmo tempo, meus agradecimentos à Systock por proporcionar aos desenvolvedores testes de qualidade e que agregam valor no crescimento profissional.

# Procedimentos Técnicos para utilização e instalação

## Informes dos serviços
- backend (Laravel): http://localhost:8000/api
- frontend (Vue.js + Vuetify): http://localhost:3000
- docs (Swagger): http://localhost:8000/api/documentation

## Dependências utilizadas
- backend:
    - laravellegends/pt-br-validator (validações customizadas)
    - darkaonline/l5-swagger (documentação)
    - pdo_pgsql
- frontend:
    - vite
    - vue-axios
    - vuetify
    - pinia

## Backend (Laravel)

## Instalação e configuração do SGBD
Certifique-se de que você tenha instalado o banco de dados PostgreeSQL, caso não tenha será necessário baixar e instalar.
- Acesse o site oficial https://www.postgresql.org/download/
- Proceda com o download e seus componentes (versão 16.3 para Windows x86-64), é gratuito!
- Realize a instalação
- Inicie o processo de configuração e defina as credenciais do super usuário

~~~php
superuser: postgres
password: 123
port: 5432
~~~


## configuração do .env (Banco de dados PostgreSql)
~~~php
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=db_sys_user
DB_USERNAME=postgres
DB_PASSWORD=123
~~~

## Clone o repositório
~~~git
https://github.com/ItaloRodrigo/sys_user.git
~~~

## Criando tabelas com migrations
Antes de migrar o banco de dados com o comando abaixo, é necessário criar o banco no SGDB, o nome do banco é: <strong>db_sys_user</strong>. Após criar o banco de dados no SGBD, utilize o comando abaixo para migrar as tabelas, por gentileza confirme.
~~~php
php artisan migrate
~~~

## Iniciando o serviço do Backend (API Sys User)
~~~php
php artisan serve
~~~

## Frontend (Vue.js)

## Instalar o Node.js e o npm

Certifique-se de ter o Node.js e o npm (Node Package Manager) instalados em sua máquina. Caso não tenha, será necessário baixar e instalar.

- Baixe o Instalador: Acesse o site oficial do Node.js e baixe o instalador para o seu sistema operacional (Windows, macOS ou Linux).

- Execute o Instalador: Após o download, execute o arquivo de instalação. Isso abrirá o assistente de instalação.

- Aceite os Termos de Uso: No assistente de instalação, você provavelmente será solicitado a aceitar os termos de uso. Leia-os e, se estiver de acordo, prossiga.

- Escolha o Diretório de Instalação (Opcional): Em alguns sistemas operacionais, você pode ter a opção de escolher o diretório de instalação. Caso contrário, o Node.js será instalado no diretório padrão.

- Instale o Node.js: Clique no botão de instalação para iniciar o processo de instalação. Isso pode levar alguns minutos, dependendo da velocidade do seu sistema.

- Verifique a Instalação: Após a conclusão da instalação, você pode verificar se o Node.js foi instalado corretamente abrindo um terminal ou prompt de comando e digitando os seguintes comandos:

~~~node
node -v
npm -v
~~~

## Instalar as Dependências

Navegue até o diretório <strong>frontend</strong> do seu projeto e execute o seguinte comando para instalar todas as dependências listadas no arquivo package.json.

~~~git
cd nome_do_projeto_vue npm install
~~~

## Iniciando o serviço do Frontend no Vuejs
Certifique-se de que você tenha o node.js instalado, após checar essa dependência utilize o comando abaixo para iniciar o serviço.
~~~php
npm run dev
~~~

## Testar a aplicação no navegador
Abra o navegador e vá para o endereço URL fornecido pelo servidor de desenvolvimento. Você deve ver projeto em execução.

Este manual básico deve ajudá-lo a começar a executar este meu projeto localmente.
