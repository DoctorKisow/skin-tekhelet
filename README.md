# Tekhelet
**Tekhelet** – The look and feel of the Kisow Foundation Wiki.  
Matthew R. Kisow, D.Sc. <matthew.kisow@kisow.org>  
Copyright &copy; Kisow Foundation, Inc.&reg; 2015-2017.

## Getting Started
This is a theme based on the bootstrap3 framework from Twitter.

## Typical Directory Structure
```shell
     var  
     |--  www  
     |--  assets.example.com  
     |    |--  Tekhelet  
     |  
     |--  wiki.example.com  
          |--  skins  
               |--  Tekhelet  
```

## Installation
1. Download and compile the ["_**tekhelet-source**_"](https://github.com/DoctorKisow/tekhelet-source.git) theme.  
   See the **README.md** or **README.txt** file(s) located in the **tekhelet-source** directory for the compile instructions.

2. After compiling the theme, copy the contents of the **tekhelet-source/assets** folder to the **Tekhelet**  directory on the _assets.example.com_ VirtualHost:
```shell
     mkdir -p /var/www/assets.example.com/Tekhelet  
     cp tekhelet-source/assets/ /var/www/assets.example.com/Tekhelet/
```

3. From your MediaWiki skins directory clone the _skin-tekhelet_ from this repository by typing:
```shell  
     mkdir -p /var/www/wiki.example.com/skins/Tekhelet  
     cd /var/www/wiki.example.com/skins/Tekhelet  
     git clone https://github.com/DoctorKisow/skin-tekhelet.git
```

4. In your MediaWiki **LocalSettings.php** configuration add the following line(s) at the end of the file:
```shell  
     $wgDefaultSkin = 'Tekhelet';  
     require_once "$IP/skins/Tekhelet/Tekhelet.php";
```

## Deployment
_The configuration below will serve the Tekhelet theme to your MediaWiki server over a secure connection and deny all other connections.  Change this file as necessary to suit your configuration._  
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
## License
License (GPL v3.0)

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>.

## Acknowledgments
The **Tekhelet** theme is based in part on the **Tyrian** theme by Alex Legler.
