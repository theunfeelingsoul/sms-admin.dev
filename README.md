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
7. Created compose.php page. To send an sms
8. Added the Africa's talking

todo
----
1. Optimise the smstext class
2. fix the sent items to show ... after 3 numbers
	when u click the likn and read the sms then you can see all the numbers.
3. in compose.php fix the discard,draft button
4. in the TO: field have the autocomplete function like 
   wordpress tags
5. in mailbox.php. fix or remove the icons
	fix the search 
	fix the delete
	fix the delete by the checkbox
6. fix the breadcrums