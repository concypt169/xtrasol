jQuery(document).ready(function(){
  AOS.init();

  jQuery(function(){
    jQuery(document).on("click","a",function(e){
      e.preventDefault();
      var el = jQuery(this).attr('href');
      el = el.match(/(^|\W)tel:($|\W)/);
      if(el){
        jQuery('.ept_swipe').addClass('ept_swipe--animate');
      } else {
        console.log('no');
      }
    });
 });
  ///----- Text typing--------------///
  var TxtType = function(el, toRotate, period) {
      this.toRotate = toRotate;
      this.el = el;
      this.loopNum = 0;
      this.period = parseInt(period, 10) || 2000;
      this.txt = '';
      this.tick();
      this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };

    ////-------Cursor circle animation--------///
    Array.prototype.forEach.call(document.querySelectorAll('.image-wrapper'), function(media) {
  
      const circle = document.querySelector("." + media.getAttribute('data-circle'));
      TweenMax.set(circle, { scale: 0, xPercent: -50, yPercent: -50 });

     media.addEventListener("pointerenter", function(e) {
        TweenMax.to(circle, 0.3, { scale: 1, opacity: 1 });
        positionCircle(e, media, circle);
      });

      media.addEventListener("pointerleave", function(e) {
        TweenMax.to(circle, 0.3, { scale: 0, opacity: 0 });
        positionCircle(e, media, circle);
      });

      media.addEventListener("pointermove", function(e) {
        positionCircle(e, media, circle);
      });

    });

    function positionCircle(e, media, circle) {
      var rect = media.getBoundingClientRect();
      var relX = e.pageX - rect.left;
      var relY = e.pageY  - rect.top - window.scrollY;
      TweenMax.to(circle, 0.15, { x: relX, y: relY });
    }

});