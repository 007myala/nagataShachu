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
    <a-scene embedded vr-mode-ui="enabled: false" arjs='sourceType: webcam; debugUIEnabled: false; detectionMode: mono_and_matrix; matrixCodeType: 3x3;'>

      <!-- Define your assets to be played later in the scene here -->
      <a-assets>
          <!-- Tony Nguyen - Okedo Daiko -->
          <video id="tnod" src="./assets/v/TNOD.mp4" response-type="arraybuffer" loop="false" crossorigin="anonymous" webkit-playsinline playsinline></video>

          <!-- Naoya Kobayashi - Shime Daiko -->
          <video id="nksd" src="./assets/v/NKSD.mp4" response-type="arraybuffer" loop="false" crossorigin="anonymous" webkit-playsinline playsinline></video>

          <!-- Kiyoshi Nagata - Shinobue -->
          <video id="kns" src="./assets/v/KNS.mp4" response-type="arraybuffer" loop="false" crossorigin="anonymous" webkit-playsinline playsinline></video>

          <!-- Aki Takahashi - Shamisen -->
          <video id="ats" src="./assets/v/ATS.mp4" response-type="arraybuffer" loop="false" crossorigin="anonymous" webkit-playsinline playsinline></video>

          <!-- Andrew Siu - Miya / Nagado Daiko -->
          <video id="asnd" src="./assets/v/ASND.mp4" response-type="arraybuffer" loop="false" crossorigin="anonymous" webkit-playsinline playsinline></video>
      </a-assets>

      <!-- The AR trigger / Define your markers-->
      <!-- Tony Nguyen - Okedo Daiko -->
      <a-marker id="TonyMkr" type="pattern" vidhandler="video: #tnod" url="assets/p/Tony.patt">
          <a-plane scale = "2 1" position='0 0.1 0' rotation="-90 0 0" material='transparent:true;src:#tnod' controls></a-plane>
      </a-marker>

      <!-- Naoya Kobayashi - Shime Daiko -->
      <a-marker id="NaoyaMkr" type="pattern" vidhandler="video: #nksd" preset="custom" url="assets/p/Naoya.patt">
          <a-video id="NaoyaMdl" src="#nksd" scale="1 1 1" position="0 0.1 0" rotation="-90 0 0"></a-video>
      </a-marker>

      <!-- Kiyoshi Nagata - Shinobue -->
      <a-marker id="KiyoshiMkr" type="pattern" vidhandler="video: #kns" preset="custom" url="assets/p/Kiyoshi.patt">
          <a-video id="KiyoshiMdl" src="#kns" scale="1 1 1" position="0 0.1 0" rotation="-90 0 0"></a-video>
      </a-marker>

      <!-- Aki Takahashi - Shamisen -->
      <a-marker id="AkiMkr" type="pattern" vidhandler="video: #ats" preset="custom" url="assets/p/Aki.patt">
          <a-video id="AkiMdl" src="#ats" scale="1 1 1" position="0 0.1 0" rotation="-90 0 0"></a-video>
      </a-marker>

      <!-- Andrew Siu - Miya / Nagado Daiko -->
      <a-marker id="AndrewMkr" type="pattern" vidhandler="video: #asnd" preset="custom" url="assets/p/Andrew.patt">
          <a-video id="AndrewMdl" src="#asnd" scale="1 1 1" position="0 0.1 0" rotation="-90 0 0"></a-video>
      </a-marker>

      <!-- The AR Camera -->
      <a-entity camera></a-entity>
    </a-scene>
    <script>
      window.addEventListener('click', function(){
        var a = document.querySelector('#tnod');
        var b = document.querySelector('#nksd');
        var c = document.querySelector('#kns');
        var d = document.querySelector('#ats');
        var e = document.querySelector('#asnd');

        if ( a.paused == true ) { a.play(); } else { a.pause(); }
        if ( b.paused == true ) { b.play(); } else { b.pause(); }
        if ( c.paused == true ) { c.play(); } else { c.pause(); }
        if ( d.paused == true ) { d.play(); } else { d.pause(); }
        if ( e.paused == true ) { e.play(); } else { e.pause(); }
      });
    </script>
  </body>
</html>
