

var App = {

	// Initialize

	Init: function() {
		this.banner.Init();
		this.colorBox.Init();
	},

	banner: {

		Init: function() {

			var self = this;
	        self.banner = $('#banner');
	        self.bannerAnimation = null;
	        self.interval = 70000;
	        
	        $(window).resize(function()
	        {
	            self.setFontSize();
	        });        
	                
	        self.setFontSize = function()
	        {
	            var fontSize = ($(window).width() / 960) + 0.3;            
	            if(fontSize > 1) fontSize = 1;        
	            self.banner.css('font-size',(fontSize * 100) + '%');
	        };
	        
	        self.rotate_forward = function()
	        {
	            var last = self.banner.find('ul li.last');
	            var active = self.banner.find('ul li.active');
	            var next = active.next();
	            
	            if(next.length === 0) next = self.banner.find('ul li:first-child');                    
	            
	            last.removeClass('last');
	            active.addClass('last').removeClass('active');            
	            
	            if($('html').hasClass('no-csstransitions')) {
					self.alternateTransition(next);
	            }
	            else {
	                next.addClass('active');
	            }
	            
	            //next.addClass('active');
	            
	            setTimeout(function(){active.removeClass('last');},1000);
	        };
	        
	        self.rotate_backward = function()
	        {
	            var last = self.banner.find('ul li.last');
	            var active = self.banner.find('ul li.active');
	            var next = active.prev();
	            
	            if(next.length === 0) next = self.banner.find('ul li:last-child');                    
	            
	            last.removeClass('last');
	            active.addClass('last').removeClass('active');
	            //next.addClass('active');

	            if($('html').hasClass('no-csstransitions')) {
	                self.alternateTransition(next);
	            }
	            else {
	                next.addClass('active');
	            }
	            
	            setTimeout(function(){active.removeClass('last');},1000);
	        };

	        self.alternateTransition = function(next)
	        {
	        	$("ul.slider li").css('opacity', 1);
				next.css('opacity', 0);
				$("ul.slider li").css('left', 0);
				next.css('left', '-50px');

				next.addClass('active').animate({
				    opacity: 1,
				    left: '+=50'
				    }, 1000, function() {
				});
	        }        

	        self.btnNext = $('#banner .next').click(function(){
	            self.rotate_forward();            
	            self.beginAnimation();
	        });
	        
	        self.btnPrev = $('#banner .prev').click(function(){
	            self.rotate_backward();
	            self.beginAnimation();
	        });

	                
	        self.beginAnimation = function()
	        {
	            clearTimeout(self.bannerAnimation);
	            self.bannerAnimation = setTimeout(function()
	            {
	                self.rotate_forward();
	                self.beginAnimation();
	            },self.interval);
	        };
	        
	        
	        $(function()
	        {
	            if(self.banner.find('ul li').length > 1)
	            {
	                self.banner.find('ul li:first-child').addClass('active');
	                //self.banner.find('ul li:last-child').addClass('last');                
	                self.beginAnimation();
	            }
	            else
	            {
	                self.btnPrev.hide();
	                self.btnNext.hide();                
	            }
	            
	            self.setFontSize();
	        });        
		}
	}, // end of Banner()

	colorBox: {

		Init: function() {

			/*
			$("#ninja_forms_form_1_wrap").on("ready", function(){
				alert("foo");
				//$("#ninja_forms_form_1_wrap").on()
				//.colorbox({inline:true, href:"#ninja_forms_form_1_wrap"});
			});
			*/

			/*
			$(".contact").bind("click", function(){

				$.get('/?page_id=182', function(data){

		    		var theform = $.parseHTML(data);
		    		$(".contact-test").html( $(theform).find("#ninja_forms_form_1_wrap") );
		    		$(".contact-test").colorbox({inline:true, href:"#ninja_forms_form_1_wrap", open:"true"});
		    	});
		    	return false;
			});
*/
			
		}
	}

}


// Run Application
// ------------------------------

$(document).ready(function(){
    App.Init();
    //$("#ninja_forms_form_1_wrap").colorbox({inline:true, href:"#ninja_forms_form_1_wrap"});

    /*
    $(".contact").click( function() {
    	
    	$.get('/?page_id=182', function(data){

    		var theform = $.parseHTML(data);
    		$(".contact-test").html( $(theform).find("#ninja_forms_form_1_wrap") );
    		$(".contact-test").colorbox({inline:true, href:"#ninja_forms_form_1_wrap", open:"true"});
    	});
    	return false;
    });
	*/

	$(".datepicker").datepicker();
});
