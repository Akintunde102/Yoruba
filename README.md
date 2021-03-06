# YORUBA

**Name:** YORUBA HTML/PHP TEMPLATE <br/>
**Contributors:** Akintunde Jegede <br/>
**Programmed with:** PHP<br/>
**Requires at least:** php 4.* <br/>
**Major Dependencies:** bootstrap & jquery<br/>
**License:** APACHE LICENSE <br/>
**License URI:** https://www.apache.org/licenses/LICENSE-2.0 <br/>
**Live Demo Address:** akin.com.ng/yoruba <br/>

## Short Summary:
This script is an html template with some php powered pages. It has a php/mysql powered news section that also acts as a blog, it also has a registration page for new members and an admin section for blog and registration adminsitration.

## Description:
This script is built for ethnic or tribal association that want to have a central online portal for all activitites.Thi is the more reason why this script has a member registration page and a news/blog page for press releases. All texts are made using Yoruba-language sort of lorem ipsum.

Below is a preview:
![Preview](http://akin.com.ng/yoruba/a.PNG)


## How it works:
The script has four major types of pages that include: 

### The News pages
This pages display the news articles.

**The viewpost.php Page:** This displays each post based on a get variable that sends the id to the database to request the text, although this is not visible to the end user as it has been rewrited via the htaccess to have fancy urls that looks like `http://yoruba.com/9/Using-htaccess-to-set-your-index-file` instead of `http://yoruba.com/viewpost.php?id=9`.]]]

**news.html**: This shows a list of all articles from the database.


### The registration Pages
**registration.html** This contains the form for registering new members, feel free to look through and edit.

### The Site Pages
This pages are just displaying information. They include: 

**The Index.html Page:** This contains the site front page where you can find a slider and general information about the site. All information here can be edited via the index.page 

**contactus.html** This displays contact information on the website. it also features a form that send mail to a particular mail address. The form is powered by "php/mail.php" as an action page. You can edit this in the php folder to change the form and mail sending parameters. Below is an excerpt of the code to show where to edit changes in the scripts

````
/* =====================================================
 * change this to the email you want the form to send to
 * ===================================================== */
$email_to = "you@company.pw"; 
$email_from = "webmaster@company.pw"; // must be different than $email_from 
$email_subject = "Contact Form submitted";
````

### Language Processing File (lang_process.php)
This file processes user's language choice and then save it as a cookie and then include the choosen language file from the /lang/ folder through php include 


**aboutus.html** This simply contains information about the entity that owns the website

**missionandvision.html** This simply contains the mission and vision of the association using the script. To update or change this, simple edit the page.

**aim.html** This contains the aim of the association.To update or change this, simple edit the page.

You can add more pages to this script if you so wish, Just edit header.html to have site-wide header that contain all your pages.


#### Admin Pages
These pages can only be viewed by those who have admin login. The login details are stored in the yuf.sql, upload this sql dump to your database and edit include/config.php to change db info.

To access the admin page, just use a link like this (http://website.com/admin)

This is a list of all the admin pages, the names of this pages explain what they do:
add-post.php<br/>
add-user.php<br/>
edit-post.php<br/>
edit-user.php<br/>
index.php<br/>
login.php<br/>
logout.php<br/>
menu.php<br/>
users.php<br/>
reg.php (to Manage registered members)

Below is a preview of the admin page
![Preview](http://akin.com.ng/yoruba/admin.PNG)

### Other Pages:
These are pages that perform other functions apart from the one listed above:
header.html (Site Header)
footer.html (site footer)

### Folders:
#### Uploader: This contain file Upload script for uploading images while writing or updating blog. (This is yet to be automated)
#### Classes: This contain classes that are being used by the script.
#### Admin: contain all previously stated admin files
#### Includes: This contains config.php that houses db access details (Note: This Script Uses PDO database calls, so be mindful of the standard database protocols for PDO)
#### css,fonts,js,styles: These folders contain all front end dependencies
#### lang: This folder contains language translation files

All other unstated files should be considered trivial.




## Installation 
Installation is very easy. Just follow the following steps

1. Download this script as a zip file (from [here](https://github.com/Akintunde102/AKINBLOG/archive/master.zip))
2. Copy to your server  www (or htdocs) folder
3. Upload yuf.sql via your phpadmin,
4. Edit includes/config.php to add new db details
3. That's it 
4. Just view from your server domain name (or from localhost if you are in a local environment)


## How to contribute new translations
With the version 2.0, new translations can now be added without need to understand how to code. Below are the procedures.

1. Got to the /lang/ folder
2. Copy the contents of the language file you want to translate from 
3. Then create your new language file and name it using the stated naming convention of other language files in the folder
   For instance, to convert from english to french, you would have copy the contents of `lang.en.php` to a newly created file you would     name `lang.fr.php`.
4. Then change every variable content in the file to the new language as shown in the instance:
  for instance, $lang['SLIDER1'] = `Yoruba Dancers Displaying On stage';` would become `Yoruba Dancers Affichage sur scène` for an English to French translation.
  
take note, that every language has certain codes that needs to be rightly inputed in the naming convention. Some of this naming conventions can be found [here](http://www.lingoes.net/en/translator/langcode.htm). Any code not listed here can be created by discretion.


## How Translation Works
- Every translation version of the site can be called by appending the language code after a slash like this `example.com/en`, after thsis subsequent site pages don't need the appedning as the sote has been saved as a cookie
- the `lang_process.php` controls the detection and saving of language codes through the use of cookie
` translations are saved in the `/lang/` folder.

## Intial Version
1.0


## Present Version
2.0


## Changelog
2.0: Addition of Multi-Language Support


## Contact Me
**Discord**: @akintunde <br/>
**Email:** jegedeakintunde[at]gmail.com<br/>
**utopian.io:** @akintunde <br/>
**github:** @akintunde102<br/>


## More ScreenShots
![Preview](http://akin.com.ng/yoruba/a.PNG)
![Preview](http://akin.com.ng/yoruba/b.PNG)
![Preview](http://akin.com.ng/yoruba/blog.PNG)


 


