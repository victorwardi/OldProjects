PLEASE FOLLOW INSTRUCTIONS VERY CAREFULLY!!!

NOTE: This script requires a MySQL database to function. The database can be created by running the sql file that is included in this package. The file is named super_calendar.sql. You are most likely going to have to run the create database command from the mysql monitor at the command line of the server. You may be able to run the command in a program like phpMyAdmin IF MySQL permissions are set correctly. The sql file will create a sample event which you can delete if you like

STEP 1: 
Run the sql file to create the database and tables.

STEP 2:
Link to the style sheet and javascript file in the head section of your XHTML document.

<link rel="stylesheet" type="text/css" href="/calendar/super_calendar_style.css" />
<script type="text/javascript" src="/calendar/super_calendar.js"></script>

STEP 3: 
Put this in your XHTML document where you want the calendar to appear. The calendar is set up to be centered in its parent container and occupy 400px. The events will occupy 100% of the parent container.

<div id="calback">
	<div id="calendar"></div>
</div> 

STEP 4:
Put this right before the closing body tag in your XHTML document.

<script type="text/javascript">navigate('','','');</script>

STEP 6:
Edit these files in the calendar folder according to the comments in the code.

/calendar/super_calendar.php -> lines 10-12, the MySQL variables need to be set.
/calendar/super_calendar_admin.php -> lines 27-29, the MySQL variables need to be set and line 4, the username / password should be modified.

STEP 7:
Upload the calendar directory to your server. Make sure you keep the directory intact! Upload the whole thing which will create a new directory inside the public_html folder on your server.

STEP 8:
Upload your XHTML document to your server. Load the file into your browser to make sure it works correctly.

STEP 9:
Go to /calendar/super_calendar_admin.php file with your browser, login with username / password you defined in step 6. Create a new event or edit an existing event using the links at the top left of the admin panel.

HOPE IT WORKS WELL FOR YOU!!

www.bmgadg.com