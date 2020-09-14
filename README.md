# 基于 Yii2 的项目模板

## Docker Compose 环境

配置了以下服务（service）：

| 服务名 | 主进程 | 说明
| --- | --- | ---
| mysql | MySQL 5.7.24 数据库 | 首次启动时自动创建 `app`（开发）、`app_test`（测试）数据库
| redis | Redis 4.0.12 数据库 | 主密码为 `1234`
| fpm | PHP-FPM 7.4.9 进程池 | ~ |
| nginx | Nginx 1.14 HTTP 服务器 | ~ |

### 启动环境

使用本环境，必须在项目根目录创建 `.env` 文件，内容可参考 `.env.example`。

执行命令：

    docker-compose up -d

### 安装 PHP 包

    docker-compose run --rm --user dev cli composer install

### 安装定时任务

    docker-compose exec --user root cron crontab -u dev /code/docker/cli/crontab

### 安装前端依赖

    docker run -it --rm -v $PWD:/code -w /code --user dev node:8-alpine yarn install

### 打开 MySQL 命令行客户端

    docker-compose exec mysql mysql -u root -proot

### 执行 migration

    docker-compose run --rm --user dev cli php yii migrate/up
