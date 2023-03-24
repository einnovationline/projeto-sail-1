<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

![Badge em Desenvolvimento](http://img.shields.io/static/v1?label=STATUS&message=EM%20DESENVOLVIMENTO&color=GREEN&style=for-the-badge)

> :construction: project in by me :construction:

<img src="https://avatars.githubusercontent.com/u/112901428?s=400&u=e22d3f320aedbcda26c2f9b14b71d4f11556f475&v=4" width=115><br><sub></sub>

Foco na aprendizagem no Laravel.

<h2>Projeto de referência</h2>
https://www.youtube.com/watch?v=R2lS_rORCQE

Links úteis:
- Instalação Laravel
[https://laravel.com/docs/9.x/installa...](https://laravel.com/docs/9.x/installation)

- Laravel Sail
https://laravel.com/docs/9.x/sail

### Comando úteis:

- Clonando aplicação laravel:<p>
curl -s "https://laravel.build/example-app" | bash

- Acessando pasta da aplicação
cd example-app 

- Executando o Sail
./vendor/bin/sail up

- Permissão de Pastas
chown sail:sail -R storage/*

- Limpando o Docker
docker system prune

- Editar configurações no Drive MySQL ao conectar via Dbeaver
"useSSL" ⇒ false
"allowPublicKeyRetrieval" ⇒ true

- Alias padrão
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

- Setando o alias permanentemente
nano ~/.bashrc
alias sail='[ -f sail ] && bash sail || bash ~/path/to/app/vendor/bin/sail'

- Comando úteis
sail up -d
sail down
sail —help
sail artisan optimize:clear
sail artisan migrate
sail share
sail ps
sail shell

Acessar o projeto
http://localhost
