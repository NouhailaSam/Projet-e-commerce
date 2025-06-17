
<?php

$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST["prenom"]);
    $message = trim($_POST["message"]);

    if (!empty($nom) && !empty($message)) {
        // Connexion à la base
        $conn = new mysqli("localhost", "root", "", "commercedatte");

        if ($conn->connect_error) {
            $errorMessage = "Erreur de connexion : " . $conn->connect_error;
        } else {
            $stmt = $conn->prepare("INSERT INTO message (nomClient, message) VALUES (?, ?)");
            if ($stmt) {
                $stmt->bind_param("ss", $nom, $message);
                if ($stmt->execute()) {
                    $successMessage = "✅ Merci pour votre message, $nom !";
                } else {
                    $errorMessage = " Erreur lors de l'envoi.";
                }
                $stmt->close();
            } else {
                $errorMessage = " Erreur de préparation de la requête.";
            }
            $conn->close();
        }
    } else {
        $errorMessage = "Tous les champs sont requis.";
    }
}






?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals5.css" />
    <link rel="stylesheet" href="style5.css" />
  </head>
  <body>
    <div class="desktop">

      <div class="div">
        <div class="overlap-10">
          <div class="overlap-11">
            <div class="rectangle"></div>
            <div class="rectangle-2"></div>
            <div class="rectangle-3"> </div>
            <img class="shopping-cart-10" src="img/shopping-cart.png" />
            <a href="profile.php"><img class="user" src="img/personne.png" /></a>
            <img class="logof" src="img/logo.png" />
          </div>
          
            <div class="rectangle-4"></div>
            <div class="text-wrapper-12">
				<a href="aproposDattes.html">À propos de dattes</a></div>
            <div class="text-wrapper-13">
				<a href="boutique.html">Boutique</a></div>
            <div class="text-wrapper-14">
				<a href="index.html">Accueil</a></div>
        
          <div class="text-wrapper-15">
			  <a href="dites-nous">Dites-nous</a></div>
        </div>
      <p class="text-wrapper-11">Que savez-vous sur les dattes marocaines</p>


         <div class="overlap-2">
  <img class="speech-bubble" src="img/speech.png" />
            <div class="rectangle-55">
          <div class="quiz-container"> 

               <div id="quiz-form">
                <!-- Question 1 -->
                <div class="question active" id="q1">
                    <p>1. Quelle est la région principale de production de dattes au Maroc?</p>
                    <label><input type="radio" name="q1" value="Souss-Massa"> Souss-Massa</label>
                    <label><input type="radio" name="q1" value="Marrakech-Safi"> Marrakech-Safi</label>
                    <label><input type="radio" name="q1" value="Drâa-Tafilalet"> Drâa-Tafilalet</label>
                </div>
                
                <!-- Question 2 -->
                <div class="question" id="q2">
                    <p>2. Quelle est la variété de dattes la plus prestigieuse au Maroc?</p>
                    <label><input type="radio" name="q2" value="Boufgous"> Boufgous</label>
                    <label><input type="radio" name="q2" value="Majhoul"> Majhoul</label>
                    <label><input type="radio" name="q2" value="Deglet Nour"> Deglet Nour</label>
                </div>
                
                <div class="buttons">
                    <button id="next-btn">Suivant</button>
                    <button id="result-btn">Résultat</button>
                </div>
            </div>
            
            <div id="results">
                <div class="score">Votre score: <span id="score">0</span>/2</div>
                
                <div class="thanks">
                    <div class="emoji">🌴 🍫 😊</div>
                    <p>Merci d'avoir participé à notre quiz!</p>
                    <div class="emoji">👍 🎉</div>
                </div>
                
                <button id="restart-btn">Refaire le quiz</button>
            </div>
          </div>
           <div class="capture">
        <img  src="img/capture.png" />
           </div>
            </div>
         </div>
              
     <h1 class="text-wrapper-88">Carte interactive des oasis de dattes au Maroc</h1>
     <div class="text-wrapper-23">
              
           <div  class="text1-wrapper-23"> <h1>Cliquez sur une zone pour découvrir les lieux de culture des dattes.</h1></div>
            <!-- <div class="dra-tafilalet1"> <img class="dra-tafilalet" src="img/Draa.png" /></div> -->
        <div class="carte-container">
    <!-- Image de la carte -->
    <img src="img/Draa.png" usemap="#carte-drraa" id="image-carte">

    <!-- Carte cliquable -->
    <map name="carte-drraa">
      <area alt="Errachidia" title="Errachidia" coords="578,180,558,185,545,204,534,231,533,243,531,274,540,289,533,304,509,311,477,322,451,336,435,348,409,369,382,378,367,394,375,363,381,344,424,307,435,287,441,266,453,232,437,229,410,227,387,228,367,238,357,212,332,205,340,189,365,177,374,164,387,148,426,152,449,150,467,143,486,142,506,140,528,139,543,139,559,143,577,143,588,144,599,164" shape="poly" onclick="afficherRegion('Errachidia')">

      <area alt="Zagora" title="Zagora" coords="341,396,337,407,331,425,317,440,305,457,284,464,255,461,221,463,192,463,195,441,196,425,197,405,176,395,176,372,167,355,141,351,125,343,128,327,138,316,164,316,189,310,213,303,226,291,242,283,269,286,297,292,313,293,315,308,323,324,337,354,349,379" shape="poly" onclick="afficherRegion('Zagora')">

      <area alt="Midelt" title="Midelt" coords="517,109,502,114,480,110,455,113,431,121,409,118,381,113,358,115,335,129,321,145,306,147,292,134,278,144,284,129,321,120,331,109,339,93,344,79,342,65,345,42,369,29,384,15,421,41,455,49,492,82" shape="poly" onclick="afficherRegion('Midelt')">

      <area alt="Tinghir" title="Tinghir" coords="414,250,405,272,391,298,372,314,362,326,348,314,339,298,340,285,330,264,309,268,281,265,264,258,249,254,228,265,220,274,220,260,214,233,204,218,219,203,248,192,264,178,269,171,330,169,305,182,298,206,313,222,331,242,350,256,338,255,373,262,387,253" shape="poly" onclick="afficherRegion('Tinghir')">

      <area alt="Ouarzazate" title="Ouarzazate" coords="94,354,77,362,61,371,57,375,44,381,34,374,31,357,37,348,35,331,29,307,19,291,19,278,25,267,45,263,67,256,101,259,121,253,145,247,164,235,173,232,184,250,193,268,178,283,149,279,121,289,101,312,95,335" shape="poly" onclick="afficherRegion('Ouarzazate')">
    </map>

    <!-- Info-bulle lors du survol -->
 
        <div id="nom-region"></div>
  </div>
        </div>
<div class="gallery">
    <div class="image-card">
      <img src="img/bahri.webp" alt="Image 1">
      
    </div>
    <div class="image-card">
      <img src="img/oasis-de-tafilalet.jpg" alt="Image 2">
    
    </div>
    <div class="image-card">
      <img src="img/ajwa.jpg" alt="Image 3">
  
    </div>
    <div class="image-card">
      <img src="img/Draa-2.jpg" alt="Image 4">

    </div>
  </div>
<div class="info-section">
    <h2   class="styled-title">Drâa-Tafilalet</h2>
    <p>
      Drâa-Tafilalet, également appelée la palmeraie de Tafilalet, est une oasis emblématique du sud-est marocain, située dans la région d'Errachidia.
      C’est la plus grande palmeraie du royaume, réputée pour ses dattes savoureuses, en particulier la variété <strong>Majhoul</strong>.
      Elle représente un patrimoine naturel et culturel exceptionnel, où coexistent agriculture traditionnelle, irrigation ancestrale par khettaras, et biodiversité riche.
      La palmeraie joue aussi un rôle crucial dans la lutte contre la désertification.
    </p>
  </div>




  <div class="text-77"><h1>Partagez votre expérience et vos questions.</h1></div>
<div class="rectangle-8">    
  <?php if (!empty($successMessage)): ?>
    <p style="color: green; font-weight: bold;"><?= $successMessage ?></p>
  <?php endif; ?>

  <?php if (!empty($errorMessage)): ?>
    <p style="color: red; font-weight: bold;"><?= $errorMessage ?></p>
  <?php endif; ?> 

  
    <form method="POST" action="">
    <label for="prenom">Votre prénom :</label>
    <input type="text" id="prenom" name="prenom" required>

    <label for="message">Votre message:</label>
    <textarea id="message" name="message" required></textarea>

    <button type="submit">Envoyer</button>

  </form>

    <div class="message" id="message"></div>

            </div>


        <div class="overlap-13">
          <div class="rectangle-5"></div>
          <div class="frame"></div>
          <div class="text-wrapper-16">Contactez- nous</div>
          <img class="contact" src="img/contact.png" />
          <div class="group-wrapper"><div class="group-2"></div></div>
          <div class="div-wrapper"><div class="group-3"></div></div>
		<img class="w" src="img/whatsapp-01.png">
          <img class="frame-2" src="img/telephone-01.png" />
          <div class="text-wrapper-17">Tomori.faceBook.com</div>
          <div class="text-wrapper-18">Tomori.intagramme.com</div>
          <div class="text-wrapper-19">
			  +212-660984533</div>
          <div class="text-wrapper-20">+212-560674544</div>
        </div>
    
    </div>
       <script src="script.js"></script>
  </body>
</html>
