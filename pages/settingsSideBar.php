<div class="container">
      <div class="button" id="loginButton">
        <div class="icon" id="buttonIconSettings">
          <i class="fa fa-bars"></i>
        </div>
      </div>
      <div class="sidebar" id="loginSidebar">
        <h2>Settings</h2>
  
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  
          mot de passe<input type="password" name="password" id="password"><br>
          <input type="hidden" name="action" value="settings">
          <input type="submit">
  
        </form>
</div>