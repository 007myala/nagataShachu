var mrks = ["i","i","i","i","i"]; // "i" = not visible and "v" = visible

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
