var mrks = ["i","i","i","i","i"]; // "i" = not visible and "v" = visible
var tMrks = 0;

// Video Handler - for when marker is visible or not visible
AFRAME.registerComponent('vidhandler', {
  schema: {
    video: {type: 'selector'}
  },
  init: function(){
    this.video = this.data.video;
    this.video.play();
  },
  tick: function(){
    if(this.el.object3D.visible == true){
      const tonyMkr = document.querySelector("#TonyMkr");
      const naoyaMkr = document.querySelector("#NaoyaMkr");
      const kiyoshiMkr = document.querySelector("#KiyoshiMkr");
      const akiMkr = document.querySelector("#AkiMkr");
      const andrewMkr = document.querySelector("#AndrewMkr");

      // Do check for video markers
      // -Tony Marker
      if(tonyMkr.object3D.visible == true){
        mrks[0] = "v";
      } else {
        mrks[0] = "i";
      }

      // -Naoya Marker
      if(naoyaMkr.object3D.visible == true){
        mrks[1] = "v";
      } else {
        mrks[1] = "i";
      }

      // -Kiyoshi Marker
      if(kiyoshiMkr.object3D.visible == true){
        mrks[2] = "v";
      } else {
        mrks[2] = "i";
      }

      // -Aki Marker
      if(akiMkr.object3D.visible == true){
        mrks[3] = "v";
      } else {
        mrks[3] = "i";
      }

      // -Andrew Marker
      if(andrewMkr.object3D.visible == true){
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
      tMrks = mrkCount;
      console.log(mrkCount);

      if(mrkCount == 1){
        if(!this.toggle){
          this.toggle = true;
          this.video.play();
          this.video.muted = false;
        }
      } else {
        this.video.play();
        this.video.muted = true;
      }
    } else {
      console.log(tMrks);
      this.toggle = false;
      this.video.pause();
    }
  }
});
