
 jQuery(document).ready(function(){
   //console.log('5reaady');
var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        centeredSlides: true,
        loop: true,
        speed: 1000,
        grabCursor: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          "@0.00": {
            slidesPerView: 0.8,
            spaceBetween: 10,
            grabCursor: true,
          },
          "@0.75": {
            slidesPerView: 1,
            grabCursor: true,
            spaceBetween: 20,
          },
          "@1.00": {
            slidesPerView: 2,
            grabCursor: true,
            spaceBetween: 40,
          },
          "@1.50": {
            slidesPerView: 3,
            grabCursor: true,
            spaceBetween: 50,
    }
  },
});

// -------------------What-we-do-change-direction
jQuery(".what-inside:nth-child(even)").css({
  "direction":"rtl"
  });

//------------ Tab-Specialization
// Show the first tab and hide the rest
jQuery('#tabs-nav li:first-child').addClass('active');
jQuery('.tab-content').hide();
jQuery('.tab-content:first').show();

// Click function
//console.log(jQuery('.specialization-work').attr('class'));
jQuery('#tabs-nav li').mouseenter(function(){
  
 var selectedId = jQuery(this).children("a").attr("href");
 var itemId = selectedId.substring(1, selectedId.length);
 var cl =  jQuery('.specialization-work').attr("class").split(" ");
    var newcl =[];
    for(var i=0;i<cl.length;i++){
        r = cl[i].search(/tab+/);
        if(r)newcl[newcl.length] = cl[i];
    }
    jQuery('.specialization-work').removeClass().addClass(newcl.join(" "));
  jQuery('#tabs-nav li').removeClass('active');
  jQuery('.specialization-work').addClass(itemId);
 // $(this).addClass('active');
 jQuery('.tab-content').hide();
  
  var activeTab = jQuery(this).find('a').attr('href');
  jQuery(activeTab).fadeIn();
  return false;
});

// +++++++++++++++++++++++++Secand-swiper-slider

var swiper = new Swiper('.swiper-container', {
  //pagination: '.swiper-pagination',
  //paginationClickable: true,
  // nextButton: '.swiper-button-next',
  // prevButton: '.swiper-button-prev',
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: 3000,
  autoplayDisableOnInteraction: false,
  runCallbacksOnInit: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
},
 on: {
    init: function(sw) {
      var offer = document.querySelector('#numberSlides');
      offer.innerHTML = (sw.activeIndex +  1) + '/' + sw.slides.length;
    },

    slideChange: function (sw) { 
      var offer = document.querySelector('#numberSlides');
      offer.innerHTML = (sw.activeIndex +  1) + '/' + sw.slides.length;
    }
  },
});


// +++++++++++++++++++++++++Third-swiper-slider

var swiper = new Swiper(".swiper-container-insight", {
 slidesPerView: 4.3,
 spaceBetween: 10,
 centeredSlides: true,
 loop: true,
 speed: 1000,
 grabCursor: true,
 navigation: {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
},
 pagination: {
   el: ".swiper-pagination",
   clickable: true,
 },
 breakpoints: {
   "@0.00": {
     slidesPerView: 1.8,
     spaceBetween: 10,
   },
   "@0.75": {
     slidesPerView: 2.3,
     spaceBetween: 20,
   },
   "@1.00": {
     slidesPerView: 3.8,
     spaceBetween: 40,
   },
   "@1.50": {
     slidesPerView: 4.3,
     spaceBetween: 50,
   }
 },
});

// Swiper-active-slider-show
jQuery('.our-work .swiper-slide-active ').mouseenter(function(){
  console.log('test');
  jQuery(this).prevAll("h1").first().addClass('active-heading');
});

jQuery('.our-work .swiper-slide-active').mouseleave(function(){
  jQuery(this).prevAll("h1").first().removeClass('active-heading');
});

// ------------------Work-page-hover-setup
  jQuery(".project-text").hover(function(){
    console.log("test");
    jQuery(this).parent().toggleClass("active-project");
  });
});

// Navigation bar
function openNav() {
  console.log("test");
  jQuery('.closebtn').css('display', 'block');
 
    //document.getElementById("myNav").style.width = "100%";
    jQuery(".menu-primary-menu-container").css("width", "100%");
    jQuery('.extra-log-bar').css('display', 'block');
  }
  
  function closeNav() {
    jQuery('.closebtn').css('display', 'none');
    jQuery('.extra-log-bar').css('display', 'none');
    //document.getElementById("myNav").style.width = "0%";
    jQuery(".menu-primary-menu-container").css("width", "0%");
  }




  