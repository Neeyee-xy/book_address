<?php
include('conn_book.php');
$list_family_unit = new DB_con();
$list_address_book_out=$list_family_unit->list_address_book_print_layout($connect);

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AE - Address Book</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <!-- Main wrapper - centers content in the body -->
    <div class="wrapper">

      <!-- Address book parent container - for presentation styles (eg. border and shadow) -->
      <div class="container">

        <div class="adress-book">

          <!-- Address book header - headings & vertical column borders -->
          <header class="header">
            <div class="header__heading header__heading--phone">
              <img src="image/icon-phone.svg" alt="Phone icon" class="icon icon--header">
              <span class="text--3 text--bold text--upper line-height--2">Phone</span>
            </div>
            <div class="header__heading header__heading--mail">
              <img src="image/icon-mail.svg" alt="Mail & IM icon" class="icon icon--header">
              <span class="text--3 text--bold text--upper line-height--2">Email & IM</span>
            </div>
            <div class="header__heading header__heading--address">
              <img src="image/icon-address.svg" alt="Address icon" class="icon icon--header">
              <span class="text--3 text--bold text--upper line-height--2">Address</span>
            </div>
          </header>

          <!-- Main content - individual address book entries -->
          <main class="content">
            <div class="entry">
              <div class="entry__column entry__column--person">
                <figure class="entry__image-box">
                  <img src="image/person-1.jpg" alt="Entry profile picture" class="entry__image">
                </figure>
                <div class="entry__name-box">
                  <span class="text--3 text--bold line-height--2">Thomas Muller</span>
                  <!-- <span class="text--3 text--bold line-height--2">Thomas Muller</span> -->
                  <span class="text--2 line-height--1 gray">1962.10.17</span>
                </div>
              </div>

              <div class="entry__column entry__column--phone">
                <span class="entry__phone entry__phone--mobile text--2 line-height--3">+49 171 1234567</span>
                <span class="entry__phone entry__phone--tel text--2 line-height--3">+49 211 1234567</span>
              </div>

              <div class="entry__column entry__column--mail">
                <span class="entry__email text--2 line-height--3">thomas.muller@email.com</span>
                <span class="entry__im text--2 line-height--3">0123456789</span>
              </div>

              <div class="entry__column entry__column--address">
                <p class="entry__address text--2 line-height--3">
                  220 North Constitution Lane La Crosse, WI 54601
                </p>
              </div>
            </div>

            

          </main>
        </div>
      </div>
    </div>
  </body>
<footer>
  
</footer>
</html>