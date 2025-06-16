 // Fonction appelée lors du clic
    function afficherRegion(nom) {
      document.getElementById("nom-region").textContent = "Région : " + nom;
    }

    // Effet de survol
    const infoBulle = document.getElementById("info-bulle");
    const zones = document.querySelectorAll("area");

    zones.forEach(zone => {
      zone.addEventListener("mousemove", (e) => {
        infoBulle.style.left = e.pageX + 10 + "px";
        infoBulle.style.top = e.pageY + 10 + "px";
        infoBulle.textContent = zone.title;
        infoBulle.style.display = "block";
      });

      zone.addEventListener("mouseleave", () => {
        infoBulle.style.display = "none";
      });
    });
      document.addEventListener('DOMContentLoaded', function() {
            const question1 = document.getElementById('q1');
            const question2 = document.getElementById('q2');
            const nextBtn = document.getElementById('next-btn');
            const resultBtn = document.getElementById('result-btn');
            const restartBtn = document.getElementById('restart-btn');
            const quizForm = document.getElementById('quiz-form');
            const resultsDiv = document.getElementById('results');
            
            // Réponses correctes
            const correctAnswers = {
                q1: "Drâa-Tafilalet",
                q2: "Majhoul"
            };
            const userAnswers = {};
            
            // Bouton Suivant
            nextBtn.addEventListener('click', function() {
                // Vérifier si une réponse est sélectionnée pour Q1
                const selectedOption = document.querySelector('input[name="q1"]:checked');
                
                if (!selectedOption) {
                    alert('Veuillez sélectionner une réponse');
                    return;
                }
                
                // Enregistrer la réponse
                userAnswers.q1 = selectedOption.value;
                
                // Cacher Q1 et afficher Q2
                question1.classList.remove('active');
                question2.classList.add('active');
                
                // Cacher Suivant et afficher Résultat
                nextBtn.style.display = 'none';
                resultBtn.style.display = 'block';
            });
            
            // Bouton Résultat
            resultBtn.addEventListener('click', function() {
                // Vérifier si une réponse est sélectionnée pour Q2
                const selectedOption = document.querySelector('input[name="q2"]:checked');
                
                if (!selectedOption) {
                    alert('Veuillez sélectionner une réponse');
                    return;
                }
                
                // Enregistrer la réponse
                userAnswers.q2 = selectedOption.value;
                
                // Calculer le score
                let score = 0;
                if (userAnswers.q1 === correctAnswers.q1) score++;
                if (userAnswers.q2 === correctAnswers.q2) score++;
                
                // Afficher seulement le score final
                document.getElementById('score').textContent = score;
                
                // Afficher les résultats et cacher le quiz
                quizForm.style.display = 'none';
                resultsDiv.style.display = 'block';
            });
            
            // Bouton Recommencer
            restartBtn.addEventListener('click', function() {
                // Réinitialiser le quiz
                question1.classList.add('active');
                question2.classList.remove('active');
                nextBtn.style.display = 'block';
                resultBtn.style.display = 'none';
                quizForm.style.display = 'block';
                resultsDiv.style.display = 'none';
                
                // Réinitialiser les sélections
                document.querySelectorAll('input[type="radio"]').forEach(radio => {
                    radio.checked = false;
                });
            });
        });