
<div class="modal fade modal-default" id="imageCrop" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      
    <div class="modal-header">
       
    </div>

  <div class="modal-body">


      <form id="form_pic" action="{{ route('employee.save_pic') }}" method="post">

      <input type="hidden" name="id" value="{{ $Employee->cfcodeno }}">

      <div class="table">
        <div class="tableRow">
          <div class="tableCell box">
            <canvas id="panel" width="380" height="380" ></canvas>
          </div>
          <div class="tableCell box">
            <img id="crop_result" />
          </div>
        </div>

        <div class="tableRow">
          <div class="tableCell">
            Zoom it:
            <input id='scaleSlider' type='range' min='0' max='3.0' step='0.01' value='1.0' />
            <input type="hidden" name="imgpic" id="imgpic">
            <input type="hidden" name="picture_ext" id="picture_ext">

            {{ csrf_field() }}
           
          </div>
          <div class="tableCell">
            <button type="button" id="cropImgButtn">Crop</button>
            <button type="button" onclick="clickWait()">Save</button>

            <img src="" id="test_img">
          </div>
          <div id="wait-text" style="visibility: hidden;">
              <img  src="{{ asset('dist/img/loading3.gif') }}"></img>  <span>Updating profile..Please wait...</span>
          </div>
        </div>
      </div>
      </form>

    
  </div>
</div>
</div>
</div>




<script>


function clickWait(){


  

  $("#wait-text").css("visibility","visible");

  $("#form_pic").submit();
    //$('#prof_pic').attr('src', e.target.result);



}



   

var imageCropper = {





  ctx: document.getElementById("panel").getContext("2d"),

  image: new Image(),

  scale: 1,

  scale2: 1,

  click: false,

  baseX: 0,

  baseY: 0,

  lastPointX: 0,

  lastPointY: 0,

  cutoutWidth: 40,

  windowWidth: 300,

  init: function() {


   // console.log(img.width);

    
     //var img = document.getElementById("prof_pic");
    this.image.setAttribute('crossOrigin', 'anonymous');
  //  this.image.src;
    this.image.onload = this.onImageLoad.bind(this);
    document.getElementById("cropImgButtn").onclick = this.showCropedImage.bind(this);
    document.getElementById("scaleSlider").oninput = this.updateScale.bind(this);
   // console.log(this.image.src);
  },

  /**
   * Animation on the canvas depends on three events of mouse. down, up and move
   */
  onImageLoad: function() {
    this.drawimage(0, 0);
    this.ctx.canvas.onmousedown = this.onMouseDown.bind(this);
    this.ctx.canvas.onmousemove = this.onMouseMove.bind(this);
    this.ctx.canvas.onmouseup = this.onMouseUp.bind(this);
  },

  /**
   * Draw image on canvas, after any changes
   * @param  {[type]} x
   * @param  {[type]} y
   * @return {[type]}
   */
  drawimage: function(x, y) {
    var w = this.ctx.canvas.width,
      h = this.ctx.canvas.height;
    this.ctx.clearRect(0, 0, w, h);
    this.baseX = this.baseX + (x - this.lastPointX);
    this.baseY = this.baseY + (y - this.lastPointY);
    this.lastPointX = x;
    this.lastPointY = y;
    this.ctx.drawImage(this.image, this.baseX, this.baseY, Math.floor(this.image.width * this.scale), Math.floor(this.image.height * this.scale));
    this.drawCutout();
  },

  /**
   * Responsible to draw the cutout over canvas, clockwise rectangle and anticlock wise rectangle, make sure a cutout.
   * @return {[type]}
   */
  drawCutout: function() {
    this.ctx.fillStyle = 'rgba(128, 128, 128, 0.7)';
    this.ctx.beginPath();
    this.ctx.rect(0, 0, this.ctx.canvas.width, this.ctx.canvas.height);
    //Draw anti clockwise rectangle, for cutout.
    this.ctx.moveTo(this.cutoutWidth, this.cutoutWidth);
    this.ctx.lineTo(this.cutoutWidth, this.windowWidth + this.cutoutWidth);
    this.ctx.lineTo(this.cutoutWidth + this.windowWidth, this.cutoutWidth + this.windowWidth);
    this.ctx.lineTo(this.cutoutWidth + this.windowWidth, this.cutoutWidth);
    this.ctx.closePath();
    this.ctx.fill();
  },

  /**
   * Get call on mouse press, make click variable to true, which will be used in mousemove events
   * It also set the point were mouse click happened.
   * @param  {[type]} e
   * @return {[type]}
   */
  onMouseDown: function(e) {
    e.preventDefault();
    var loc = this.windowToCanvas(e.clientX, e.clientY);
    this.click = true;
    this.lastPointX = loc.x;
    this.lastPointY = loc.y;
  },

  /**
   * Track the mouse movment and draw the image accordingly, but only when clicked happened.
   * @param  {[type]} e
   * @return {[type]}
   */
  onMouseMove: function(e) {
    e.preventDefault();
    if (this.click) {
      var loc = this.windowToCanvas(e.clientX, e.clientY);
      this.drawimage(loc.x, loc.y);
    }
  },

  /**
   * make click = false, hence no canvas draw on mousemovment.
   * @param  {[type]} e
   * @return {[type]}
   */
  onMouseUp: function(e) {
    e.preventDefault();
    this.click = false;
  },

  /**
   * Translate to HTML coardinates to Canvas coardinates.
   */
  windowToCanvas: function(x, y) {
    var canvas = this.ctx.canvas;
    var bbox = canvas.getBoundingClientRect();
    return {
      x: x - bbox.left * (canvas.width / bbox.width),
      y: y - bbox.top * (canvas.height / bbox.height)
    };
  },
  /**
   * Get the canavs, remove cutout, create image elemnet on UI.
   * @return {[type]}
   */
  showCropedImage: function() {
    // var temp_ctx, temp_canvas;
    // temp_canvas = document.createElement('canvas');
    // temp_ctx = temp_canvas.getContext('2d');
    // temp_canvas.width = this.windowWidth;
    // temp_canvas.height = this.windowWidth;
    // temp_ctx.drawImage(this.ctx.canvas, this.cutoutWidth, this.cutoutWidth, this.windowWidth, this.windowWidth, 0, 0, this.windowWidth, this.windowWidth);
    // var vData = temp_canvas.toDataURL();
    // document.getElementById('canvas').src = vData;
     var temp_ctx, temp_canvas;
     temp_canvas = document.createElement('canvas');
     temp_ctx = temp_canvas.getContext('2d');
     temp_canvas.width = this.windowWidth;
     temp_canvas.height = this.windowWidth;
     temp_ctx.drawImage(this.ctx.canvas, this.cutoutWidth, this.cutoutWidth, this.windowWidth, this.windowWidth, 0, 0, this.windowWidth, this.windowWidth);
     var vData = temp_canvas.toDataURL("image/jpeg");
     document.getElementById('prof_pic').src = vData;


     document.getElementById("imgpic").value = vData.split(",")[1];
     document.getElementById("picture_ext").value = vData.split(",")[0];
  },
  /**
   * Update image zoom scale on slider movment.
   * @param  {[type]} e
   * @return {[type]}
   */
  updateScale: function(e) {
    this.scale = e.target.value;
    this.drawimage(this.lastPointX, this.lastPointY);
   // console.log(e.target.value);
  }
};
imageCropper.image.src =  document.getElementById("prof_pic").src;
imageCropper.init();

/**
 * Trigger the app.
 */


</script>