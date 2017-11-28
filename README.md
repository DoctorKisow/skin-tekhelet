# Tekhelet

**Tekhelet** – The look and feel of the Kisow Foundation Wiki.  
Matthew R. Kisow, D.Sc. <matthew.kisow@kisow.org>  
Copyright &copy; 2015-2017, Kisow Foundation, Inc.&reg;

The Tekhelet theme is based in part on the Tyrian theme by Alex Legler.

## Typical Directory Structure
     var  
     |--  www  
     |--  assets.example.com  
     |    |--  Tekhelet  
     |  
     |--  wiki.example.com  
          |--  skins  
               |--  Tekhelet  

## Install the MediaWiki Skin
1. Download and compile the ["_**tekhelet-source**_"](https://github.com/DoctorKisow/tekhelet-source.git) theme.
   See the **README.md** or **README.txt** file(s) located in the **tekhelet-source** directory for the compile instructions.
2. After compiling the theme, copy the contents of the **tekhelet-source/assets** folder to the Tekhelet  directory on the assets.example.com VirtualHost:  
   `mkdir -p /var/www/assets.example.com/Tekhelet`  
   `cp tekhelet-source/assets/ /var/www/assets.example.com/Tekhelet/`  
3. From your MediaWiki skins directory the clone skin-tekhelet from this repository by typing:  
   `mkdir -p /var/www/wiki.example.com/skins/Tekhelet`  
   `cd /var/www/wiki.example.com/skins/Tekhelet`  
   `git clone https://github.com/DoctorKisow/skin-tekhelet.git`  
4. In your MediaWiki **LocalSettings.php** configuration add the following line(s) at the end of the file:  
   _$wgDefaultSkin = 'Tekhelet';  
   require_once "$IP/skins/Tekhelet/Tekhelet.php";_  

## Apache VirtualHost Example
_The configuration below will serve the Tekhelet theme to your MediaWiki server over a secure connection and deny all other connections._  
```shell
<VirtualHost _default_:80>  
    ServerName assets.example.com  
    ServerAdmin webmaster@example.com  
    DocumentRoot /var/www/assets.example.com  

    Redirect / "https://assets.example.com/"  

    ErrorLog ${APACHE_LOG_DIR}/assets.example.com.error.log  
    CustomLog ${APACHE_LOG_DIR}/assets.example.com.log combined  
    ServerSignature Off  
</VirtualHost>  

<VirtualHost _default_:443>  
    ServerName assets.example.com  
    ServerAdmin webmaster@example.com  
    DocumentRoot /var/www/assets.example.com  

    Header always add Strict-Transport-Security "max-age=15768000; includeSubDomains; preload"  

    SSLEngine on  
    SSLCipherSuite EECDH+AESGCM:EDH+AESGCM:AES256+EECDH:AES256+EDH  
    SSLHonorCipherOrder on  

    SSLCertificateFile /etc/letsencrypt/live/assets.example.com/cert.pem  
    SSLCertificateKeyFile /etc/letsencrypt/live/assets.example.com/privkey.pem  
    SSLCertificateChainFile /etc/letsencrypt/live/assets.example.com/chain.pem  

    <Directory "/var/www/assets.example.com">  
        Options -Indexes  
        AllowOverride None  
        Require all granted  
    </Directory>  

    <IfModule mod_headers.c>  
        <FilesMatch "\.(ttf|ttc|otf|eot|woff|woff2|font.css|css|js)$">  
            Header set Access-Control-Allow-Origin "https://wiki.example.com"  
        </FilesMatch>  
    </IfModule>  

    ErrorLog ${APACHE_LOG_DIR}/assets.example.com.error.log  
    CustomLog ${APACHE_LOG_DIR}/assets.example.com.access.log combined  
    ServerSignature Off  
</VirtualHost>
```
