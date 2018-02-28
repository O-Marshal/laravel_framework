
## Laravel 模块化开发脚手架

### 创建模块：
你可以通过在终端中运行 `create-project` 命令来创建一个 `ProductModule`：
```php
composer create-project --prefer-dist ckryo/laravel_module ProductModule
```

### 目录结构说明
```
bootstrap/  # laravel项目目录
 -| cache   # 原laravel项目下 /bootstrap/cache 目录
 -| config   # 原laravel项目下 /config 目录
 -| storage   # 原laravel项目下 /storage 目录
 -| app.php   # 原laravel项目下 /bootstrap/cache 目录
 -| cache   # 原laravel项目下 /bootstrap/cache 目录
```