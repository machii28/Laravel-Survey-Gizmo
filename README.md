# Laravel-Survey-Gizmo

A Laravel SurveyGizmo API implementation.

## Installation
Run this command, in able to install the package 
```
composer require machiii\laravel-surveygizmo
```

## Service Provider
Add this to your `config/app.php` 

```
'providers' => [
    SurveyGizmo\SurveyGizmoProvider::class,
]
```

and for the facade aliases

```
'aliases' => [
    'SurveyGizmo' => SurveyGizmo\SurveyGizmoFacade::class,
]
```
