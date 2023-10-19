<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ _t('landing.title') }}</title>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="apple-touch-icon" sizes="180x180" href="./landing/img/favicon/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="./landing/img/favicon/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="./landing/img/favicon/favicon-16x16.png"/>
    <link rel="manifest" href="./landing/img/favicon/site.webmanifest"/>
    <link rel="mask-icon" href="./landing/img/favicon/safari-pinned-tab.svg" color="#ffffff"/>
    <link rel="shortcut icon" href="./landing/img/favicon/favicon.ico"/>
    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="msapplication-config" content="./landing/img/favicon/browserconfig.xml"/>
    <meta name="theme-color" content="#ffffff"/>
    <link rel="stylesheet" href="/landing/css/style.min.css?0.05163599695734551"/>
  </head>
  <body>
    <div class="page-container is-home">
      <main>
        <header class="header-main js-header">
          <div class="container">
            <div class="grid">
              <div class="logo-wrap"><a href="./"><img src="./landing/img/logo.svg" alt=""></a></div>
              <div class="menu-wrap">
                <ul>
                  <li><a href="#">{{ _t('landing.nav.product') }}</a></li>
                  <li><a href="#">{{ _t('landing.nav.advantages') }}</a></li>
                  <li><a href="#">{{ _t('landing.nav.prices') }}</a></li>
                  <li><a href="#">{{ _t('landing.nav.reviews') }}</a></li>
                </ul>
              </div>
              <div class="btn-wrap" style="display: flex; gap: 10px;">
                @guest()
                <a class="btn btn--accent header-btns" href="{{ route('register') }}">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-register"></use>
                  </svg>
                  <span>{{ _t('landing.register') }}</span>
                </a>
                @endguest
                <a class="btn btn--black header-btns" href="{{ route('login') }}">
                  <svg viewBox="0 0 20 20" width="20rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-sign-in"></use>
                  </svg>
                  @auth()
                    <span>{{ _t('landing.dashboard') }}</span>
                  @endauth
                  @guest()
                    <span>{{ _t('landing.sign_in') }}</span>
                  @endguest
                </a>
              </div>
              <button class="menu-btn js-toggle-menu"><span></span><span></span><span></span></button>
            </div>
          </div>
        </header>
        <section class="home-1">
          <div class="container">
            <div class="content-wrap">
              <h1>
                <span class="fz50 fw400">{{ _t('landing.banner_medium_black') }}</span>
                <span class="fz70 c-accent">{{ _t('landing.banner_big_orange') }}</span>
              </h1>
              <p class="c-gray">{{ _t('landing.banner_small_text') }}</p>
              <img class="img" src="./landing/img/1-img.png" alt="">
              <div class="btns-wrap">
                <a class="btn btn--accent" href="{{ route('register') }}">
                  <svg viewBox="0 0 20 20" width="20rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-try"></use>
                  </svg>
                  <span>{{ _t('landing.try_it') }}</span>
                </a>
                <a class="btn btn--black js-popup" href="#">{{ _t('landing.how_it_works') }}</a></div>
            </div>
          </div>
        </section>
        <section class="home-2">
          <div class="container">
            <div class="block"><img class="img" src="./landing/img/2-img.png" alt="">
              <div class="text-wrap">
                <h2>
                  <span class="fz50 fw400 c-white">{{ _t('landing.smartphone_medium_white') }}</span><br>
                  <span class="fz70">{{ _t('landing.smartphone_big_black') }}</span>
                </h2>
                <ul>
                  <li class="c-accent tac">
                    <div class="n fz70 fwb">{{ _t('landing.smartphone_number_one') }}</div>
                    <p>{{ _t('landing.smartphone_small_orange_one') }}</p>
                  </li>
                  <li class="c-accent tac">
                    <div class="n fz70 fwb">{{ _t('landing.smartphone_number_two') }}</div>
                    <p>{{ _t('landing.smartphone_small_orange_two') }}</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <section class="home-3">
          <div class="container">
            <h2 class="tac">
              <span class="fz70 c-accent">{{ _t('landing.advantages_big_orange') }}</span><br>
              <span class="fz50">{{ _t('landing.advantages_medium_black') }}</span>
            </h2>
            <div class="items">
              <div class="item">
                <div class="head-wrap"><img src="./landing/img/3-ic-1.svg" alt="">
                  <h3>{{ _t('landing.advantages_small_black_one') }}</h3>
                </div>
                <p class="c-gray">{{ _t('landing.advantages_text_one') }}</p>
              </div>
              <div class="item">
                <div class="head-wrap"><img src="./landing/img/3-ic-2.svg" alt="">
                  <h3>{{ _t('landing.advantages_small_black_two') }}</h3>
                </div>
                <p class="c-gray">{{ _t('landing.advantages_text_two') }}</p>
              </div>
              <div class="item">
                <div class="head-wrap"><img src="./landing/img/3-ic-3.svg" alt="">
                  <h3>{{ _t('landing.advantages_small_black_three') }}</h3>
                </div>
                <p class="c-gray">{{ _t('landing.advantages_text_three') }}</p>
              </div>
            </div>
          </div>
        </section>
        <section class="home-4">
          <div class="container">
            <h2>
              <span class="fz70 c-accent">{{ _t('landing.prices_big_orange') }}</span><br>
              <span class="fz50 fw400">{{ _t('landing.prices_medium_black') }}</span></h2>
            <div class="items">
              <div class="item"><img class="img" src="./landing/img/4-img-1.svg" alt="">
                <h3 class="tac">{{ _t('landing.prices_small_black_one') }}</h3>
                <p class="c-gray tac">{{ _t('landing.prices_text_one') }}</p>
                <div class="btn-wrap"><a class="btn btn--accent" href="{{ route('register') }}">
                    <svg viewBox="0 0 20 20" width="20rem">
                      <use xlink:href="./landing/img/sprite.svg#ic-try"></use>
                    </svg><span>{{ _t('landing.try_it') }}</span></a></div>
                <div class="more-wrap">
                  <button class="js-more-toggle"><span>{{ _t('landing.more_details') }}</span><img src="./landing/img/ic-arrow-down.svg" alt=""></button>
                </div>
                <ul>
                  <li>Full access to QR tool</li>
                  <li>Access to the menu creation tool</li>
                  <li>Unlimited views</li>
                  <li>30 items in the menu</li>
                  <li>Community support</li>
                </ul>
              </div>
              <div class="item"><img class="img" src="./landing/img/4-img-2.svg" alt="">
                <h3 class="tac">{{ _t('landing.prices_small_black_two') }}</h3>
                <p class="c-gray tac">{{ _t('landing.prices_text_two') }}</p>
                <div class="btn-wrap"><a class="btn btn--accent" href="{{ route('register') }}">
                    <svg viewBox="0 0 20 20" width="20rem">
                      <use xlink:href="./landing/img/sprite.svg#ic-try"></use>
                    </svg><span>{{ _t('landing.try_it') }}</span></a></div>
                <div class="more-wrap">
                  <button class="js-more-toggle"><span>{{ _t('landing.more_details') }}</span><img src="./landing/img/ic-arrow-down.svg" alt=""></button>
                </div>
                <ul>
                  <li>Full access to QR tool</li>
                  <li>Access to the menu creation tool</li>
                  <li>Unlimited views</li>
                  <li>Unlimited items in the menu</li>
                  <li>300 orders per month</li>
                  <li>Dedicated Support</li>
                </ul>
              </div>
              <div class="item"><img class="img" src="./landing/img/4-img-3.svg" alt="">
                <h3 class="tac">{{ _t('landing.prices_small_black_three') }}</h3>
                <p class="c-gray tac">{{ _t('landing.prices_text_three') }}</p>
                <div class="btn-wrap"><a class="btn btn--accent" href="{{ route('register') }}">
                    <svg viewBox="0 0 20 20" width="20rem">
                      <use xlink:href="./landing/img/sprite.svg#ic-try"></use>
                    </svg><span>{{ _t('landing.try_it') }}</span></a></div>
                <div class="more-wrap">
                  <button class="js-more-toggle"><span>{{ _t('landing.more_details') }}</span><img src="./landing/img/ic-arrow-down.svg" alt=""></button>
                </div>
                <ul>
                  <li>Accept Orders</li>
                  <li>Manage order</li>
                  <li>Full access to QR tool</li>
                  <li>Access to the menu creation tool</li>
                  <li>Unlimited views</li>
                  <li>Unlimited items in the menu</li>
                  <li>Unlimited orders</li>
                  <li>Dedicated Support</li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <section class="home-5">
          <div class="container"><img class="gift" src="./landing/img/ic-gift.png" alt="">
            <h2 class="fz70 tac">
              <span class="fw400">{{ _t('landing.bonus_big_white') }}</span>
              <span class="c-accent">{{ _t('landing.bonus_big_orange') }}</span>
            </h2>
            <h3 class="tac fw600">{{ _t('landing.bonus_small_white') }}</h3>
          </div>
        </section>
        <section class="home-6">
          <div class="container">
            <h2>
              <span class="fz50">{{ _t('landing.reviews_medium_black') }}</span><br>
              <span class="fz70 c-accent">{{ _t('landing.reviews_big_orange') }}</span>
            </h2>
            <div class="items-wrapper">
              <div class="items items--type-1">
                <div class="item">
                  <div class="img-wrap"><img src="./landing/img/6-img-1.png" alt=""></div>
                  <div class="content-wrap">
                    <div class="name fwb">{{ _t('landing.reviews_name_one') }}</div>
                    <div class="login">{{ _t('landing.reviews_username_one') }}</div>
                    <p>{{ _t('landing.reviews_text_one') }}</p>
                  </div>
                </div>
                <div class="item">
                  <div class="img-wrap"><img src="./landing/img/6-img-2.png" alt=""></div>
                  <div class="content-wrap">
                    <div class="name fwb">{{ _t('landing.reviews_name_two') }}</div>
                    <div class="login">{{ _t('landing.reviews_username_two') }}</div>
                    <p>{{ _t('landing.reviews_text_two') }}</p>
                  </div>
                </div>
              </div>
              <div class="items items--type-2">
                <div class="item">
                  <div class="img-wrap"><img src="./landing/img/6-img-3.png" alt=""></div>
                  <div class="content-wrap">
                    <div class="name fwb">{{ _t('landing.reviews_name_three') }}</div>
                    <div class="login">{{ _t('landing.reviews_username_three') }}</div>
                    <p>{{ _t('landing.reviews_text_three') }}</p>
                  </div>
                </div>
                <div class="item">
                  <div class="img-wrap"><img src="./landing/img/6-img-4.png" alt=""></div>
                  <div class="content-wrap">
                    <div class="name fwb">{{ _t('landing.reviews_name_four') }}</div>
                    <div class="login">{{ _t('landing.reviews_username_four') }}</div>
                    <p>{{ _t('landing.reviews_text_four') }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="btn-wrap"><a class="btn btn--white" href="#">{{ _t('landing.view_more') }}</a></div>
          </div>
        </section>
      </main>
      <footer class="footer-main">
        <div class="container">
          <div class="top-wrap">
            <div class="list-wrap"><b>{{ _t('landing.footer_helpful_links') }}</b>
              <ul>
                <li><a href="tel:+38 (063) 123-45-67">
                    <svg viewBox="0 0 30 30" width="30rem">
                      <use xlink:href="./landing/img/sprite.svg#ic-phone"></use>
                    </svg><span>{{ _t('landing.footer_phone') }}</span></a></li>
                <li><a href="#" target="_blank">
                    <svg viewBox="0 0 30 30" width="30rem">
                      <use xlink:href="./landing/img/sprite.svg#ic-inst"></use>
                    </svg><span>{{ _t('landing.footer_instagram') }}</span></a></li>
                <li><a href="#" target="_blank">
                    <svg viewBox="0 0 30 30" width="30rem">
                      <use xlink:href="./landing/img/sprite.svg#ic-tg"></use>
                    </svg><span>{{ _t('landing.footer_telegram') }}</span></a></li>
              </ul>
            </div>
            <div class="contacts-wrap">
              <b>{{ _t('landing.footer_still_have_questions') }}</b>
              <p>{{ _t('landing.footer_still_have_questions_text') }}</p>
              <form action="#"><img class="flag" src="./landing/img/ic-ua.svg" alt="">
                <input type="text" placeholder="+38 (063) 123-45-67" required>
                <button>
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-message"></use>
                  </svg>
                </button>
              </form>
            </div>
            <div class="list-wrap"><b>{{ _t('landing.footer_my_account') }}</b>
              <ul>
                <li><a class="js-popup" href="#popup-sign-in">
                    <svg viewBox="0 0 30 30" width="30rem">
                      <use xlink:href="./landing/img/sprite.svg#ic-sign-in"></use>
                    </svg><span>{{ _t('landing.footer_login') }}</span></a></li>
                <li><a class="js-popup" href="#popup-register">
                    <svg viewBox="0 0 30 30" width="30rem">
                      <use xlink:href="./landing/img/sprite.svg#ic-register"></use>
                    </svg><span>{{ _t('landing.footer_register') }}</span></a></li>
              </ul>
            </div>
          </div>
          <div class="bottom-wrap">
            <div class="logo-wrap"><a href="./"><img src="./landing/img/logo-footer.svg" alt=""></a></div>
            <p>© Qr-Menu {{ date('Y') }}. {{ _t('landing.footer_all_rights_reserved') }}</p>
            <ul>
              <li><a href="#" target="_blank">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-tg"></use>
                  </svg></a></li>
              <li><a href="#" target="_blank">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-inst"></use>
                  </svg></a></li>
            </ul>
          </div>
        </div>
      </footer>
      <div class="mfp-hide popup" id="popup-sign-in">
        <div class="block">
          <button class="close js-close-popup"><img src="./landing/img/ic-close.svg" alt=""></button>
          <div class="content-wrap">
            <h3 class="tac fw600">Sign in to <br>QR Menu Online</h3>
            <form action="#">
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-user"></use>
                  </svg>
                </div>
                <input type="text" placeholder="Username">
              </label>
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-password"></use>
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
          <button class="close js-close-popup"><img src="./landing/img/ic-close.svg" alt=""></button>
          <div class="content-wrap">
            <h3 class="tac fw600">Sign in to <br>QR Menu Online</h3>
            <form action="#">
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-user"></use>
                  </svg>
                </div>
                <input type="text" placeholder="Username">
              </label>
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-email"></use>
                  </svg>
                </div>
                <input type="text" placeholder="Email">
              </label>
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-password"></use>
                  </svg>
                </div>
                <input type="password" placeholder="• • • • •">
              </label>
              <div class="btn-wrap">
                <button class="btn btn--big">Sign up with Email</button>
              </div>
              <div class="google-wrap"><a href="#"><img src="./landing/img/ic-google.svg" alt=""><span>Sign up with Google</span></a></div>
            </form>
          </div>
          <div class="bottom-wrap">
            <p class="tac c-gray">Got an account already? <a class="js-popup" href="#popup-sign-in">Sign in</a></p>
          </div>
        </div>
      </div>
      <div class="mfp-hide popup" id="popup-qr">
        <div class="block">
          <button class="close js-close-popup"><img src="./landing/img/ic-close.svg" alt=""></button>
          <div class="content-wrap">
            <h3 class="tac fw600">Imagine that you are a client of your business.</h3>
            <div class="qr-wrap"><img src="./landing/img/img-qr.png" alt=""></div>
          </div>
          <div class="or-wrap">
            <p class="tac">Scan the code using your smartphone camera!</p><img class="or" src="./landing/img/or.svg" alt="">
            <div class="btn-wrap"><a class="btn btn--big" href="#">Look at here</a></div>
          </div>
        </div>
      </div>
      <div class="mfp-hide popup" id="popup-forget">
        <div class="block">
          <button class="close js-close-popup"><img src="./landing/img/ic-close.svg" alt=""></button>
          <div class="content-wrap center">
            <h3 class="tac fw600">Enter your email address and we will send you a new password</h3>
            <form action="#">
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-email"></use>
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
          <button class="close js-close-popup"><img src="./landing/img/ic-close.svg" alt=""></button>
          <div class="content-wrap center">
            <h3 class="tac fw600">Enter your email address and we will send you a new password</h3>
            <form action="#">
              <label class="input-wrap">
                <div class="ic-wrap">
                  <svg viewBox="0 0 30 30" width="30rem">
                    <use xlink:href="./landing/img/sprite.svg#ic-email"></use>
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
    <script src="/landing/js/scripts.min.js?0.05163599695734551"></script>
  </body>
</html>