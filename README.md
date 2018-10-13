stuhot 簡易連署網站
===
stuhot是一個簡單的連署系統，它可以滿足一場連署中的「資訊表示」、「連署牆」、「連署進度視覺化」、「聯署書提交」、「聯署書信箱認證」以上功能。讓提出議題的單位，可以使用資訊化的方式快速傳播連署資訊。

你可以在
https://stuhot.at.tw/
看到本網站實際運作的樣子。

## Framework
- 前端
    bootstrap4
- 後端
    php
    codeigniter 3

## 如何部屬
- 系統部屬
    1. 修改：

    > ../application/config/database.php
    ```php=76
    $db['default'] = array(
	'dsn'	=> '',
	'hostname' => '資料庫名稱',
	'username' => '使用者名稱',
	'password' => '使用者密碼',
	'database' => 'stuhot',
	'dbdriver' => 'mysqli',
    ```
    2. 確認是否正確： 
    > ../application/config/config.php
    ```
    $config['base_url'] = 'http://localhost/stuhot/';
    ```
    > ../.htaccess
    ```php=26
    <IfModule mod_rewrite.c>
        RewriteEngine on
        //需與目錄名稱相同
        RewriteBase /stuhot/
        RewriteCond $1 !^(index\.php|images|dist|pic|robots\.txt|$)
        RewriteRule ^(.*)$ index.php/$1 [L,QSA]
    </IfModule>
    ```

    3. 資料庫建置：
        > ../stuhot.sql
    ```
	Database Name = stuhot
	Character set = utf8 -- UTF-8 Unicode
	Collation = utf8_unicode_ci
    ```
