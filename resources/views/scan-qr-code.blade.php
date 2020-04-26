<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous"
    ></script>
    <title>eTabeb Share</title>

    <!--Style Start-->
    <style>
      body {
        overflow-x: hidden;
        background: rgb(17, 112, 171);
        background: linear-gradient(
          90deg,
          rgba(17, 112, 171, 1) 0%,
          rgba(96, 186, 180, 1) 100%
        );
        text-align: center;
      }

      .white-logo {
        width: 80%;
        margin-bottom: 15px;
      }

      #loaderWrapper {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: #242f3f;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .loader {
        display: inline-block;
        width: 30px;
        height: 30px;
        position: relative;
        border: 4px solid #fff;
        animation: loader 2s infinite ease;
      }

      .loader-inner {
        vertical-align: top;
        display: inline-block;
        width: 100%;
        background-color: #fff;
        animation: loader-inner 2s infinite ease-in;
      }

      @keyframes loader {
        0% {
          transform: rotate(0deg);
        }

        25% {
          transform: rotate(180deg);
        }

        50% {
          transform: rotate(180deg);
        }

        75% {
          transform: rotate(360deg);
        }

        100% {
          transform: rotate(360deg);
        }
      }

      @keyframes loader-inner {
        0% {
          height: 0%;
        }

        25% {
          height: 0%;
        }

        50% {
          height: 100%;
        }

        75% {
          height: 100%;
        }

        100% {
          height: 0%;
        }
      }
      .Heading {
        color: #ffffff;
      }

      .logo-head img {
        border-radius: 20px;
      }

      .paragraph-head {
        width: 30%;
        color: #ffffff;
        padding-top: 10px;
      }

      .button-go-website {
        margin-top: 25px;
      }
      .button-go-website button {
        background: transparent;
        border-color: #ffffff;
        border-radius: 25px;
      }

      .stores-images {
        padding-top: 20px;
      }
    </style>
    <!--Style End-->
  </head>

  <body>
    <!--Content-Start-->
    <div class="full-content">
      <div
        class="container"
        style="display: flex; justify-content: center; align-items: center; height: 100vh"
      >
        <div class="row">
          <div class="col-12">
            <div class="Heading">
              <img class="white-logo" src="/images/scan-qr-code/etabeb-logo-white.png" />
            </div>
            <div class="logo-head">
              <img class="" src="/images/scan-qr-code/logo-middle.png" />
            </div>
            <div class="button-go-website py-3">
              <a href="https://www.etabeb.com/" target="_blank"
                ><button type="button" class="btn btn-primary">
                  Go to the website
                </button></a
              >
            </div>
            <div class="stores-images">
              <div class="row">
                <div class="col-12">
                  <a
                    href="https://play.google.com/store/apps/details?id=com.smartapp.etabeb
                                    "
                    target="_blank"
                  >
                    <img src="/images/scan-qr-code/play-store-icon.png"
                  /></a>
                </div>
              </div>
              <div class="row py-3">
                <div class="col-12">
                  <a
                    href="https://apps.apple.com/us/app/etabeb-com/id1455235277"
                    target="_blank"
                    ><img src="/images/scan-qr-code/app-store-icon.png"
                  /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Content-End-->

    <!--Loader-Start-->
    <div id="loaderWrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <!--Loader-End-->

    <!--Js-Loader-Start-->
    <script>
      $(document).ready(function() {
        $("#loaderWrapper").fadeOut(2000);
      });
    </script>
    <!--Js-Loader-End-->

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>

    <script id="et-iframe" data-version="0.5" data-widgetId="5ea1aedec026591f73e90873" src="https://client.consolto.com/iframeApp/iframeApp.js"  ></script>
  </body>
</html>

