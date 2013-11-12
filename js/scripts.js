

var App = {

	// Initialize

	Init: function() {
		this.banner.Init();
		//this.subpageBackground().Init();
		this.colorBox.Init();

		/* navigation menu hack */
		if( $("body").hasClass("single") )
		{
			var navigation = $("#main-navigation #menu-item-103, #main-navigation #menu-item-10026");
			$(navigation).addClass("current-menu-ancestor");
		}

		/*
		if(!$("body").hasClass("home")) {

			var backgroundUrl = [
				"/wp-content/themes/gardyrkja/images/backgrounds/bg01.jpg",
				"/wp-content/themes/gardyrkja/images/backgrounds/bg02.jpg",
				"/wp-content/themes/gardyrkja/images/backgrounds/bg03.jpg",
				"/wp-content/themes/gardyrkja/images/backgrounds/bg04.jpg",
				"/wp-content/themes/gardyrkja/images/backgrounds/bg05.jpg",
				"/wp-content/themes/gardyrkja/images/backgrounds/bg06.jpg",
				"/wp-content/themes/gardyrkja/images/backgrounds/bg07.jpg",
				"/wp-content/themes/gardyrkja/images/backgrounds/bg08.jpg"
			];
			var randNum = Math.floor(Math.random() * backgroundUrl.length);
			$(".wrapper").css("background", "url(" + backgroundUrl[randNum] + ")" );

		}

		*/
		
		$(".links .linkcat a.more").click(function(){

			var spinner = $("<img src='/wp-content/themes/gardyrkja/images/ajax-loader.gif' class='spinner'/>").insertAfter(this);

			var category = $(this).parent().attr("id");
			var container = $(this).parent();
			var categoryNumber = category.replace( /[^\d.]/g, '' );

			$.ajax({ url: '/wp-content/themes/gardyrkja/ajax.php', 
				data: { method: 'getAllLinks', param: categoryNumber },
				type: 'post',
				success: function(output) {
					$(container).replaceWith(output);
					spinner.remove();
				}
			});
		});

	},

	banner: {

		Init: function() {

			var self = this;
	        self.banner = $('#banner');
	        self.bannerAnimation = null;
	        self.interval = 5000;
	        
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

	subpageBackground: {

		Init: function() {
			
		}
		
	},

	colorBox: {

		Init: function() {
			$(".gallery a").colorbox({rel:"gallery"});
		}
	}

}


// Run Application
// ------------------------------

$(document).ready(function(){
    App.Init();

});
