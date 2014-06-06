shortify
========

Пример сервиса коротких урлов. Реализовывался в рамках тестового задания.
Для установки нужно:
1. В папку libs подложить папку framework с исходниками Yii
2. В папку protected/extensions/bootstrap распокавать Yiistrap (http://www.getyiistrap.com/)
3. В конфиге protected/config/db.php прописать свои параметры подключения к БД
4. Накатить миграции с помощью команды php yiic migrate в директории protected
5. В конфиге protected/config/main.php в блоке params прописать свой хост для коротких урлов в параметре hostname
6. Для доступа в админку нужно зайти по адресу http://sitename/backend/ стандартный логин пароль admin/admin

Заходим на главную и тестируем сервис :)
