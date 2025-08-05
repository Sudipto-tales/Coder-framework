<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: background-image 1s ease-in-out;
        }
        
        .register-container {
            display: flex;
            width: 100%;
            height: 100%;
        }
        
        .form-container {
            width: 40%;
            min-width: 400px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo img {
            height: 60px;
        }
        
        .form-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        
        .form-subtitle {
            color: #7f8c8d;
            margin-bottom: 30px;
        }
        
        .form-floating label {
            color: #7f8c8d;
        }
        
        .btn-register {
            background-color: #3498db;
            border: none;
            padding: 12px;
            font-weight: 600;
        }
        
        .btn-register:hover {
            background-color: #2980b9;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #7f8c8d;
        }
        
        .login-link a {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
            }
            
            .form-container {
                width: 100%;
                min-width: auto;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="form-container">
            <div class="logo">
                <img src="https://in.pinterest.com/pin/1135751599787842350/" alt="Company Logo">
            </div>
            <h1 class="form-title">Create Account</h1>
            <p class="form-subtitle">Join our community today</p>
            
            <form id="registerForm" action="/auth/register" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                            <label for="firstname">First Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                            <label for="lastname">Last Name</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                    <label for="name">Full Name</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                    <label for="email">Email Address</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                    <label for="confirmPassword">Confirm Password</label>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-register">Register</button>
                </div>
                
                <div class="login-link">
                    Already have an account? <a href="/auth/login">Sign in</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Array of random background image URLs from Unsplash
        const backgrounds = [
            'https://i.pinimg.com/1200x/c5/e3/03/c5e30312108a373c7bb9fe29a9598ead.jpg',
            'https://i.pinimg.com/1200x/fc/7c/be/fc7cbe49392e94b9f83fc1346135d070.jpg',
            'https://i.pinimg.com/1200x/ab/12/34/ab1234cd5678ef90gh12ij34kl567890.jpg',
            'https://i.pinimg.com/1200x/ef/34/56/ef34567890abcdef1234567890abcdef.jpg',
            'https://i.pinimg.com/1200x/gh/56/78/gh567890abcdef1234567890abcdef12.jpg'
        ];
        
        // Set random background on page load
        document.body.style.backgroundImage = `url(${backgrounds[Math.floor(Math.random() * backgrounds.length)]})`;
        
        // Change background every 10 seconds (optional)
        setInterval(() => {
            document.body.style.backgroundImage = `url(${backgrounds[Math.floor(Math.random() * backgrounds.length)]})`;
        }, 10000);
        
        // Form validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
                document.getElementById('password').focus();
            }
        });
    </script>
</body>
</html>