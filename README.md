## Teste de desenvolvimento em Yii2 Framework

Esta api foi desenvolvida utilisando o framework [Yii2](https://www.yiiframework.com/) v2. 


## Como rodar o projecto

Para rodar o Projecto você precisa ter o Php, composer e o Mysql instalado na sua máquina e bem configurado.

Após a configuração do Php, composer e do Mysql, abra o seu terminal e faça o clone do projecto caso tenhas o git configurado na sua máquina, caso não, baixe o projeto manualmente aqui no repositório.

      $ git clone https://github.com/anatanieldiogo/API---Coalize

 Depois, acessar o diretório do projecto(API---Coalize) pelo terminal e seguir os passos:


Instalar as dependências
    
    $ composer install


Configurar a inicialização do yii2:

    $ php init

Exibirá um menu como este:

    Yii Application Initialization Tool v1.0
    
    Which environment do you want the application to be initialized in?
    
      [0] Development
      [1] Production

Selecione "0" e então Enter, de seguida aparecerá a questão e responda "yes"

    Initialize the application under 'Development' environment? [yes|no]

Então criará alguns arquivos fundamentais para a inicialização do yii2 como abaixo:

    Start initialization ...
    
       generate yii_test.bat
       generate backend/config/main-local.php
       generate backend/config/test-local.php
       generate backend/config/params-local.php
       ...

Configurar o banco de dados Mysql no arquivo `common/config/main-local.php`

    'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=NOME_DO_SEU_BANCO_DE_DADOS',
            'username' => 'NOME_DO_USUARIO_MYSQL',
            'password' => 'PALAVRA_PASSE_CASO_HAVER',
            'charset' => 'utf8',
        ],

Após a configuração do banco de dados podemos rodar as migrations para a criação das tabelas no banco de dados:

    $ php yii migrate

Exibirá uma lista com as migrations do projeto e a seguinte pergunta:

    Apply the above migrations? (yes|no) [no]:

Responda "yes" e então criará as tabelas no banco de dados.

Feito isso, podemos inicializar o servidor:

    $ php yii serve --docroot="frontend/web/" --port=8888

## Autenticação - token

Para criar um usuário devemos acessar o projeto pelo browser `http://localhost:8888/` e acessar o menu "signup" 
e então cadastrar o usuário e depois iniciar a sessão(logar) acessando o menu "Login" para obter o token.

![Screenshot](https://github.com/anatanieldiogo/API---Coalize/assets/69877170/762f7670-23fb-4838-b91c-2764355ed58e)
![Screenshot(1)](https://github.com/anatanieldiogo/API---Coalize/assets/69877170/9ceba380-a3fb-4634-bfa1-d3d3a88a3b94)
![Screenshot(3)](https://github.com/anatanieldiogo/API---Coalize/assets/69877170/1dbadef4-6b10-43d2-9669-4e3ad6bb18e2)


## Endpoints

Para testar o funcionamento correto dos endpoints aconselho a utilização do [Postman](https://www.postman.com/) ou de outra ferramenta a sua escolha!

Os endpoints são protegidos por um token gerado após o login, e o mesmo é do tipo `Bearer Token`.

configurar o token no Postman [Bearer Token](https://www.youtube.com/watch?v=PPi9teNKRHY)


## Tipos de requisições:

- localhost:8888/clientes `POST`
    -  nome
    -  cpf
    -  foto
    -  sexo
- localhost:8888/clientes?per-page=2&page=1 `GET`
    - `?per-page=2` este parametro retorna um determionado número de clientes por página, no caso acima 2 clientes
    - `page=1` este parametro retorna uma determinada página
- localhost:8888/enderecos `POST`
    - cep
    - logradouro
    - numero
    - cidade
    - estado
    - complemento
    - cliente_id
- localhost:8888/enderecos `GET`
    - `?expand=cliente` este parametro retorna os endereços com os seus respetivos donos
- localhost:8888/produtos?per-page=2&page=1 `GET`
- localhost:8888/produtos `POST`
    - cliente_id
    - nome
    - preco
    - foto

## Experiência com Yii2
Antes deste projeto, eu nunca havia trabalhado com Yii2. Para completar o projeto, estudei a documentação oficial e diversos tutoriais online. Apesar da curva de aprendizado, consegui implementar a maioria das funcionalidades conforme solicitado. Este projeto foi uma excelente oportunidade para aprender e aplicar os conceitos do Yii2 em um cenário prático.

Estou aberto a feedbacks e sugestões sobre como posso melhorar tanto este projeto quanto minha proficiência com Yii2. Agradeço pela oportunidade de participar do processo seletivo e espero que o projeto esteja de acordo com as expectativas.

**NOTA:** Se por algum motivo não for possível executar o sistema porfavor entrar em contato!
