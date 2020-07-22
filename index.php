<!DOCTYPE html>
<html>
  <head>
    <title>Nagata Shachu in AR</title>
    <!-- Need this setting for apple devices -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <!-- Import AFrame -->
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <!-- We import arjs version without NFT but with marker + location based support -->
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
    <script src="https://raw.githack.com/AR-js-org/studio-backend/master/src/modules/marker/tools/gesture-detector.js"></script>
    <script src="https://raw.githack.com/AR-js-org/studio-backend/master/src/modules/marker/tools/gesture-handler.js"></script>
    <!-- Handle Marker detection and video pause -->
    <script>
        AFRAME.registerComponent('vidhandler', {
            init: function () {
                var marker = this.el;
                this.vid = document.querySelector("#tnod");

                marker.addEventListener('markerFound', function () {
                    this.toggle = true;
                    this.vid.play();
                }.bind(this));

                marker.addEventListener('markerLost', function () {
                    this.toggle = false;
                    this.vid.pause();
                }.bind(this));
            },
        });
        AFRAME.registerComponent('vidhandler2', {
            init: function () {
                var marker = this.el;
                this.vid = document.querySelector("#nksd");

                marker.addEventListener('markerFound', function () {
                    this.toggle = true;
                    this.vid.play();
                }.bind(this));

                marker.addEventListener('markerLost', function () {
                    this.toggle = false;
                    this.vid.pause();
                }.bind(this));
            },
        });
    </script>
    <link rel="stylesheet" href="style.css">

  </head>
  <body style="margin : 0px; overflow: hidden;">
    <a-scene
        vr-mode-ui="enabled: false"
        loading-screen="enabled: false;"
        arjs='sourceType: webcam; debugUIEnabled: false;'
        id="scene"
        embedded
        gesture-detector>
        <a-assets>
            <!-- Tony Nguyen - Okedo Daiko -->
            <video
              id="tnod"
              src="./assets/TNOD.mp4"
              preload="auto"
              response-type="arraybuffer"
              loop
              crossorigin
              webkit-playsinline
              autoplay
              playsinline>
            </video>
            <!-- Naoya Kobayashi - Shime Daiko -->
            <video
              id="nksd"
              src="./assets/NKSD.mp4"
              preload="auto"
              response-type="arraybuffer"
              loop
              crossorigin
              webkit-playsinline
              autoplay
              playsinline>
            </video>
        </a-assets>

        <!-- The AR trigger / Define your markers-->
        <a-marker preset="hiro" vidhandler>
          <a-video
              src="#tnod"
              scale="1 1 1"
              position="0 0.1 0"
              rotation="-90 0 0"
              class="clickable"
              gesture-handler>
          </a-video>
        </a-marker>

        <a-marker preset="kanji" vidhandler2>
          <a-video
              src="#nksd"
              scale="1 1 1"
              position="0 0.1 0"
              rotation="-90 0 0"
              class="clickable"
              gesture-handler>
          </a-video>
        </a-marker>

        <!-- The AR Camera -->
        <a-entity camera></a-entity>
    </a-scene>

    <!-- Handle click events -->
    <script>
      window.addEventListener('click', function(){
        var v = document.querySelector('#tnod');
        if (v.paused == true) {
          v.play();
        } else {
          v.pause();
        }

        var n = document.querySelector('#nksd');
        if (n.paused == true) {
          n.play();
        } else {
          n.pause();
        }
      });
    </script>
  </body>

</html>
