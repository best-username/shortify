shortify
========

Пример сервиса коротких урлов. Реализовывался в рамках тестового задания.<br/>
Для установки нужно:
<ol>
<li>В папку libs подложить папку framework с исходниками Yii</li>
<li>В папку protected/extensions/bootstrap распокавать Yiistrap (http://www.getyiistrap.com/)</li>
<li>В конфиге protected/config/db.php прописать свои параметры подключения к БД</li>
<li>Накатить миграции с помощью команды php yiic migrate в директории protected</li>
<li>В конфиге protected/config/main.php в блоке params прописать свой хост для коротких урлов в параметре hostname</li>
<li>Для доступа в админку нужно зайти по адресу http://sitename/backend/ стандартный логин пароль admin/admin</li>
</ol>
Заходим на главную и тестируем сервис :)
