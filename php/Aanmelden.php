

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Handle registration form submission
      $Burgerservicenummer = $_POST["burgerservicenummer"];
      $Email = $_POST["email"];
      $Roepnaam = $_POST["roepnaam"]  ;
      $Geboortedatum = $_POST["geboortedatum"];
      $Telefoonnummer = $_POST["telefoonnummer"];
      // Perform database insertion (ensure you have a database connection)
  
      // Sample connection code using PDO
      $dsn = "mysql:host=localhost;dbname=projectp4";
      $DBusername = "root";
      $DBpassword = '';
      $emailDupe = false;
      $userDupe = false;
      
      try {
          $pdo = new PDO($dsn, $DBusername, $DBpassword);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
          $sql = "INSERT INTO Aanmelden (burgerservicenummer,email, roepnaam, geboortedatum, telefoonnummer) VALUES (:burgerservicenummer,:email, :roepnaam, :geboortedatum, :telefoonnummer)";
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':burgerservicenummer', $Burgerservicenummer);
          $stmt->bindParam(':email', $Email);
          $stmt->bindParam(':roepnaam', $Roepnaam);
          $stmt->bindParam(':geboortedatum', $Geboortedatum);
          $stmt->bindParam(':telefoonnummer', $Telefoonnummer);
        
          $stmt->execute();
  
          echo "<div class='success'> <p class='successmessage'>Correct aangemeld! </p> </div>";
          echo "<div class='success'> <p class='successmessage'>Correct aangemeld! Je wordt binnen enkele seconden doorgestuurd naar de homepage.</p> </div>";

      // Redirect the user to the homepage after 5 seconds
      header("refresh:5; url=../html/index.html");
      } catch (PDOException $exception ) {
          // echo $exception->getMessage() . "<br>";
          
          
          echo "<div class='errorcontainer'> <p class='errorcode'> Er is een fout opgetreden bij het Aanmelden. Probeer opnieuw!</p> </div>";
      }
  }



 
  ?>

