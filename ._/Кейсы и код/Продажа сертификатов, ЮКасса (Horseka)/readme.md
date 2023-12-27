#Создание типа постов через плагин CPT UI

Basic settings:
- orders
- Заказы
- Заказ

Settings, все в false кроме:
- Show UI
- Show in Nav Menus
- Query Var
- Show in Menu
- Supports (title, editor, custom fields, page attributes)


# Добавляем следующие поля через плагин ACF и привязываем к типу постов

- Статус - строка\число (status)
- Ссылка на оплату - строка (payment_link)
- ID платежа (payment_id)

# В настройки темы (общие для сайта) добавляем поля (строковые)
- ID магазина в системе
- Секретный ключ
- Система налогообложения для магазина - https://yookassa.ru/developers/payment-acceptance/receipts/54fz/parameters-values#tax-systems
- Ставка НДС для магазина - https://yookassa.ru/developers/payment-acceptance/receipts/54fz/parameters-values#vat-codes