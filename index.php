<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Free Fire Redeem</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      position: relative;
      background: linear-gradient(135deg, #0f0f0f, #1a1a1a);
    }

    body::before {
      content: "Free Fire Today Redeem Code";
      position: absolute;
      top: 40px;
      width: 100%;
      text-align: center;
      font-size: 42px;
      font-weight: bold;
      background: linear-gradient(90deg, red, yellow, lime, cyan, blue, magenta);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: colorCycle 5s linear infinite;
    }

    @keyframes colorCycle {
      0% { filter: brightness(0.7); }
      50% { filter: brightness(1.5); }
      100% { filter: brightness(0.7); }
    }

    .popup {
      background: rgba(20, 20, 80, 0.9);
      backdrop-filter: blur(10px);
      padding: 50px;
      border-radius: 25px;
      box-shadow: 0 0 30px #000000bb;
      text-align: center;
      z-index: 1;
      width: 450px;
    }

    .popup h2 {
      font-size: 26px;
      margin-bottom: 10px;
      color: white;
    }

    .popup p {
      font-size: 16px;
      margin-bottom: 20px;
      color: white;
    }

    .code-box {
      background: white;
      color: black;
      font-weight: bold;
      font-size: 22px;
      padding: 12px;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .copy-btn, .refresh-btn {
      background-color: #00cc66;
      color: white;
      border: none;
      border-radius: 6px;
      padding: 5px 12px;
      font-size: 14px;
      cursor: pointer;
      margin-left: 8px;
    }

    .go-btn {
      background: #ffffff;
      color: #2575fc;
      font-weight: bold;
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
    }

    .valid {
      margin-top: 15px;
      font-size: 14px;
      color: #eeeeeeaa;
    }

    .footer {
      position: absolute;
      bottom: 20px;
      width: 100%;
      text-align: center;
      color: #ffffffcc;
      font-size: 14px;
      font-family: 'Verdana', sans-serif;
      letter-spacing: 1px;
    }
  </style>
</head>
<body>

  <div class="popup">
    <h2>Your Redeem Code</h2>
    <p>Copied Successful</p>
    <div class="code-box">
      <span id="code">XXXXXXXXXXXX</span>
      <div>
        <button class="copy-btn" onclick="copyCode()">Copy</button>
        <button class="refresh-btn" onclick="refreshCode()">Refresh</button>
      </div>
    </div>
    
    <!-- Button to open redeem.html -->
    <a href="redeem.html">
      <button class="go-btn">Go to Website</button>
    </a>

    <div class="valid">Valid for 24 hours</div>
  </div>

  <div class="footer">
    Free Fire | Reward Redemption Site
  </div>

  <script>
    function generateCode() {
      const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      let code = '';
      for (let i = 0; i < 12; i++) {
        code += chars.charAt(Math.floor(Math.random() * chars.length));
      }
      return code;
    }

    function copyCode() {
      const code = document.getElementById("code").textContent;
      navigator.clipboard.writeText(code);
    }

    function refreshCode() {
      document.getElementById("code").textContent = generateCode();
    }

    // Auto-generate code on load
    refreshCode();
  </script>
</body>
</html>
