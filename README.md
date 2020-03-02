# RTGI Manufacturing System
Contains installation and other information for RTGI Manufacturing System.

### Requirements
This website is developed using PHP framework [Codeigniter 3.1.11](https://codeigniter.com/en/docs) and requires: 
1. __Language:__ PHP version 5.6 or newer.
1. __Database:__ MySQL (5.1+) via the mysql (deprecated), mysqli and pdo drivers. 
1. __Hosting:__ Linux with cPanel recommened, Windows with Plesk would require additional configurations. 

For more details please refer https://codeigniter.com/user_guide/general/requirements.html

### Installation
Later versions will contain an installation script but for now follow the below steps.
1. Download the latest released version's zip.
1. Extract and upload files to the root directory of your hosting account.
1. Open application/config/config.php and update the base url https://localhost/rms/
1. __Database configurations__
    * Create MySQL database 
    * Create user name and password
    * Open application/config/database.php and update hostname, username, password and name for database.
    * For fresh installation import the rtgidatabase.sql included in the download.

### Important - Linux server configuration
1. Controller and model name must start with upper case letter.
1. File extensions case must match for example .JPG and .jpg are not same.

This website and its content is copyright of Rituraj Textile &amp; General Industries Pvt. Ltd. - &copy; 2017-2020. All rights reserved.     