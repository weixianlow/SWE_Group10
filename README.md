# SWE_Group10
Software Engineering Final Project - Group 10

# Setup
* Download node.js
* Make sure npm is installed by using the following command: npm --version
* Open terminal and navigate to your project location
* Do the following command: npm install
* You are now ready to go and all dependencies are loaded

# Add new dependency
* npm install <name of dependency> --save
* Note: --save will add it to the dependency list in package.json
* Check package.json, check dependencies and make sure it is added

## Server Deployment by Wei Xian Low


Due to the nature of the web application, this web application would require an environment that is flexible enough to handle web request and also able to handle a noSQL system running alongside with it. With that requirement in mind, an EC2 instance powered by Amazon AWS is used in this set up. The EC2 instance has a Ubuntu 14.04 environment being used for our web app and hosting MongoDB. 


#### Dependencies
In this server, a few dependencies needed to be installed on the server to ensure proper functionality is provided. By using the “apt-get” function available in the bash terminal the following modules/functionality is installed in the following order:
##### Apache2
To install the apache2 web server to allow traffic redirection to the proper file path, the following command is used: 
> $ sudo apt-get install apache2
##### MongoDB
The first step required to install MongoDB is to add the required repository into the system to let system know where to fetch the required files:
> $ sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 7F0CEB10
> $ echo ‘deb http://downloads-distro.mongodb.org/repo/ubuntu-upstart dist 10gen’
> $ sudo tee /etc/apt/sources.list.d/mongodb.list

After configuring the required repository for the installation, proceed with installing the required files for MongoDB:

>$ sudo apt-get update
> $ sudo apt-get install mongodb-org mongodb-org-server


##### PHP5
PHP5 is required to allow use to execute php scripts to extend the functionality of our web applications, hence the PHP5 files will be installed into the system:


> $ sudo apt-get install php5 php5-dev libapache2-mod-php5 apache2-threaded-dev php-pear php5-mongo

4. MongoDB PHP Module
After installing PHP5, it needs to be configured to properly call MongoDB when mentioned in the script. The Mongo PECL extension needs to be installed: 


> $ sudo pecl install mongo

After installing the extension, PHP5 to recognize the extension, navigate to the “php.ini” file to add a line at the end of the file. 


> $ cd /etc/php5/apache2/

Then by using the nano editor in bash,  navigate to the end of file for the file “php.ini” and add the following line at the bottom in between the quotation marks: 


> “extension=mongo.so”

After configuring the php.ini file, apache services is restarted to refresh its configuration
>$ sudo service apache2 restart
##### Testing of Dependencies
After installing all the necessary dependency needed by the web application, a test and checking is needed to be performed to ensure that all installation and configuration is performed correctly. To test if apache is working correctly, we would need to navigate to the public IP address of the EC2 instance, by navigating it through a web browser this page should appear serving as a landing page: 
![apache landing page](https://staging.cs4320.weixianlow.me/images/apacheDefault.png)
This page shows that the apache is configured correctly and it’s properly redirecting traffic to the proper directories. To test if PHP is working, a simple PHP script is created with the following line

> <?php phpinfo(); ?>

By navigating to the php script on a web browser, this page should appear:
![php info page](https://staging.cs4320.weixianlow.me/images/phpinfo.PNG)
With this page appearing, scroll down to the mongo section to see if php is configured to work with MongoDB and the proper port number is assigned:
![mongo configuration info](https://staging.cs4320.weixianlow.me/images/mongo.PNG)

#### Domains and subdomains
Although Amazon AWS has provides a public IP address and a public DNS address, a shorter and simple domain is more easier to navigate and connect instead of typing in long numbers. Team member Wei Xian Low has provided a subdomain on his domain that will point to the public IP address provided with the EC2 instance. The provided subdomain is: 

>http://cs4320.weixianlow.me

An A record is required with the domain’s DNS to provide proper redirecting to the server. 
With the nature of the code, a different environment to test codes that currently being tested so that untested code would not affect the actual program is created, hence a sub-subdomain is created to allow testing of code here:

> http://test.cs4320.weixianlow.me. 

In order to create a subdomain, a configuration file for apache2 is needed to be created to work with. A default configuration file could be found at this directory in the server: “/etc/apache2/sites-available/000-default.conf”. By duplicating this file and renaming it, the data in the configuration is replaced to fit with the need of the web application. By pointing the DocumentRoot to a new directory other than the default directory for apache, the test code could then be isolated easily. The ServerAddress needs to be changed to test.cs4320.weixianlow.me to let apache understand where to redirect the traffic to their proper directory. 


After configuring the necessary configuration, the new configuration file needs to be enabled. This is done through by running the following command in bash to notify apache2 to enable it: 


> $ sudo a2ensite <CONFIGURATION FILE NAME>.conf

apache2 is then restarted with the following command in bash for the configuration to be put into effect: 


> $ sudo service apache2 restart

By navigating to the URL, the directory serving the subdomain will be properly navigated with a helloworld.html file that has been placed in the directory. 


#### Security
##### SSH/SFTP
Due to the Amazon AWS security protocol, every EC2 instance created is provided a signature permission key to allow password-less access through SSH and SFTP. The permission key is distributed to every team member to ensure equal access to the server. After obtaining the permission key, team member would have to then generate their own permission by using a key generator either through putty or the FTP client of their choice. The generated key is then unique to their computer and is then used to authenticate themselves to the server. 
HTTPS/SSL Certification
	Due to the nature of the web application we are currently developing, which involved the use of storing research data that could be confidential or containing sensitive data, a proper encryption and identity verification is required between the client and the server. SSL certificate is created for all of the domain so that identity is verified during data transfer. With HTTPS implementation, the risk of man in the middle (MITM) attacks are reduced significantly.  LetsEncrypt, a free and open source SSL certificate provider that aims to help encrypt and provide SSL certificate to the world for free is chosen to provide us with the necessary SSL certificate. By using a certificate-bot provided from LetsEncrypt, we are able to generate the necessary certificate for all the domains and subdomains we’re currently using. 


To install the necessary SSL certificate from LetsEncrypt, the necessary installation file for it is downloaded into the server. Proper directory is selected to store the scripts:


> $ cd /usr/local/sbin/
	
Then the necessary file is downloaded and made executable: 
>	$ sudo wget https://dl.eff.org/certbot-auto
>	$ sudo chmod a+x /usr/local/sbin/certbot-auto

After downloading the necessary file, the script is executed to provide us with a proper SSL certificate. Both the main site and the testing site needs to be configured for SSL certification, the following command is being used: 


> $ certbot-auto --apache -d cs4320.weixianlow.me -d test.cs4320.weixianlow.me

The above command uses the downloaded script to automatically generate the required script. Bare in mind, the base domain needs to be the first one on the command and it’s followed by the rest of the subdomains separating with a “-d” in the arguments of the command.


During execution of the script, a question is asked to see if user wants a 100% enforcement of HTTPS on the server, that option is selected. 


After setting up the necessary SSL certificate, automatic renewal of the SSL certificate is created so fresh certification is available. Crontab is used to automate the renewal processes, the following command is used to edit the crontab configuration:  


> $ sudo crontab -e

And the following line is added to the end of the cron configuration file: 


> 30 2 * * 1 /usr/local/sbin/certbot-auto renew >> var/log/le-renew.log

The above line tells crontab to perform the required command every monday at 2:30am and will output the log to a log file located at /var/log/le-renew.log


The SSL certificate that has been generated from us needs to be tested to ensure it’s configured properly, the following site is used to test the generate SSL certificate to ensure it’s properly set up: 
>https://www.ssllabs.com/ssltest/analyze.html?d=cs4320.weixianlow.me&latest
>https://www.ssllabs.com/ssltest/analyze.html?d=test.cs4320.weixianlow.me&latest	

##### File/Directory Permission and Ownership
To be able to handle file upload to the server and executing php scripts, all files and directory is to be configured properly with the right permission and ownership in the system. 


For file uploads, the directory that’s designated to handle all upload needs to be owned by the user www-data:


> $ sudo chown www-data:www-data <insert file directory here>


For php scripts to be executed when needed to only allow reading and executing but restricted from writing: 


> $ sudo chmod 755 <insert file directory here>