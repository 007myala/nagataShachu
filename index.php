<!DOCTYPE html>
<html>
  <head>
    <title>Nagata Shachu in AR</title>
    <!-- Need this setting for apple devices -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <!-- we import arjs version without NFT but with marker + location based support -->
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
    <!-- Handle Marker detection and video pause -->
    <script src="events.js"></script>
  </head>

  <body style="margin : 0px; overflow: hidden;">
    <a-scene embedded arjs='sourceType: webcam; debugUIEnabled: false; detectionMode: mono_and_matrix; matrixCodeType: 3x3;'>
      <!-- Define your assets to be played later in the scene here -->
      <a-assets>
          <!-- Tony Nguyen - Okedo Daiko -->
          <video
            id="tnod"
            src="./assets/TNOD.mp4"
            response-type="arraybuffer"
            loop="false"
            crossorigin="anonymous"
            webkit-playsinline
            playsinline>
          </video>
          <!-- Naoya Kobayashi - Shime Daiko -->
          <video
            id="nksd"
            src="./assets/NKSD.mp4"
            response-type="arraybuffer"
            loop="false"
            crossorigin="anonymous"
            webkit-playsinline
            playsinline>
          </video>
          <!-- Additional assets here -->
      </a-assets>

      <!-- The AR trigger / Define your markers-->
      <a-marker id="hiroMkr" preset="hiro" vidhandler="video: #tnod">
          <a-video
              id="hiroMdl"
              src="#tnod"
              scale="1 1 1"
              position="0 0.5 0"
              rotation="-90 0 0">
          </a-video>
      </a-marker>

      <a-marker id="kanjiMkr" preset="kanji" vidhandler="video: #nksd">
        <a-video
            id="kanjiMdl"
            src="#nksd"
            scale="1 1 1"
            position="0 0.1 0"
            rotation="-90 0 0">
        </a-video>
      </a-marker>

      <!-- The AR Camera -->
      <a-entity camera></a-entity>
    </a-scene>
    <script>
      window.addEventListener('click', function(){
        var v = document.querySelector('#tnod');
        var x = document.querySelector('#nksd');
        if (v.paused == true) {
          v.play();
        } else {
          v.pause();
        }
        if (x.paused == true) {
          x.play();
        } else {
          x.pause();
        }
      });
    </script>
  </body>
</html>
