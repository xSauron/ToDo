<?php

require '../vendor/autoload.php';
require '../config.php';

$config = new \PHPAuth\Config($dbh);
$auth   = new \PHPAuth\Auth($dbh, $config);

if(!$auth->isLogged()){
  header('HTTP/1.0 401 Unauthorized');
  header('Location: ../auth/login.php');
}else{
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDo - Main</title>
  <link rel="shortcut icon" href="../images/Logo16.png">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ff5fd0c0f4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/mainPage.css">
  <script src="dist/index.global.js"></script>
  <script src="dist/generateCalendar.js"></script>
</head>
<body>
<div class="loader"></div>
<nav class="menuMobile">
    <ul>
    <li><a href="#"><i class="fa-solid fa-calendar-days"></i></a></li>
      <li><a href="#"><i class="fa-solid fa-clipboard-list"></i></a></li>
      <li><a href="#" class="addList"><i class="fa-solid fa-plus"></i></a></li>
      <li><a href="#"><i class="fa-regular fa-pen-to-square"></i></a></li>
      <li><a href="#"><i class="fa-regular fa-user"></i></a></li>
      <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
    </ul>
</nav>
<nav class="menuDesktop">
    <ul>
    <li><a href="#"><i class="fa-solid fa-calendar-days"></i></a></li>
      <li><a href="#"><i class="fa-solid fa-clipboard-list"></i></a></li>
      <li><a href="#" class="addList"><i class="fa-solid fa-plus"></i></a></li>
      <li><a href="#"><i class="fa-regular fa-pen-to-square"></i></a></li>
      <li><a href="#"><i class="fa-regular fa-user"></i></a></li>
      <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
    </ul>
</nav>
<div class="wrap"> 
  <header>
    <div class="leftHeader">
      <div class="burger">
          <span></span>
          <span></span>
          <span></span>
      </div>
    </div>
    <div class="rightHeader">
      <p class="name_account">
      </p>
    </div>
  </header>
  <div class="chooseList">
    <p>Click on the list you want to edit</p>
  </div>
    <main>
     
      <section class="lists">
        <h1>Your Lists</h1>
        <div class="addList"><i class="fa-solid fa-plus"></i></div>
      </section>
      <section class="calendar">
        <div id="calendar">
        </div>
      </section> 
      <section class="menu">
        <i class="fa-solid fa-arrow-up"></i>
        <h2></h2>
        <!-- <div class="box"> -->
        
        <!-- </div> -->
        <p></p>
        <select class = "sort" id="typeOfSort">
          <option value="PA">Sort Ascending By Priority</option>
          <option value="PD">Sort Descending By Priority</option>
          <option value="DTA">Sort Ascending By Date And Time</option>
          <option value="DTD" selected>Sort Descending By Date And Time</option>
        </select>
        <div class="addEvent">
          <h2>Add Event</h2>
          <span class="close">&times;</span>
          <form method="POST">
            <input type="text" maxlength="50" name="event_name" placeholder = "Enter the title" required>
            <textarea maxlength="255" name="event_description" placeholder = "Enter the description"></textarea>
            <input type="text" maxlength = "50" name="event_location" placeholder = "Enter the location">
            <input type="date" name="event_date" placeholder = "Enter the date" required>
            <input type="time" name="event_time" placeholder = "Enter the time" required>
            <select name="event_priority">
              <option value="1" selected>1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            <input type="color" name="event_color">
            <button>Add event</button>
          </form>
        </div>
        <div class="editEvent">
          <h2>Edit Event</h2>
          <span class="close">&times;</span>
          <form method="POST">
            <input type="text" maxlength="50" name="event_name" placeholder = "Enter the title" required>
            <textarea maxlength="255" name="event_description" placeholder = "Enter the description"></textarea>
            <input type="text" maxlength = "50" name="event_location" placeholder = "Enter the location">
            <input type="date" name="event_date" placeholder = "Enter the date" required>
            <input type="time" name="event_time" placeholder = "Enter the time" required>
            <select name="event_priority">
              <option value="1" selected>1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            <input type="color" name="event_color">
            <button>Edit event</button>
          </form>
        </div>
        <div class="events">
          <div class="addEventBtn">
            <i class="fa-solid fa-plus"></i>
          </div>
        </div>
      </section>
      <section class="profile">    
        <div class="profileInfo">
          
        </div>
        <div class="theme">
            <i class="fa-solid fa-moon" id="moon"></i>
            <i class="fa-solid fa-lightbulb" id="sun"></i>
          </div>    
        <div class="profileButtons">
        
          <button>Change Password</button>        
          <button>Change Email</button>        
          <button>Delete Account</button>
          <button>Set/Change Your Nick</button>
          <button>Choose Background</button>
          <button><a href="https://pl.gravatar.com/" target="blank">Change your Gravatar</a></button>
          
        </div>
        
        <div class="changePassword">
          <h2>Change Your Password</h2>
          <form method="POST">
            <input type="password" id="currentPassword" name="currpass" placeholder="Enter Current Password" required>
            <input type="password" id="newPassword" name="newpass" placeholder="Enter New Password" required>
            <input type="password" id="repeatNewPassword" name="repeatnewpass" placeholder="Repeat New Password" required>
            <button>Set New Password</button>
          </form>
          <p></p>
        </div>
        <div class="changeEmail">
          <h2>Change Your Email</h2>
          <form method="POST">
            <input type="email" id="email" name="email" placeholder="Enter New Email" required>
            <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
            <button>Set New Email</button>
          </form>
          <p></p>
        </div>
        <div class="deleteAccount">
          <h2>Delete your Account</h2>
          <form method="POST">
            <input type="password" name="password" placeholder="Enter Your Password" required>
            <button>Delete your account</button>
          </form>
          <p></p>
        </div>
        <div class="additionalInformations">
          <h2>Set/Change Your Nickname</h2>
          <form method="POST">
            <input type="text" maxlength="15" name="nick" placeholder="Enter New Nickname" required>
            <button>Add informations</button>
          </form>
          <p></p>
        </div>
        <div class="background">
            <div class="bgImageBlue">
              <div class="backgroundRGBA">
                <p class="clicked">Click Me</p>
              </div>
            </div>
            <div class="bgImageLime">
              <div class="backgroundRGBA">
                <p class="clicked">Click Me</p>
              </div>
            </div>
            <div class="bgImageGreen">
              <div class="backgroundRGBA">
                <p class="clicked">Click Me</p>
              </div>
            </div>
            <div class="bgImageBlack">
              <div class="backgroundRGBA">
                <p class="clicked">Click Me</p>
              </div>
            </div>
        
        </div>
      </section>
      <div id="popUpAddList" class="modal popUpAdd">
        <div class="modal-content editModal">
          <h2>Creating List</h2>
          <span class="close">&times;</span>
          <form method="POST">
            <input type="text" maxlength="50" name="list_name" placeholder = "Enter the title" required>
            <textarea maxlength="255" name="list_description" placeholder = "Enter the description"></textarea>
            <button>Add List</button>
          </form>
        </div>
      </div>
      <div id="popUpEditList" class="modal popUpEdit">
        <div class="modal-content editModal">
          <h2>Edit List</h2>
          <span class="close">&times;</span>
          <form method="POST">
            <input type="text" maxlength="50" name="list_name" placeholder = "Enter the title" required>
            <textarea maxlength="255" name="list_description" placeholder = "Enter the description"></textarea>
            <button>Confirm</button>
          </form>
        </div>
      </div>
      <div id="popUpRemoveList" class="modal popUpRemove">
        <div class="modal-content removeModal">
          <span class="close">&times;</span>
          <h2>Remove List</h2>
          <h3></h3>
          <i class="fa-solid fa-triangle-exclamation"></i>
          <button>YES</button>
          <button>NO</button>
        </div>
      </div>
      <div id="popUpRemoveEvent" class="modal popUpRemove">
        <div class="modal-content removeModal">
          <span class="close">&times;</span>
          <h2>Remove Event</h2>
          <h3></h3>
          <i class="fa-solid fa-triangle-exclamation"></i>
          <button>YES</button>
          <button>NO</button>
        </div>
      </div>
      <!-- <div id="popUpCalendarEventProperties" class="modal popUpEventProperties">
        <div class="modal-content">
          <span class="close">&times;</span>
          
        </div>
      </div> -->
      <div id="popUpCalendarEventProperties">
        <div class="popUpContentEventProperties">
          <div class="popUpHeader">
            <div>
              <i class="fa-solid fa-pen"></i
              ><!--tutaj zrobić edycje eventu-->
              <p>Properties</p>
              <i class="fa-solid fa-trash"></i
              ><!--tutaj zrobić usunięcie eventu-->
            </div>
              <i class="fa-solid fa-xmark"></i>
            <!--tutaj zrobić wyłączenie modalu-->
          </div>
            
        </div>
      </div>
      <div id="popUpRemoveCalendarEvent" class="modal popUpRemoveEventCalendar">
        <div class="modal-content removeModal">
          <span class="close">&times;</span>
          <h2>Remove Event</h2>
          <h3></h3>
          <i class="fa-solid fa-triangle-exclamation"></i>
          <button>YES</button>
          <button>NO</button>
        </div>
      </div>
      <div id="popUpEditCalendarEvent" class="modal popUpEditEventCalendar">
        <div class="modal-content editModal">
          <span class="close">&times;</span>
          <div class="editEvent">
          <h2>Edit Event</h2>
          <form method="POST">
            <input type="text" maxlength="50" name="event_name" placeholder = "Enter the title" required>
            <textarea maxlength="255" name="event_description" placeholder = "Enter the description"></textarea>
            <input type="text" maxlength = "50" name="event_location" placeholder = "Enter the location">
            <input type="date" name="event_date" placeholder = "Enter the date" required>
            <input type="time" name="event_time" placeholder = "Enter the time" required>
            <select name="event_priority">
              <option value="1" selected>1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            <input type="color" name="event_color">
            <button>Edit event</button>
          </form>
        </div>
        </div>
      </div>
      <div id="popUpAddEvent" class="modal popUpAddEvent">
        <div class="modal-content addModal">
          <span class="close">&times;</span>
          <div class="addEvent">
          <h2>Add Event</h2>
          <form method="POST">
            <p>Select the list you want to add an event to</p>
            <select name="" id="chosen_list">
            </select>
            <input type="text" maxlength="50" name="event_name" placeholder = "Enter the title" required>
            <textarea maxlength="255" name="event_description" placeholder = "Enter the description"></textarea>
            <input type="text" maxlength = "50" name="event_location" placeholder = "Enter the location">
            <input type="time" name="event_time" placeholder = "Enter the time" required>
            <select name="event_priority">
              <option value="1" selected>1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            <input type="color" name="event_color">
            <button id="addEventBtnPopUp">Add event</button>
          </form>
        </div>
        </div>
      </div>
    </main>
    <footer id="footer">
          <div class="copy">
              <p>&copy; All rights reserved</p>
          </div>
    </footer>
    <i class="fa-solid fa-keyboard"></i>
    <div class="circleKey">
      <p><i class="fa-solid fa-plus"></i> Ctrl + Alt + L</p>
      <p><i class="fa-regular fa-pen-to-square"></i> Ctrl + Alt + E</p>
      <p><i class="fa-solid fa-clipboard-list"></i> Ctrl + Alt + D</p>
      <p><i class="fa-solid fa-calendar-days"></i> Ctrl + Alt + C</p>
    </div>
</div>
  <script src="./js/navigation.js"></script>
  <script src="./js/windowOnLoad.js"></script>
  <script src="./js/fetch.js"></script>  
  <script src="./js/calendarSection.js"></script>
  <script src="./js/accountMail.js"></script>
  <script src="./js/profileSection.js"></script>
  <script src="./js/popUpAddList.js"></script>
  <script src="./js/eventsSection.js"></script>
  <script src="./js/popUpEditList.js"></script>
  <script src="./js/popUpDeleteList.js"></script>
  <script src="./js/popUpEventProperties.js"></script>
  <script src="./js/popUpRemoveCalendarEvent.js"></script>
  <script src="./js/popUpEditCalendarEvent.js"></script>
  <script src="./js/popUpAddEvent.js"></script>
  <script src="./js/selectTheme.js"></script>
</body>
</html>