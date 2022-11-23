# Личный блог на WordPress

## Сайт блога
https://...

## Зависимости
[jQuery](https://jquery.com/)<br>
[Range slider Metalamp](https://github.com/nea2310/Metalamp-4th-task)<br>
[Slick Slider](https://github.com/....)<br>


## Файловая структура

#### `config`
Файлы конфигурации webpack

#### `inc`
Файлы php-библиотек и плагинов

#### `tools`
Файлы вспомогательных инструментов

#### `vendors`
Файлы js-библиотек и плагинов
```
vendors
| jquery
└─── slider-metalamp
└─── slick
```

#### `src`

```
src
| index.js
└─── assets
|  └─── fonts
|  └─── images
|  └─── styles
└─── components
   └─── js
   └─── scss

* `fonts`  -  файлы шрифтов
* `images`  -  файлы изображений
* `styles`  -  файлы общих стилей, в т.ч. описание scss-переменных и миксинов
* `js`  -  js-компоненты
* `scss`  -  scss-компоненты
```

##### .eslintrc.json - 
##### .gitignore - 
##### package.json - 
##### category.php - 
##### footer.php - 
##### functions.php - 
##### header.php - 
##### index.php - 
##### page-blog.php - 
##### page-cv.php - 
##### page-hobby.php - 
##### page-landing.php - 
##### sidebar.php - 
##### single.php - 
##### style.css - 



## Сборка проекта 

* Node version v14.18.1

* Установка зависимостей:
  ``` npm i ```

* Сборка в режиме development:
  ```npm run dev```