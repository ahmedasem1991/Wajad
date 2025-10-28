<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Delete Account - Wajad</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f5f7fa;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
    .delete-wrapper {
      max-width: 800px;
      margin: 40px auto;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      overflow: hidden;
      padding: 2rem;
    }
    .logo {
      display: block;
      margin: 0 auto 1rem;
      max-width: 140px;
    }
    .instructions {
      color: #6c757d;
      font-size: 0.95rem;
    }
    .step {
      display: flex;
      align-items: flex-start;
      margin-bottom: 0.75rem;
    }
    .step-number {
      background: #dc3545;
      color: #fff;
      font-weight: bold;
      border-radius: 50%;
      width: 28px;
      height: 28px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
      flex-shrink: 0;
    }
    .hidden {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="delete-wrapper">
      <!-- Header -->
      <div class="text-center mb-4">
        <img src="https://wajad.co/logo.png" alt="Wajad Logo" class="logo">
        <h4 class="mb-2 text-danger">Delete Your Account</h4>
        <p class="text-muted">You can delete your account permanently using email or phone verification below.</p>
      </div>

      <!-- Verification Section -->
      <div class="mb-5">
        <h5 class="text-center mb-3">🧾 Verify Your Identity</h5>

        <!-- Tabs -->
        <ul class="nav nav-pills nav-fill mb-3" id="deleteTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab">By Email</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="phone-tab" data-bs-toggle="tab" data-bs-target="#phone" type="button" role="tab">By Phone</button>
          </li>
        </ul>

        <div class="tab-content" id="deleteTabContent">
          <!-- Email Tab -->
          <div class="tab-pane fade show active" id="email" role="tabpanel">
            <form id="emailForm" method="POST" action="delete-account-verify">
              <div class="mb-3">
                <label for="emailInput" class="form-label">Email address</label>
                <input type="email" class="form-control" id="emailInput" placeholder="Enter your email" required>
              </div>
              <button type="submit" class="btn btn-danger w-100">Send Verification Code</button>
            </form>
          </div>

          <!-- Phone Tab -->
          <div class="tab-pane fade" id="phone" role="tabpanel">
            <form id="phoneForm">
              <div class="row">
                <div class="col-4 mb-3">
                  <label for="countryCode" class="form-label">Code</label>
                  <input type="text" class="form-control" id="countryCode" placeholder="+966" required>
                </div>
                <div class="col-8 mb-3">
                  <label for="mobileNumber" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" id="mobileNumber" placeholder="5xxxxxxxx" required>
                </div>
              </div>
              <button type="submit" class="btn btn-danger w-100">Send Verification Code</button>
            </form>
          </div>
        </div>

        <!-- Code Verification -->
        <div id="verificationSection" class="hidden mt-4">
          <h6 class="text-center mb-3">Enter the 4-digit code sent to you</h6>
          <form id="verifyForm">
            <input type="text" maxlength="4" class="form-control text-center fs-4 mb-3" id="verificationCode" placeholder="____" required>
            <button type="submit" class="btn btn-success w-100">Confirm & Delete Account</button>
          </form>
        </div>
      </div>

      <!-- Another Way Section -->
      <hr class="my-4">
      <h5 class="fw-semibold mb-3 text-center text-secondary">🔄 Another Way to Delete Your Account</h5>
      <p class="instructions text-center mb-4">
        You can also delete your account directly from the mobile application by following these steps:
      </p>

      <div class="px-3">
        <div class="step"><div class="step-number">1</div> <div>Login to the Wajad application.</div></div>
        <div class="step"><div class="step-number">2</div> <div>From the app menu, open your user profile.</div></div>
        <div class="step"><div class="step-number">3</div> <div>Under profile, select <strong>"Delete Account"</strong>.</div></div>
        <div class="step"><div class="step-number">4</div> <div>Provide confirmation before proceeding.</div></div>
        <div class="step"><div class="step-number">5</div> <div>Your account will be deleted and unregistered permanently.</div></div>

        <p class="mt-3 small text-muted text-center">
          You can always register again later using the sign-up option in the app.
        </p>
      </div>

      <!-- Support -->
      <p class="text-center text-muted small mt-4 mb-0">
        Need help? <a href="mailto:support@wajad.com">Contact Support</a>
      </p>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JS -->
  <script>
    const emailForm = document.getElementById('emailForm');
    const phoneForm = document.getElementById('phoneForm');
    const verifySection = document.getElementById('verificationSection');
    const verifyForm = document.getElementById('verifyForm');


  emailForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = document.getElementById('emailInput').value.trim();
    const responseBox = document.createElement('div');
    responseBox.classList.add('mt-3');

    // Remove old messages if any
    const oldMsg = emailForm.querySelector('.response-message');
    if (oldMsg) oldMsg.remove();

    try {
      // Send POST request to Laravel route
      const response = await fetch("https://api.wajad.test/api/delete-account/request", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
        },
        body: JSON.stringify({ email })
      });

      const data = await response.json();

      // Show response dynamically
      responseBox.classList.add('response-message');
      if (response.ok) {
        responseBox.innerHTML = `
          <div class="alert alert-success">
            ✅ ${data.message || 'Verification code sent successfully!'}
          </div>
        `;
        verifySection.classList.remove('hidden');
      } else {
        responseBox.innerHTML = `
          <div class="alert alert-danger">
            ❌ ${data.message || 'Something went wrong, please try again.'}
          </div>
        `;
      }

      emailForm.appendChild(responseBox);
    } catch (error) {
      console.error('Request failed:', error);
      responseBox.innerHTML = `
        <div class="alert alert-danger">
          ⚠️ Unable to reach the server. Please check your connection.
        </div>
      `;
      emailForm.appendChild(responseBox);
    }
  });

    phoneForm.addEventListener('submit', e => {
      e.preventDefault();
      alert('Verification code sent via SMS.');
      verifySection.classList.remove('hidden');
    });

    // Simulate verifying
    verifyForm.addEventListener('submit', e => {
      e.preventDefault();
      alert('Account deleted successfully.');
      verifySection.classList.add('hidden');
      emailForm.reset();
      phoneForm.reset();
    });
  </script>
</body>
</html>
