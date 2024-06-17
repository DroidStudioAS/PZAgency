<h1 style="text-align: center">BlogBook, Blog App, PZAgency Technical Assignment</h1>
<p>
    This program was a technichal assesment project made for PZAgency, over 2 days. </br>
    The Deadline was 5 days, but unfortunately i only had 2 days to actually work on the project. </br>
    I want to thank PZAgency for the opprotunity, and i hope you like BlogBook.
</p>
<p>In this file, you will find:</p>
<ol>
    <li>Instructions on how to set up the app on your machine</li>
    <li>An overview of all the functions available in the app</li>
</ol>

<h2>1) Setup Guide</h2>
<p>Follow the next steps:</p>
<ol>
    <li>
      Clone the project from GitHub, using the following link: <code> https://github.com/DroidStudioAS/PZAgency.git </code>
    </li>
    <li>
       Go to phpMyAdmin (or any other database managment tool you prefer), and import the blogbook.sql file found in the root directory of this project.
    </li>
    <li>
       Go to <code> models->Database.php</code> and make sure you change the values in the construct function to match your database configurations (All the lines you have to edit are marked with a commen "//CHANGE THIS").
    </li>
    <li>
    Once you got this far, you have 2 options:
    <ul>
        <li>
        Place the entire project in the root directory of whatever AMP software you are using (WAMP/XAMPP/MAMP/LAMP), and access it that way
        </li>
        <li>
        If you are using VSCode and have the Live Server extension installed, you can just start it up through VSCode
        </li>
    </ul>
    </li>
</ol>
<p>
    And you are set! Hope you enjoy BlogBook!
</p>

<h2>2) App Overview</h2>
<p>The following is an overview of all the features available in the app </p>
<ol>
    <li>
        <h3>
            Authentication 
        </h3> 
        To use this web app you have to create an account. the index page of the project is the authentication portal where you can create your acount or login with one of the acounts that came premade.
    </li>
        <li>
        <h3>
            Posts 
        </h3> 
        The app allows you to post things to blogbook, which will then be visible by other users. All the most recent posts are available in the home feed
    </li>
     <li>
        <h3>
           Expand Posts 
        </h3> 
       At the bottom of every post you will find an expand post button. Once clicked it will take you to the posts permalink page, where you can leave comments or follow/unfollow the post author.
    </li>
    <li>
        <h3>
            Comments 
        </h3> 
        As i have already mentioned, you can only add/view comments from the post permalink page (once you hit expand post). In the profile section there is a button leading to the your comments page, where you can edit and delete your comments.
    </li>
     <li>
        <h3>
            Following
        </h3> 
        The app allows you to follow certain users. 
        This can, like comments, only be done from the posts permalink page. Once added, on the left side of the homescreen you will see the user you followed pop up. If you click his name, it will take you to a page, where you can see all of his posts
    </li>
     <li>
        <h3>
            My profile 
        </h3> 
       In the navigation bar you will see a page labeled my posts. from here you can get an overview of all the things you posted. This is where you can also edit and delete your posts. To do so, just hover over the post you want to edit or delete, and the buttons will show right up.
    </li>
</ol>

<h1>Thanks again to the team at PZAgency, for giving me this opportunity!</h1>
