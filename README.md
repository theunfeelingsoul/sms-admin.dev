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


4. in the TO: field have the autocomplete function like 
   wordpress tags
5. in mailbox.php. fix or remove the icons
	fix the search 
	fix the delete
	fix the delete by the checkbox


2/4/2016
--------
1. fix the sent items to show ... after 3 numbers
	when u click the link and read the sms then you can see all the numbers.
2. in compose.php fix the discard,draft button
6. fix the breadcrums
2. fix the sent items to show ... after 3 numbers
	when u click the link and read the sms then you can see all the numbers.


2/5/2016
---------
1. for the draft page, discard should delete the message 
2. in the TO: field have the autocomplete function like 
   wordpress tags

todo
-----
1. in mailbox.php. fix or remove the icons
	fix the search 
	fix the delete
	fix the delete by the checkbox
2. Creat the labels to be sent

2/6/2016
--------
1. fixed pagination in sentsms.php page
2. fixed the pagination buttons in sentsms.php
3. removed the stars in sentsms.php
4. changed inbox to messages
5. fixed delete many records usingcheckbox
6. after deleting show message

todo
----

1. add password protection before delete

2/7/2016 Sunday
---------------


1. add checkboxes to the view contact page
2. on checking a box, display the group select input form
3. Send an sms by using the groups

todo
----
1. create a page to add groups

2/8/2016 Monday
---------------
1. Fixed the senging of groups and individual numbers in compose.sms
2. Fixed the addcontact.php page. Added blue color

todo
----
show draft
add group


2/23/2016
---------
change use the js datatables for showing the SMSs
show draft
add group
click draft to edit draft

todo
----

When draft is deleted, show alert and return to draftsms.php

2/25/2016
---------
Created the addGroup.php
Created viewGroup.php
Create updateGroup.php
add group id into people_group table instead of group name

Create deleteGroup.php

2/29/2016
---------
1. When i delete a group, it also deletes the corresponding people in people_group table
2. when you delete a contact, it also get rmoved from the people group table

todo
----
checkformat method in contacts class