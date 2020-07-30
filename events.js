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
      const scn = document.querySelector("#scene");
      const hMkr = document.querySelector("#hiroMkr");
      const hMdl = document.querySelector("#hiroMdl");
      const kMkr = document.querySelector("#kanjiMkr");
      const kMdl = document.querySelector("#kanjiMdl");

      // Do check for video markers
      // -Hiro Marker
      if(hMkr.object3D.visible == true){
        mrks[0] = "v";
      } else {
        mrks[0] = "i";
      }

      // -Kanji Marker
      if(kMkr.object3D.visible == true){
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
        }
      } else {
        this.video.pause();
      }
    } else {
      console.log(tMrks);
      this.toggle = false;
      this.video.pause();
    }
  }
});
