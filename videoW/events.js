// Handle the Loading Screen by creating a listener for the scene's loaded event
document.addEventListener('DOMContentLoaded', function(){
  const scene = document.querySelector('a-scene');
  const splash = document.querySelector('#splash');
  const loading = document.querySelector('#splash .loading');
  const startButton = document.querySelector('#splash .start-button');
  const instructions = document.querySelector('#instructions');

  scene.addEventListener('loaded', function(e){
    setTimeout(() => {
      // Hide the splash screen and instructions - reveal the start button
      loading.style.display = 'none';
      instructions.style.display = 'none';
      startButton.style.display = 'block';
      splash.style.backgroundColor = 'rgba(0,0,0, 0.85)';
      startButton.style.opacity = 1;
    }, 50);
    console.log('Scene Loaded!');
  });

  startButton.addEventListener('click', function(e){
    // Once start is clicked - hide the preload screen
    splash.style.display = 'none';
  });
});


// Handle multiple videos playing
var mrks = ["i","i","i","i","i"]; // "i" = not visible and "v" = visible

// Video Handler - for when marker is visible or not visible
AFRAME.registerComponent('vidhandler', {
  schema: {
    video: {type: 'selector'}
  },
  init: function(){
    this.video = this.data.video;
    this.video.muted = true;
  },
  tick: function(){
    if(this.el.object3D.visible == true){
      const tMkr = document.querySelector("#okedoMkr");
      const nMkr = document.querySelector("#shimeMkr");
      const kMkr = document.querySelector("#shinobueMkr");
      const aMkr = document.querySelector("#shamisenMkr");
      const sMkr = document.querySelector("#miyaMkr");

      // Do check for video markers
      // -Tony Marker
      if(tMkr.object3D.visible == true){
        mrks[0] = "v";
      } else {
        mrks[0] = "i";
      }

      // -Naoya Marker
      if(nMkr.object3D.visible == true){
        mrks[1] = "v";
      } else {
        mrks[1] = "i";
      }

      // -Kiyoshi Marker
      if(kMkr.object3D.visible == true){
        mrks[2] = "v";
      } else {
        mrks[2] = "i";
      }

      // -Aki Marker
      if(aMkr.object3D.visible == true){
        mrks[3] = "v";
      } else {
        mrks[3] = "i";
      }

      // -Andrew Marker
      if(sMkr.object3D.visible == true){
        mrks[4] = "v";
      } else {
        mrks[4] = "i";
      }

      // How many video markers visible?
      var mrkCount = 0;
      for(var i=0; i<mrks.length; i++){
        if(mrks[i] == "v"){
          mrkCount++;
        }
      }
      console.log(mrkCount);

      if(mrkCount == 1){
        if(!this.toggle){
          this.toggle = true;
          this.video.play();
          this.video.muted = false;
        }
      } else {
        this.video.pause();
        this.video.muted = true;
      }
    } else {
      this.toggle = false;
      this.video.pause();
      this.video.muted = true;
    }
  }
});
