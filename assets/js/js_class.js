// JavaScript Document
var timer;
//****************************************

//**********************Confirm Delete function*************************************************
function confirm_delete()
{
	if(document.getElementsByName("*")=="")
	{
		var val = confirm("Select Record");
		return false;
	}
	else
	{
	var val = confirm("Are you sure you want to perform this action?");
	return val;
	}
}

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode 
    if ( charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }
    else{
      return true;
    }
}

$("body").find(".submitBtn").click(function () {
    var frmID = $(this).attr("frm-id"); 

    if (form_validate_jquery("#" + frmID)) {
        $("#" + frmID).submit();
    }else{
      return false;
    }
});

$("body").find(".submitBtn1").click(function () {
    var frmID = $(this).attr("frm-id"); 

    var tab = $('#'+frmID).find('a.active');

    
    var frmID1 = frmID+' #home';
    

    if (form_validate_jquery("#" + frmID1)) {
        $("#" + frmID).submit();
    }else{
      return false;
    }
})

$(window).ready(function() {
    var parameter = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    var decodedparameter = decodeURIComponent(parameter)
    var param = decodedparameter.split('=');
    if (param[0] == "enquiry") {
        sessionStorage.removeItem('leadpage');
        alert("Your Enquiry has been Submitted Successfully. Our team will contact you shortly.");
    } else if (param[0] == "error") {
        alert("The code is invalid.");
    }
});


function BrowseServer(id)
{

	

 var myWindow;

 	CKFinder.popup( {
		chooseFiles: true,
		width: 1000,
		height: 600,
		onInit: function( finder ) {
			finder.on( 'files:choose', function( evt ) {
				var file = evt.data.files.first();
			
				src = file.getUrl().replace('/ecommerce/assets/','');
				localStorage.setItem("image", file.getUrl());

			
			       		var output = document.getElementById('input-image'+id);
						output.value = src;
						// var preview = $("#"+id).data('preview')==undefined?true:false;
						// if(preview){
							document.getElementById('img-image'+ id ).src = file.getUrl();
						// 	document.getElementById( id+'-preview' ).style.display = 'block';
						// }
						
			 
			} );

			finder.on( 'file:choose:resizedImage', function( evt ) {
				var output = document.getElementById( id );
				output.value = evt.data.resizedUrl;
			} );
		}
	} );
}

$("#overlayQuote select").change(function(){
	$(this).find("option:first").text('');
});

//*******Form Validation*********
function form_validate_jquery(container)
{
	//alert("hello");
	var return_state = true;	

	$(container).find("input, select, textarea, checkbox,  file " ).each(function(){
			
		var title = $(this).attr("title");		
		
		$(this).next().removeClass('input_label_error');
		$(this).next().removeClass('input_label');
		$(this).parent().addClass('input--filled');
		switch($(this).data("required"))
		{				
			case "text":
				if($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');

					if($(this).attr('name')=='courses' || $(this).attr('name') == 'weight' || $(this).attr('name')=='height'){
						$(this).parent().css('border-bottom','2px solid red');
					}

					$(this).val('');
					if(title!=undefined){
						$(this).attr("placeholder", title+" cannot be blank!")
					}
					
					
					return_state = false;													
				}
				else
				{
					$(this).css('border-color','green');
					$(this).next().addClass('input_label');

					if($(this).attr('name')=='courses'){
						$(this).parent().css('border-bottom','2px solid green');
					}
			
				}
			break;

			case "image-input":

		
				if($(this).val() == "")
				{
					$(this).prev().children('img').css('border','1px solid red');
					
					
					return_state = false;													
				}
				else
				{
					$(this).prev().children('img').css('border-color','green');
			
				}
			break;

			case "name":
				if($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');

					$(this).val('');
					
					if(title!=undefined){
						$(this).attr("placeholder", title+" cannot be blank!")
					}
					
					return_state = false;													
				}
				else if(!/^[a-zA-Z ]*$/g.test($(this).val())){
					$(this).css('border-color','red');
		              $(this).next().addClass('input_label_error');
		              $(this).val('');
		              $(this).attr("placeholder", "Only Alphabets should allowed here.")

		              return_state = false;
		        }
				else
				{	
					$(this).css('border-color','green');
					$(this).next().addClass('input_label');
					// $(this).attr("placeholder", title)
				}
			break;

			case "checkbox":
			
				if($(container).find('input:checkbox:checked').length == 0)
				{
					$(this).next().css({"background": "rgba(223, 15, 15, 0.6)"});
					$('.form_error').show();
					return_state = false;													
				}
				else
				{	
					$('.form_error').hide();
					$(this).next().css({"background": "rgba(0, 0, 0, 0.12)"});
				}
			break;

			case "checkbox1":
			
				if($(container).find('input:checkbox:checked').length == 0)
				{
					$(this).css({"box-shadow": "0px 1px 6px 1px red"});
					$('.form_error').show();
					return_state = false;													
				}
				else
				{	
					$('.form_error').hide();
					$(this).removeAttr('style');
				}
			break;

			case "file":
   			
                if($(this).val() == "")
                {
                    
                    $(this).css('border-color','red');
                    $(this).next().css('color','red');
                    // $(this).next().addClass('input_label_error');
                    $(this).val('');
                    
                    // $(this).prev().text(title+" cannot be blank!")
                    
                    return_state = false;                                                   
                }else if($(this).val()!=""){
                  
                    var ext_arr = ['jpeg','jpg']; 
                    var text;
                    if($(this).attr('name')=="userProfile"){
                        ext_arr = ['jpeg','jpg','png']; 
                        text = "Upload only .jpg, .png format ( Size 500 KB )";
                    }else if($(this).attr('name')=="userProof"){
                        ext_arr = ['jpeg','jpg','png','pdf']; 
                        text = "Upload allowed format .pdf, .jpeg, .jpg, .png format ( Size 500 KB )";
                    }
                    
                    var ext = $(this).val().split('.').pop().toLowerCase();
                    if($.inArray(ext, ext_arr) == -1) {
                        $(this).val('');
                         $(this).css('border-color','red');
                       
                         $(this).next().css('color','red');
                     	$(this).next().text(text);
                  
                        return_state = false;       
                    }else if(check_image_size($(this))) {
                        $(this).val('');
                         $(this).css('border-color','red');
                         $(this).next().css('color','red');
                       
                     	$(this).next().text('Image size less than 500 kb.');
                  
                        return_state = false;       
                    }else{
                        $(this).css('border-color','green');
                        $(this).next().css('color','green');
                        $(this).next().text(text);
                    }
                }
                else
                {
                     $(this).css('border-color','green');
                     $(this).next().css('color','green');
                }
            break;

            case "file-update":
   			
              if($(this).val()!=""){
                  
                    var ext_arr = ['jpeg','jpg']; 
                    var text;
                    if($(this).attr('name')=="userProfile"){
                        ext_arr = ['jpeg','jpg','png']; 
                        text = "Upload only .jpg, .png format ( Size 500 KB )";
                    }else if($(this).attr('name')=="userProof"){
                        ext_arr = ['jpeg','jpg','png','pdf']; 
                        text = "Upload allowed format .pdf, .jpeg, .jpg, .png format ( Size 500 KB )";
                    }
                    
                    var ext = $(this).val().split('.').pop().toLowerCase();
                    if($.inArray(ext, ext_arr) == -1) {
                        $(this).val('');
                         $(this).css('border-color','red');
                         $(this).next().addClass('input_label_error');
                         $(this).next().css('color','red');
                     	$(this).next().text(text);
                  
                        return_state = false;       
                    }else if(check_image_size($(this))) {
                        $(this).val('');
                         $(this).css('border-color','red');
                         $(this).next().css('color','red');
                         $(this).next().addClass('input_label_error');
                     	$(this).next().text('Image size less than 500 kb.');
                  
                        return_state = false;       
                    }else{
                        $(this).css('border-color','green');
                        $(this).next().css('color','green');
                        $(this).next().text(text);
                    }
                }
                else
                {
                     $(this).css('border-color','green');
                     $(this).next().css('color','green');
                }
            break;

			// case "select":
			
			// 	if($(container).find('select').val() == "")
			// 	{
			// 		$(this).css("border-color","red");
			// 		$(this).parent('.input-type-select').css("border-color","red");
			// 		return_state = false;													
			// 	}
			// 	else
			// 	{	
			// 		$(this).parent('.input-type-select').css("border-color","green");
			// 		$(this).css("border-color","green");
			// 	}
			// break;


			case "textarea":
				if($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');
					$(this).val('');
					
					if(title!=undefined){
						$(this).attr("placeholder", title+" cannot be blank!")
					}
					
					return_state = false;													
				}
				else
				{
					$(this).css('border-color','green');
					$(this).next().addClass('input_label');
					// $(this).attr("placeholder", title)
				}
			break;
		
			case "password":

				if($(this).val() == "")
				{
					
					if($(this).data('bool')=="yes" || $("#password").val()!=""){
						$(this).next().addClass('input_label_error');
						$(this).val('');
						$(this).css('border-color','red');
						return_state = false;	
						if(title!=undefined){
							$(this).attr("placeholder", title+" cannot be blank!")
						}
					}else{
						$(this).next().addClass('input_label');
						
					}
					
																	
				}
				else if($(this).val().length < 8)
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');
					$(this).val('');					
					$(this).attr("placeholder", title + " should be min 8 char!")
					
					return_state = false;		
				}
				else if($(this).attr('match')!="" && $(this).attr('match')!=null && $(this).attr('match')!='undefined'){
					if($(this).closest(container).find('#'+$(this).attr('match')).val()!=$(this).val())
					{

						$(this).css('border-color','red');
						$(this).next().addClass('input_label_error');
						$(this).val('');					
						$(this).attr("placeholder", title+" does not match!")
						
						return_state = false;		
					}else{
						$(this).css('border-color','green');
						$(this).next().addClass('input_label');
						// $(this).attr("placeholder", title)
					}
				}
				else
				{
					$(this).css('border-color','green');
					$(this).next().addClass('input_label');
					// $(this).attr("placeholder", title)
				}
			break;
			case "email":
				if($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');
					$(this).val('');
					if(title!=undefined){
						$(this).attr("placeholder", title+" cannot be blank!")
					}						
					return_state = false;
				}
				else if($(this).val().indexOf('@') == -1 || $(this).val().indexOf('.') == -1)
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');
					$(this).val('');
					if(title!=undefined){
						$(this).attr("placeholder", title+" is not valid email address!")	
					}else{
						$(this).attr("placeholder", " Invalid email address!")	
					}
											
					return_state = false;
				}
				
				else
				{
					$(this).css('border-color','green');
					$(this).next().addClass('input_label');
					// $(this).attr("placeholder", title)
				}
			break;
			
			case "mobile":
				
				if($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');
					$(this).val('');
					if(title!=undefined){
						$(this).attr("placeholder", title+" cannot be blank!")	
					}					
					return_state = false;
				}
				else if(isNaN($(this).val()))
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');
					$(this).val('');
					if(title!=undefined){
						$(this).attr("placeholder", title+" should be numeric!")	
					}else{
						$(this).attr("placeholder", " Mobile should be numeric !")	
					}
											
					return_state = false;
				}
				else if($(this).val().length > 10 )
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');
					$(this).val('');
					$(this).attr("placeholder", "Mobile must be 10 digits !")							
					return_state = false;
				}
				else
				{
					$(this).css('border-color','green');
					$(this).next().addClass('input_label');
					// $(this).attr("placeholder", title)
				}				
			break;
			case "number":
				if($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');
					$(this).val('');
					$(this).attr("placeholder", title+" cannot be blank!")							
					return_state = false;
				}
				else if(isNaN($(this).val()))
				{
					$(this).css('border-color','red');
					$(this).next().addClass('input_label_error');
					$(this).val('');
					$(this).attr("placeholder", title+" is not valid number!")							
					return_state = false;
				}
				else
				{
					$(this).css('border-color','green');
					$(this).next().addClass('input_label');
					// $(this).attr("placeholder", "")
				}				
			break;
		}
	})

	return return_state 

	// if(return_state){

	// 	if(container == "#send_enquiry"){

	// 		if(grecaptcha.getResponse() == "") {
	// 			$(".g-recaptcha").next('span').remove();	
	// 	   		 $(".g-recaptcha").after('<span style="color: red;font-size:12px">Google captcha is not selected.</span>');
	// 		} else {
	//                	overlayBox('loader');
	// 		    	var formData = $('form').serializeArray();
	// 			    $.ajax({
	// 		            url: 'inc/contact.php',
	// 		            type : 'POST',
	// 		            async : true,
	// 		            data : formData,
	// 		            beforeSend: function(){
					     
	// 				    },
	// 				    complete: function(){
					    
	// 				    },
	// 		            success: function(data) {
	// 		            	   $("#loader").hide(); 
	// 					        grecaptcha.reset();
	// 					        $(container).find('.g-recaptcha').next('span').remove();	
	// 							console.log(formData);
	// 						    $(container).find("input, textarea, select").val('');
	// 						    $(container).find("input, textarea, select").removeAttr('style');
	// 						    if(container == "#order-now"){
	// 						    	$("#order-now").fadeOut();
	// 						    }else{
	// 						    	$("#get-enquiry").fadeOut();
	// 						    }
							    
	// 							overlayBox('successfully');
	// 		            }
	// 		        });
				  
	// 		}

	// 		return false;
	// 	}
	// 	else if(container == "#customer-login"){

	// 		if(grecaptcha.getResponse() == "") {

	// 	        // $('.g-recaptcha').children().css('border','1px solid red;');
	// 	        $(container+" .g-recaptcha").next('span').remove();    
	// 	        $(container+" .g-recaptcha").after('<span style="color: red;font-size:12px">Google captcha is not selected.</span>');
	// 	        return false;
	// 	    }else{
	// 	        $(container+" .g-recaptcha").next('span').remove(); 
	// 	        return true;
	// 	    }	

	// 	}else{
	// 		return true;
	// 	}

	
	// }else{
	// 	return false;
	// }

	
	// $("#loader").fadeOut();
	
	
}

function check_image_size(_this_para){
	 //Get reference of FileUpload.

    var _this = _this_para;

    	var fileUpload = document.getElementById(_this.attr('id'));
	    //Check whether HTML5 is supported.
	    if (typeof (fileUpload.files) != "undefined") {
	        //Initiate the FileReader object.
	        var reader = new FileReader();
	        //Read the contents of Image File.
	      	var file = document.querySelector("#"+_this.attr('id')).files[0];
	   
	        var fileSize = file.size;
	        
	        if(fileSize > 500001){
	        	return true;
	        }
	    } 

	    return false;


 
    
}



/*Overlay function*/
/*Overlay function*/
var animationIn, target, animationOut;
function overlayBox(popupID)
{
    sessionStorage.setItem("CloseFlag", "true")
  target = $('#' + popupID)
  animationIn = target.attr('data-animation-in');
  animationOut = target.attr('data-animation-out');
  if (typeof (animationIn) == 'undefined' || animationIn === '(an empty string)' || animationIn === null || animationIn === '')
  {    
    animationIn = 'zoomIn';
  }
  if (typeof (animationOut) == 'undefined' || animationOut === '(an empty string)' || animationOut === null || animationOut === '')
  {
    animationOut = 'zoomOut';
  }
  $('body').append('<div class="overlay-bg"></div>')
  target.find('.overlay-header').append('<div class="closeBtn">Ã—</div>');
  target.css('visibility', 'visible').css('display', 'block').find('.overlay-box').addClass('animated').addClass(animationIn);
  $(document).on('click', '.closeBtn', function () {
      if (sessionStorage.getItem("CloseFlag") == "false") {
          sessionStorage.removeItem("CloseFlag")
      }
      else
      {
          $('.overlay').find('.overlay-box').removeClass('animated').removeClass(animationIn).addClass('animated ' + animationOut);
          $('body .overlay-bg').fadeOut(1000, function () {
              $(this).remove();
              $('.overlay').css('visibility', 'hidden').css('display', 'none').find('.overlay-box').removeClass('animated').removeClass(animationIn).removeClass(animationOut);
          });
          $(this).remove();
          $(".send-enquiry").show()
          sessionStorage.removeItem("CloseFlag")
      }    
  });
}

/*remove pop up on click of outside*/

    $(document).on('click', '.overlay-box', function () {
        sessionStorage.removeItem("CloseFlag")
        sessionStorage.setItem("CloseFlag", "false")
    });

    $(document).on('click', '.overlay', function () {
        if (sessionStorage.getItem("CloseFlag") == null) {
            sessionStorage.setItem("CloseFlag", "true")
            //closeButton();
            $(".closeBtn").trigger("click")
        }
        else if (sessionStorage.getItem("CloseFlag") == "true") {
            //closeButton();
            $(".closeBtn").trigger("click")
        }
        else {
            sessionStorage.removeItem("CloseFlag")
        }
    });

/*Overlay function end*/


 var cart = {
    'add': function(course_id) {
       	


        $.ajax({
            url: 'addToCart',
            type: 'post',
            data: 'course_id=' + course_id,
            success: function(data) {
              	// console.log(data);
              	window.location.href = "cart"
            }
        });
    },
    'update': function(key, quantity) {

        $.ajax({
            url: 'Cart/updateCart',
            type: 'post',
            data: 'key=' + key + '&quantity=' + quantity,
            success: function(json) {

                if(json==true){
                  console.log('update');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    'remove': function(key) {
        $.ajax({
            url: 'removeCart',
            type: 'post',
            data: 'key=' + key,
            success: function(json) {
               window.location.reload();
            }
           
        });
    },

}

$(document).on("change","#userProfile",function(){

    //Get reference of FileUpload.

    var _this = $(this);

    var fileUpload = document.getElementById($(this).attr('id'));
    //Check whether the file is valid Image.
  
        
        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                _this.prev().children().attr('src',image.src);
                //Validate the File Height and Width.
                
 
            }
        } else {
            alert("This browser does not support HTML5.");
            fileUpload.value = "";
            return false;
        }
   
    
});

function showpassword(type) {
  var x = document.getElementById(type);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}