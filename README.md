# Mincurso Laravel - Web simplificada

## Propósito
O minicurso Laravel tem como objetivo fornecer aos participantes uma introdução sólida e prática ao desenvolvimento web com o framework Laravel. Durante este curso de 8 horas, os participantes aprenderão a criar aplicativos web modernos e robustos usando as melhores práticas do Laravel.

## Público-Alvo
Este minicurso destina-se a desenvolvedores web iniciantes e intermediários que desejam aprender a desenvolver aplicativos web usando o Laravel.

## Pré-requisitos
* Conhecimento básico de PHP
* Familiaridade com o ambiente de desenvolvimento web (HTML, CSS, JavaScript)
* Ambiente de desenvolvimento Laravel configurado (Laravel instalado, servidor web configurado)

## **Ementa:**

### **Módulo 1:** Introdução ao PHP e Laravel
Introdução ao PHP
Visão geral do Laravel e suas vantagens
Configuração do ambiente de desenvolvimento Laravel
Criação de um projeto Laravel básico

### **Módulo 2:** Rotas e Controladores
Definição de rotas
Criação de controladores
Passagem de dados das rotas para os controladores
Uso de middlewares

### **Módulo 3:** Views e Templates
Criação de views
Uso de layouts e templates
Passagem de dados das controladores para as views
Utilização de Blade, o mecanismo de template do Laravel

### **Módulo 4:** Banco de Dados com Eloquent ORM
Configuração de conexões de banco de dados
Criação de modelos Eloquent
Realização de operações CRUD no banco de dados
Relacionamentos Eloquent


## Certificado
Ao final do minicurso, os participantes que concluírem todas as atividades receberão um certificado de conclusão.

Lembre-se de personalizar a ementa de acordo com as necessidades específicas do seu público e os objetivos do seu minicurso. Boa sorte com o seu minicurso de Laravel!

## Usando docker
```sh
    docker run --rm -v "$(pwd)":/app composer install # Somente na primeira vez
    docker-compose up
    docker-compose exec app php artisan optimize # Opcional
```
