# Laravel Voyager Testing
Voyager Project :D

## Installation
```sh
composer install --ignore-platform-reqs
php artisan jwt:secret
php artisan db:initialize
```

# Tasks Completed
1. Si
2. Si
3. Si
4. Si: El archivo de configuración de voyager tiene bugs, por lo que tuve que ir directo al seeder del usuario y cambiar el namespace para que el observer pueda funcionar :/
5. Si
6. Si
7. No: Perdí mucho tiempo debugeando el archivo de configuración :/ y olvide hacer esta tarea
8. Si: La queue la he dejado en chunks de 500, he probado con 1000 pero mi pc se empieza a explotar, se lo debería probrar directo en el servidor donde se piensa deployar la applicación.
8.1. Si: Aunque creo que se podría mejorar mi código :D 
9. Si: Voyager usa "web" y JWT usa "api", todo mediado por un middleware
10. Si
11. Si 
12. Si