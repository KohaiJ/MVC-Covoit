<div class="container-fluid p-0">
  <!-- Hero Section -->
  <section id="hero" class="text-white py-5">
    <div class="container">
      <div class="row align-items-center min-vh-75">
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold mb-4">Bienvenue au Saint-Aspais Covoit</h1>
          <p class="lead mb-4">Covoiturez et économisez, tout en réduisant votre empreinte carbone.</p>
          <a href="#recherche" class="btn btn-light btn-lg">Trouver un trajet</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Notre But Section -->
  <section id="notre-but" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5">Notre But</h2>
      <div class="row g-4">
        <div class="col-md-6">
          <div class="card h-100 shadow-sm">
            <img src="https://www.anjoubleucommunaute.fr/medias/2022/02/friends-in-car-having-trip-together-scaled.jpg" class="card-img-top" alt="Réduction des coûts">
            <div class="card-body">
              <h5 class="card-title">Réduction des coûts de transport</h5>
              <p class="card-text">Le covoiturage permet aux utilisateurs de partager les frais de carburant, de péage et de stationnement, rendant les voyages plus économiques pour tous les participants. Cela est particulièrement bénéfique pour les trajets longue distance ou fréquents.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card h-100 shadow-sm">
            <img src="https://inforoutes.loire-atlantique.fr/upload/docs/image/png/2022-02/covoiturage-930-cd44b0066743-1.png.associated/th-930x620-covoiturage-930-cd44b0066743-1.png.jpg" class="card-img-top" alt="Impact environnemental">
            <div class="card-body">
              <h5 class="card-title">Diminution de l'impact environnemental</h5>
              <p class="card-text">En partageant un véhicule, le covoiturage contribue à réduire le nombre de voitures sur les routes, ce qui diminue les émissions de gaz à effet de serre, la consommation d'énergie et la congestion routière.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Recherche Section -->
  <section id="recherche" class="py-5 bg-white">
    <div class="container">
      <h2 class="text-center mb-4">Trouvez votre trajet</h2>
      <p class="lead text-center mb-5">Simplifiez vos déplacements et faites de nouvelles rencontres !</p>
      <?php include 'vue/vueTrajet/v_form_trajet.php'; ?>
    </div>
  </section>
</div>

<style>
  .min-vh-75 {
    min-height: 75vh;
  }
  #hero {
    background-color: #1e3a8a; /* Couleur bleu foncé correspondant au logo */
    background-image: url('./image/SaintAspais.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    position: relative;
  }
  #hero::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(30, 58, 138, 0.8); /* Overlay bleu foncé semi-transparent */
    z-index: 1;
  }
  #hero .container {
    position: relative;
    z-index: 2;
  }
  .card {
    transition: transform 0.3s ease-in-out;
  }
  .card:hover {
    transform: translateY(-5px);
  }
</style>
