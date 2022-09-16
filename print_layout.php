<?php


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

    <link rel="stylesheet" href="css/style.css">
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
              <span class="text--3 text--bold text--upper line-height--2">Telefon</span>
            </div>
            <div class="header__heading header__heading--mail">
              <img src="image/icon-mail.svg" alt="Mail & IM icon" class="icon icon--header">
              <span class="text--3 text--bold text--upper line-height--2">Email & IM</span>
            </div>
            <div class="header__heading header__heading--address">
              <img src="image/icon-address.svg" alt="Address icon" class="icon icon--header">
              <span class="text--3 text--bold text--upper line-height--2">Adresse</span>
            </div>
          </header>
 <main class="content">
          <!-- Main content - individual address book entries -->



	
<?php

include('conn_book.php');
$list_family_unit = new DB_con();
$list_address_book_out=$list_family_unit->list_address_book_print_layout($connect);
echo $list_address_book_out;


?>

</main>
</div>
</div>
</div>
</body>

</html>