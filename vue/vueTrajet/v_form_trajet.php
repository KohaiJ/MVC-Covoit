<div class="container-fluid py-5" style="background-color: #f8f9fa;">
  <div class="row justify-content-center">
    <div class="col-12">
      <form action="index.php?ctl=trajet&action=chercher" method="post" class="needs-validation" novalidate>
        <div class="bg-white shadow-lg d-flex flex-wrap align-items-stretch mx-auto overflow-hidden" style="max-width: 90%; border: 2px solid #1e3a8a; border-radius: 0.5rem;">
          <div class="col-12 col-md-3 py-2 px-3 search-item">
            <div class="input-group">
              <span class="input-group-text bg-transparent border-0"><i class="fas fa-map-marker-alt text-primary fs-5"></i></span>
              <input type="text" class="form-control border-0" id="depart" name="depart" placeholder="Départ" required>
            </div>
          </div>
          <div class="col-12 col-md-3 py-2 px-3 search-item separator-thick">
            <div class="input-group">
              <span class="input-group-text bg-transparent border-0"><i class="fas fa-map-pin text-primary fs-5"></i></span>
              <input type="text" class="form-control border-0" id="arrive" name="arrive" placeholder="Destination" required>
            </div>
          </div>
          <div class="col-12 col-md-2 py-2 px-3 search-item">
            <div class="input-group">
              <span class="input-group-text bg-transparent border-0"><i class="far fa-calendar-alt text-primary fs-5"></i></span>
              <input type="date" class="form-control border-0" id="dateDepart" name="dateDepart" required>
            </div>
          </div>
          <div class="col-12 col-md-2 py-2 px-3 search-item no-separator">
            <div class="input-group">
              <span class="input-group-text bg-transparent border-0"><i class="fas fa-user text-primary fs-5"></i></span>
              <select class="form-select border-0" id="nbPlaces" name="nbPlaces" required>
                <option value="" disabled>Passagers</option>
                <?php for ($i = 1; $i <= 8; $i++): ?>
                  <option value="<?php echo $i; ?>"<?php echo $i === 1 ? ' selected' : ''; ?>><?php echo $i; ?> passager<?php echo $i > 1 ? 's' : ''; ?></option>
                <?php endfor; ?>
              </select>
            </div>
          </div>
          <div class="col-12 col-md-2 p-0">
            <button type="submit" class="btn custom-search-btn w-100 h-100">Rechercher</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
.input-group-text, .form-control, .form-select {
  font-size: 0.9rem;
  background-color: transparent;
}
.btn {
  font-size: 0.9rem;
}
@media (min-width: 768px) {
  .input-group-text, .form-control, .form-select, .btn {
    font-size: 1rem;
  }
}
.custom-search-btn {
  background-color: #1e3a8a;
  border: none;
  color: white;
  font-weight: bold;
  padding: 0;
  transition: background-color 0.3s ease;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
.custom-search-btn:hover,
.custom-search-btn:focus {
  background-color: #152c69;
  color: white;
}
.custom-search-btn:active {
  background-color: #0c1c3d;
}
.input-group, .form-control, .input-group-text, .form-select {
  height: 100%;
}
.input-group-text {
  display: flex;
  align-items: center;
}
.search-item {
  position: relative;
}
.search-item:not(:last-child):not(.no-separator)::after {
  content: '';
  position: absolute;
  right: 0;
  top: 10%;
  height: 80%;
  width: 1px;
  background-color: #1e3a8a;
}
.separator-thick::after {
  width: 2px;
}
.text-primary {
  color: #1e3a8a !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const dateDepart = document.getElementById('dateDepart');
  const today = new Date().toISOString().split('T')[0];
  dateDepart.value = today;
  dateDepart.min = today;
});
</script>

