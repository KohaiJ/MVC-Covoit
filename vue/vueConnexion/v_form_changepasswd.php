<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer le mot de passe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 0.5rem;
        }
        .card-header {
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }
        .form-control:focus, .btn:focus {
            box-shadow: none;
            border-color: #1e3a8a;
        }
        .btn-primary {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
        }
        .btn-primary:hover {
            background-color: #152c69;
            border-color: #152c69;
        }
        .text-primary {
            color: #1e3a8a !important;
        }
        .form-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }
        .input-group-custom {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            overflow: hidden;
        }
        .input-group-custom .input-group-text,
        .input-group-custom .btn-outline-secondary {
            background-color: #f8f9fa;
            border: none;
        }
        .input-group-custom .form-control {
            border: none;
        }
        .input-group-custom:focus-within {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25);
        }
        .form-control:focus {
            box-shadow: none;
        }
        .toggle-password {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0 fw-bold">Changer le mot de passe</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="index.php?ctl=connexion&action=changepasswd" method="POST">
                            <div class="mb-4">
                                <label for="old_password" class="form-label fw-bold text-primary">Ancien mot de passe</label>
                                <div class="input-group input-group-custom">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill text-primary"></i>
                                    </span>
                                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Entrez votre ancien mot de passe" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="new_password" class="form-label fw-bold text-primary">Nouveau mot de passe</label>
                                <div class="input-group input-group-custom">
                                    <span class="input-group-text">
                                        <i class="bi bi-key-fill text-primary"></i>
                                    </span>
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Entrez votre nouveau mot de passe" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary py-2 fw-bold">
                                    <i class="bi bi-check2-circle me-2"></i>Changer le mot de passe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePasswordButtons = document.querySelectorAll('.toggle-password');
        
        togglePasswordButtons.forEach(button => {
            button.addEventListener('click', function() {
                const input = this.previousElementSibling;
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
                } else {
                    input.type = 'password';
                    icon.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
                }
            });
        });
    });
    </script>
</body>
</html>
