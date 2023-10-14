<!DOCTYPE html>
<html>
  <head>
    <title>Page list</title>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png"/>
    <link rel="manifest" href="./img/favicon/site.webmanifest"/>
    <link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg" color="#ffffff"/>
    <link rel="shortcut icon" href="./img/favicon/favicon.ico"/>
    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="msapplication-config" content="./img/favicon/browserconfig.xml"/>
    <meta name="theme-color" content="#ffffff"/>
    <link rel="stylesheet" href="./css/style.min.css?0.8134532994669155"/>
  </head>
  <body>
    <div class="page-container">
      <main>
        <header class="header-main js-header">
          <div class="container">
            <div class="grid">
              <div class="logo-wrap"><a href="./"><img src="./img/logo.svg" alt=""></a></div>
              <div class="menu-wrap">
                <ul>
                  <li><a href="#">Product</a></li>
                  <li><a href="#">Advantages</a></li>
                  <li><a href="#">Prices</a></li>
                  <li><a href="#">Reviews</a></li>
                </ul>
              </div>
              <div class="btn-wrap"><a class="btn btn--accent js-popup" href="#popup-sign-in">
                  <svg viewBox="0 0 20 20" width="20rem">
                    <use xlink:href="./img/sprite.svg#ic-sign-in"></use>
                  </svg><span>Sign in</span></a></div>
              <button class="menu-btn js-toggle-menu"><span></span><span></span><span></span></button>
            </div>
          </div>
        </header>
        <style>
          .header-main, .footer-main{display: none;}
          ol.ol{max-width: 1400px;padding: 0 15px;margin: 0 auto;margin-top: 50px;}
          .ol li{margin-bottom: 5px;}
          .ol a{color: #333;font-size: 18px;text-decoration: underline;}
          .ol a:visited{color: #ababab;}
        </style>
        <ol class="ol">
          <li><a href="./index.html" target="_blank">index</a></li>
        </ol>
        <ol class="ol">
          <li><a class="js-popup" href="#popup-sign-in">Login</a></li>
          <li><a class="js-popup" href="#popup-register">Register</a></li>
          <li><a class="js-popup" href="#popup-qr">QR</a></li>
          <li><a class="js-popup" href="#popup-forget">Forgot your password?</a></li>
          <li><a class="js-popup" href="#popup-forget-sent">Forgot your password? (sent)</a></li>
        </ol>
      </main>
      <footer class="footer-main">
        <div class="container">
          <div class="top-wrap">
            <div class="list-wrap"><b>Helpful Links:</b>
              <ul>
                <li><a href="tel:+38 (063) 123-45-67">
                    <svg viewBox="0 0 30 30" width="30rem">
                      <use xlink:href="./img/sprite.svg#ic-phone"></use>
                    </svg><span>Phone</span></a></li>
                <li><a href="#" target="_blank">
                    <svg viewBox="0 0 30 30" width="30rem">
                      <use xlink:href="./img/sprite.svg#ic-inst"></use>
                    </svg><span>Instagram</span></a></li>
                <li><a href="#" target="_blank">
                    <svg viewBox="0 0 30 30" width="30rem">
                      <use xlink:href="./img/sprite.svg#ic-tg"></use>
                    </svg><span>Telegram</span></a></li>
              </ul>
            </div>
            <div class="contacts-wrap"><b>Still have questions?</b>
              <p>Write your number and we will call you back</p>
              <form action="#"><img class="flag" src="./img/ic-ua.svg" alt="">
                <input type="text" placeholder="+38 (063) 123-45-67" required>
                <button>
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./img/sprite.svg#ic-message"></use>
                  </svg>
                </button>
              </form>
            </div>
            <div class="list-wrap"><b>My Account:</b>
              <ul>
                <li><a class="js-popup" href="#popup-sign-in">
                    <svg viewBox="0 0 30 30" width="30rem">
                      <use xlink:href="./img/sprite.svg#ic-sign-in"></use>
                    </svg><span>Login</span></a></li>
                <li><a class="js-popup" href="#popup-register">
                    <svg viewBox="0 0 30 30" width="30rem">
                      <use xlink:href="./img/sprite.svg#ic-register"></use>
                    </svg><span>Register</span></a></li>
              </ul>
            </div>
          </div>
          <div class="bottom-wrap">
            <div class="logo-wrap"><a href="./"><img src="./img/logo-footer.svg" alt=""></a></div>
            <p>© Qr-Menu 2023. All rights reserved.</p>
            <ul>
              <li><a href="#" target="_blank">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./img/sprite.svg#ic-tg"></use>
                  </svg></a></li>
              <li><a href="#" target="_blank">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./img/sprite.svg#ic-inst"></use>
                  </svg></a></li>
            </ul>
          </div>
        </div>
      </footer>
      <div class="mfp-hide popup" id="popup-sign-in">
        <div class="block">
          <button class="close js-close-popup"><img src="./img/ic-close.svg" alt=""></button>
          <div class="content-wrap">
            <h3 class="tac fw600">Sign in to <br>QR Menu Online</h3>
            <form action="#">
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./img/sprite.svg#ic-user"></use>
                  </svg>
                </div>
                <input type="text" placeholder="Username">
              </label>
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./img/sprite.svg#ic-password"></use>
                  </svg>
                </div>
                <input type="password" placeholder="• • • • •">
              </label>
              <div class="btn-wrap">
                <button class="btn btn--big">Sign in</button>
              </div>
              <div class="forget-wrap tac"><a href="#">Forgot your password?</a></div>
            </form>
          </div>
          <div class="bottom-wrap">
            <p class="tac c-gray">Don't have an account? <a class="js-popup" href="#popup-register">Create</a></p>
          </div>
        </div>
      </div>
      <div class="mfp-hide popup" id="popup-register">
        <div class="block">
          <button class="close js-close-popup"><img src="./img/ic-close.svg" alt=""></button>
          <div class="content-wrap">
            <h3 class="tac fw600">Sign in to <br>QR Menu Online</h3>
            <form action="#">
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./img/sprite.svg#ic-user"></use>
                  </svg>
                </div>
                <input type="text" placeholder="Username">
              </label>
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./img/sprite.svg#ic-email"></use>
                  </svg>
                </div>
                <input type="text" placeholder="Email">
              </label>
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./img/sprite.svg#ic-password"></use>
                  </svg>
                </div>
                <input type="password" placeholder="• • • • •">
              </label>
              <div class="btn-wrap">
                <button class="btn btn--big">Sign up with Email</button>
              </div>
              <div class="google-wrap"><a href="#"><img src="./img/ic-google.svg" alt=""><span>Sign up with Google</span></a></div>
            </form>
          </div>
          <div class="bottom-wrap">
            <p class="tac c-gray">Got an account already? <a class="js-popup" href="#popup-sign-in">Sign in</a></p>
          </div>
        </div>
      </div>
      <div class="mfp-hide popup" id="popup-qr">
        <div class="block">
          <button class="close js-close-popup"><img src="./img/ic-close.svg" alt=""></button>
          <div class="content-wrap">
            <h3 class="tac fw600">Imagine that you are a client of your business.</h3>
            <div class="qr-wrap"><img src="./img/img-qr.png" alt=""></div>
          </div>
          <div class="or-wrap">
            <p class="tac">Scan the code using your smartphone camera!</p><img class="or" src="./img/or.svg" alt="">
            <div class="btn-wrap"><a class="btn btn--big" href="#">Look at here</a></div>
          </div>
        </div>
      </div>
      <div class="mfp-hide popup" id="popup-forget">
        <div class="block">
          <button class="close js-close-popup"><img src="./img/ic-close.svg" alt=""></button>
          <div class="content-wrap center">
            <h3 class="tac fw600">Enter your email address and we will send you a new password</h3>
            <form action="#">
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./img/sprite.svg#ic-email"></use>
                  </svg>
                </div>
                <input type="text" placeholder="Email">
              </label>
              <div class="btn-wrap">
                <button class="btn btn--big">Send new password</button>
              </div>
            </form>
          </div>
          <div class="bottom-wrap">
            <p class="tac c-gray">I think I remembered the password! <a class="js-popup" href="#popup-sign-in">Sign in</a></p>
          </div>
        </div>
      </div>
      <div class="mfp-hide popup" id="popup-forget-sent">
        <div class="block">
          <button class="close js-close-popup"><img src="./img/ic-close.svg" alt=""></button>
          <div class="content-wrap center">
            <h3 class="tac fw600">Enter your email address and we will send you a new password</h3>
            <form action="#">
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./img/sprite.svg#ic-email"></use>
                  </svg>
                </div>
                <input type="text" placeholder="Email">
              </label>
              <div class="btn-wrap">
                <button class="btn btn--big disabled">Send new password</button>
              </div>
              <div class="text-wrap">
                <p class="tac c-gray">Check your email and sign in again.</p>
              </div>
            </form>
          </div>
          <div class="bottom-wrap">
            <p class="tac c-gray">I think I remembered the password! <a class="js-popup" href="#popup-sign-in">Sign in</a></p>
          </div>
        </div>
      </div>
    </div>
    <script src="./js/scripts.min.js?0.8134532994669155"></script>
  </body>
</html>