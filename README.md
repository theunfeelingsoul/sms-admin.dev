# sms-admin.dev
sms-admin-dev

This is an SMS app.

Can manage people contacts. 

SMS functionality still under way.

1/25/2016 Monday
----------------
1. Created two sidebar links i.e inbox and compose
2. Created the mailbox.php page. Gets data from the database 
3. Created the read-sms page. This read a elected sms from the mailbox.php
4. Changed the name of the database to smsapp from smsfrom.
5. Created a tabled named sms. To store the sent sms. 
6. Created an sms class to handdle the database calls for maibox.php, read-sms
	will change the remaining pages to use this class.

todo
----
1. Make the compose.php hage to send an sms and store the sent sms. 
2. Optimise the smstext class
