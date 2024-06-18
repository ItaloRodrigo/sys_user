<h1>sys_user </h1>
### Sistema para controle de usuários

## Dados do candidato
**Nome: Ítalo Rodrigo Soares Silva **
- Mestre em Engenharia com ênfase em Otimização de Processos Industriais
- Cientista da Computação

## Clone o repositório
~~~git
https://github.com/ItaloRodrigo/sys_user.git
~~~

## Configuração do banco de dados PostgreSQL

### instalação do SGBD e seus componentes (versão 16.3 para Windows x86-64)
Disponivel em: https://www.postgresql.org/download/
<p>Proceda com a instalação!</p>
- superuser: postgres
- password: postgres



## Configuração do servidor Laragon

#### laragon full 5.0.0 210523 
#### php 8.0.22-nts-Win32-vs1-x64
Disponível para download em: https://laragon.org/download/

>Favor, ao instalar o Laragon configurar a extensão do php acessando a opção **"Menu"** conforme mostrado na imagem abaixo: **pdo_pgsql**

![image](https://github.com/ItaloRodrigo/sys_user/assets/28151367/b64ba41c-1c0e-4fa7-9850-ae3f6fb84b78)


## Backend (Laravel)
#### configuração do .env 
~~~php
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=dbsys_user
DB_USERNAME=sys_user
DB_PASSWORD=
~~~
