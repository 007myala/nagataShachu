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
      const aMkr = document.querySelector("#markerA");
      const bMkr = document.querySelector("#markerB");

      // Do check for video markers
      // -Tony Marker
      if(aMkr.object3D.visible == true){
        mrks[0] = "v";
      } else {
        mrks[0] = "i";
      }

      // -Naoya Marker
      if(bMkr.object3D.visible == true){
        mrks[1] = "v";
      } else {
        mrks[1] = "i";
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
