How to Run this Project Locally
This guide will walk you through the process of setting up and running the Distributor Management System on your local machine.

Step 1: Set Up a Local Server Environment
Since this project is built with PHP and MySQL, you need a local server environment to run the code and manage the database. The easiest way to do this is by installing a package like XAMPP or WAMP. These bundles include Apache (the web server), PHP, and MySQL (or MariaDB) in a single installer.

Download and Install:

For XAMPP, go to the official Apache Friends website and download the installer for your operating system (Windows, Mac, or Linux).

For WAMP, visit the WampServer website and download the version for Windows.

Start the Servers:

After installation, open the XAMPP or WAMP control panel.

Start the Apache and MySQL modules. You should see their status indicators turn green, which means the servers are running.

Step 2: Set Up the Project Files
Locate the htdocs Folder: The htdocs directory is the root folder for your web server. It's where you'll place all your project files. You can find it inside your XAMPP installation directory (e.g., C:\xampp\htdocs).

Create a Project Folder: Inside htdocs, create a new folder for your project. You can name it something like distributor-dms.

Copy Files: Copy all the project files you've uploaded to GitHub (your PHP files, images, etc.) into this new distributor-dms folder.

Step 3: Import the Database
Open phpMyAdmin: In your web browser, navigate to http://localhost/phpmyadmin. This is the web interface for managing your MySQL database.

Create a New Database: Click on the "Databases" tab and create a new database. It's a good practice to name it distributor to match the project's code.

Import the SQL file: Select the distributor database you just created. Click the "Import" tab at the top.

Upload SQL file: Click the "Choose File" button and select the distributor (2).sql file from your project folder. Then, click the "Go" button to start the import. This will create all the necessary tables and populate them with the initial data.

Step 4: Run the Application
Access the Login Page: Open a new browser tab and go to the URL: http://localhost/distributor-dms/login.php.

Log In: Use the default credentials from your mylogin table to log in and begin using the system.
