(function($) {
  "use strict"; // Start of use strict
  // Configure tooltips for collapsed side navigation
  $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
    template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
  })
  // Toggle the side navigation
  $("#sidenavToggler").click(function(e) {
    e.preventDefault();
    $("body").toggleClass("sidenav-toggled");
    $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
    $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
  });
  // Force the toggled class to be removed when a collapsible nav link is clicked
  $(".navbar-sidenav .nav-link-collapse").click(function(e) {
    e.preventDefault();
    $("body").removeClass("sidenav-toggled");
  });
  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
    var e0 = e.originalEvent,
      delta = e0.wheelDelta || -e0.detail;
    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
    e.preventDefault();
  });
  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });
  // Configure tooltips globally
  $('[data-toggle="tooltip"]').tooltip()
  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });
  
  // Inline popups
  $('.inline-popups').each(function () {
    $(this).magnificPopup({
      delegate: 'a',
      removalDelay: 500, //delay removal by X to allow out-animation
      callbacks: {
        beforeOpen: function () {
          this.st.mainClass = this.st.el.attr('data-effect');
        }
      },
      midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });
  });

 // Bookmarks
 $('.wishlist_close').on('click', function (c) {
  $(this).parent().parent().parent().fadeOut('slow', function (c) {});
 });
  
  // Selectbox
  $(".selectbox").selectbox();
  
  // Pricing add
  function newMenuItem() {
    var newElem;
    var index = $('table#pricing-list-container tr:last').attr('data-id');

    var new_index = parseInt(index) + 1;
  
      newElem = ' <tr class="pricing-list-item" data-id="'+new_index+'">';
        newElem += '  <td>';
          newElem += '  <div class="row">';
            newElem += '  <div class="col-md-10">';
              newElem += '  <div class="form-group">';
                newElem += '  <input type="text" class="form-control"  name="lession['+new_index+'][chapter][]" placeholder="Chapter Name">';
              newElem += '  </div>';
            newElem += '  </div>';
            newElem += '  <div class="col-md-2">';
              newElem += '  <div class="form-group">';
                newElem += '  <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>';
              newElem += '  </div>';
            newElem += '  </div>';
          newElem += '  </div>';
        newElem += '  </td>';
      newElem += '  </tr>';
      newElem += ' <tr class="pricing-list-item chapter-content-list-item" data-id="'+new_index+'" data-content-id="0" data-content-increase="0" data-combination="10">';
      newElem +='  <td>';
        newElem +='  <div class="row">';
           newElem +='  <div class="col-md-1 chapter-content-add">';
            newElem +='  <a href="Javascript:void(0)" class="btn_1 gray add-content-list-item">Add</a>';
          newElem +='  </div>';
          newElem +='  <div class="col-md-3">';
            newElem +='  <div class="form-group">';
              newElem +='  <input type="text" class="form-control" name="lession['+new_index+'][content][0][content_name]" placeholder="Content title">';
            newElem +='  </div>';
          newElem +='  </div>';
          newElem +='  <div class="col-md-3">';
            newElem +='  <div class="form-group">';
              newElem +='  <select class="form-control content-type" name="lession['+new_index+'][content][0][content_type]" >';
                newElem +='  <option value="0">Video</option>';
                newElem +='  <option value="1">Content</option>';
              newElem +='  </select>';
                
            newElem +='  </div>';
          newElem +='  </div>';
          newElem +='  <div class="col-md-3">';
            newElem +='  <div class="form-group">';
              newElem +='  <input type="text" name="lession['+new_index+'][content][0][content_video]" class="form-control video-content" style="display: block;" placeholder="Video URL">';
              newElem +='  <button type="button" data-key="'+(new_index+"-0")+'" data-name="content_desc" class="btn_1 gray create-pages"  style="border-radius: 0;display: none;padding: 17px;">Create Pages</button>';
            newElem +='  </div>';
          newElem +='  </div>';
          newElem +='  <div class="col-md-2 chapter-content-delete">';
            newElem +='  <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>';
          newElem +='  </div>';
        newElem +='  </div>';
      newElem +='  </td>';
    newElem +='  </tr>';

    $('table#pricing-list-container').find('tr:last').after(newElem);

    // $("table#pricing-list-container tr[data-chapter='"+index+"']").attr('data-chapter',new_index);
  }

  if ($("table#pricing-list-container").is('*')) {

    $('.add-pricing-list-item').on('click', function (e) {
      e.preventDefault();
      newMenuItem();
    });

    $(document).on('click','.add-content-list-item', function (e) {
        e.preventDefault(); 
        var chapter_index = $(this).closest('tr').attr('data-id');
        var index = $(this).closest('tr').attr('data-content-increase');

        var new_index = parseInt(index) + 1;
        $(this).closest('tr').attr('data-content-increase',new_index);
        var newElem = "";
        newElem += ' <tr class="pricing-list-item chapter-content-list-item" data-id="'+chapter_index+'" data-content-id="'+new_index+'" data-combination="'+chapter_index+''+new_index+'">';
        newElem +='  <td>';
          newElem +='  <div class="row">';
             newElem +='  <div class="col-md-1 chapter-content-add">';
          
            newElem +='  </div>';
            newElem +='  <div class="col-md-3">';
              newElem +='  <div class="form-group">';
                newElem +='  <input type="text" class="form-control" name="lession['+chapter_index+'][content]['+new_index+'][content_name]" placeholder="Content title">';
              newElem +='  </div>';
            newElem +='  </div>';
            newElem +='  <div class="col-md-3">';
              newElem +='  <div class="form-group">';
                newElem +='  <select class="form-control content-type" name="lession['+chapter_index+'][content]['+new_index+'][content_type]" >';
                  newElem +='  <option value="0">Video</option>';
                  newElem +='  <option value="1">Content</option>';
                newElem +='  </select>';
                  
              newElem +='  </div>';
            newElem +='  </div>';
            newElem +='  <div class="col-md-3">';
              newElem +='  <div class="form-group">';
                newElem +='  <input type="text" name="lession['+chapter_index+'][content]['+new_index+'][content_video]" class="form-control video-content" style="display: block;" placeholder="Video URL">';
                newElem +='  <button type="button" data-key="'+(chapter_index+"-"+new_index)+'" data-name="content_desc" class="btn_1 gray create-pages"  style="border-radius: 0;display: none;padding: 17px;">Create Pages</button>';
              newElem +='  </div>';
            newElem +='  </div>';
            newElem +='  <div class="col-md-2 chapter-content-delete">';
              newElem +='  <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>';
            newElem +='  </div>';
          newElem +='  </div>';
        newElem +='  </td>';
      newElem +='  </tr>';
        // alert('tr[data-combination="'+chapter_index+''+index+'"]');
        $(this).closest('tr').parent().find('tr[data-combination="'+chapter_index+''+index+'"]').after(newElem);

    });
    $(document).on("click", "#pricing-list-container .delete", function (e) {
      e.preventDefault();
     
      $(this).closest('tr').remove();
      
    });
  }

  $(document).on("click", "#container-list-ques-ans .delete", function (e) {
    e.preventDefault();
    $(this).closest('tr').next().remove();
    $(this).closest('tr').remove();
    
  });

  $(document).on('change','.content-type',function(){

    if($(this).val()==0){
        $(this).closest('.col-md-3').next().find('input[type="text"]').show();
        $(this).closest('.col-md-3').next().find('.create-pages').hide();
    }else{
        $(this).closest('.col-md-3').next().find('input[type="text"]').hide();
        $(this).closest('.col-md-3').next().find('.create-pages').show();
    }

  });

  $(document).on('click',".create-pages",function(){

    $('#myModal').modal('show');
    var _this = $(this);
    var name = _this.attr('data-name');
      var flag = 0;
      $.ajax({
          url: 'ManageCourses/savePages',
          type: 'get',
          async: false,
          data: {'page-details':'true','path':_this.attr('data-key'),'name' : _this.attr('data-name')},
          success: function(data) {
            if(data.trim()!=""){
              $("#parent-container-pages").html('')
              $("#parent-container-pages").html(data);
               
              flag = 1;
            }
          }
      });

     if(flag == 0){

       var newElem = "";
       
        var cnt = 0;
         $('#myModal').modal('show');
        newElem = '<a data-id="'+cnt+'"  class="nav-item nav-link" id="nav-page-tab-'+cnt+'" data-toggle="tab" href="#nav-page-'+cnt+'" role="tab" aria-controls="nav-page-'+cnt+'" aria-selected="true">Page '+(cnt+1)+'</a>';
        $('.nav-tabs').html('');
        $('.nav-tabs').append(newElem);

        newElem = '<div class="tab-pane fade show active" id="nav-page-'+cnt+'" role="tabpanel" aria-labelledby="nav-page-tab">';
           newElem += '<textarea class="ckeditor" name="'+name+'['+cnt+']" id="description-'+cnt+'"></textarea>';
        newElem += '</div><input type="hidden" name="path" value="'+(_this.attr('data-key'))+'"/>';
        
        $("#nav-tabContent").html('');
        $("#nav-tabContent").append(newElem);
        
        CKEDITOR.replace( 'description-' + cnt );

      }

      $("#parent-nodes").html('');
      $("#parent-nodes").html($("#pricing-list-container").clone());

      $("#add-pages").attr('data-name',name);

  });

   $(document).on('click',".create-ques-ans",function(){

     $('#modal-ques-ans').modal('show');
     var _this = $(this)
     $("#ques-ans-key").val(_this.attr('data-key'));

      var flag = 0;
      $.ajax({
          url: 'ManageCourses/saveQuesAns',
          type: 'get',
          async: false,
          data: {'page-details':'true','path':_this.attr('data-key')},
          success: function(data) {
            if(data.trim()!=""){
              $("#container-list-ques-ans").html('')
              $("#container-list-ques-ans").html(data);
            }
          }
      });


   });

  $("#add-pages").click(function(){

      var newElem = "";
      var cnt = $('.nav-tabs').find('a:last').data('id');
      cnt = parseInt(cnt) + 1;
      newElem = '<a data-id="'+cnt+'"  class="nav-item nav-link" id="nav-page-tab-'+cnt+'" data-toggle="tab" href="#nav-page-'+cnt+'" role="tab" aria-controls="nav-page-'+cnt+'" aria-selected="true">Page '+(cnt+1)+'</a>';
       var name = $(this).attr('data-name');
      $('.nav-tabs a').last().after(newElem);

    
          newElem = '<div class="tab-pane fade show" id="nav-page-'+cnt+'" role="tabpanel" aria-labelledby="nav-page-tab">';
             newElem += '<textarea class="ckeditor" name="'+name+'['+cnt+']" id="description-'+cnt+'"></textarea>';
          newElem += '</div>';


      $("#nav-tabContent").find('.tab-pane:last').after(newElem);
      CKEDITOR.replace( 'description-' + cnt );

  });

  $("#add-question").click(function(){
    var cnt = $('#container-list-ques-ans tr:last').attr('data-row');
    cnt = parseInt(cnt) + 1;

    var tr = "";

        tr +='  <tr data-row="'+cnt+'">';
          tr +='  <td colspan="4">';
             tr +='  <div class="input-group mb-3">';
              tr +='  <div class="input-group-prepend">';
                tr +='  <span class="input-group-text" id="basic-addon1">Q '+(cnt+1)+'.</span>';
              tr +='  </div>';
              tr +='  <input type="text" class="form-control" data-required="text" title="Question" name="question['+cnt+'][ques]" placeholder="Question"> ';
            tr +='  </div>';
            
          tr +='  </td>';
          tr +='  <td> <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a></td>';
        tr +='  </tr>';
        tr +='  <tr data-row="'+cnt+'">';
          tr +='  <td>';
            tr +='  <div class="input-group mb-3">';
              tr +='  <div class="input-group-prepend">';
                tr +='  <span class="input-group-text" style="padding: 0.9rem .75rem;"><input type="radio" name="question['+cnt+'][ans]" checked="checked" value="0"></span>';
              tr +='  </div>';
              tr +='  <input type="text" class="form-control" name="question['+cnt+'][option][0]" placeholder="Option" aria-label="Option" aria-describedby="basic-addon1">';
            tr +='  </div>';
          tr +='  </td>';
          tr +='  <td>';
            tr +='  <div class="input-group mb-3">';
              tr +='  <div class="input-group-prepend">';
                tr +='  <span class="input-group-text" style="padding: 0.9rem .75rem;"><input type="radio" name="question['+cnt+'][ans]" value="1"></span>';
              tr +='  </div>';
              tr +='  <input type="text" class="form-control" name="question['+cnt+'][option][1]" placeholder="Option" aria-label="Option" aria-describedby="basic-addon1">';
            tr +='  </div>';
          tr +='  </td>';
          tr +='  <td>';
            tr +='  <div class="input-group mb-3">';
              tr +='  <div class="input-group-prepend">';
                tr +='  <span class="input-group-text" style="padding: 0.9rem .75rem;"><input type="radio" name="question['+cnt+'][ans]" value="2"></span>';
              tr +='  </div>';
              tr +='  <input type="text" class="form-control" name="question['+cnt+'][option][2]" placeholder="Option" aria-label="Option" aria-describedby="basic-addon1">';
            tr +='  </div>';
          tr +='  </td>';
          tr +='  <td>';
            tr +='  <div class="input-group mb-3">';
              tr +='  <div class="input-group-prepend">';
                tr +='  <span class="input-group-text" style="padding: 0.9rem .75rem;"><input type="radio" name="question['+cnt+'][ans]" value="3"></span>';
              tr +='  </div>';
              tr +='  <input type="text" class="form-control" name="question['+cnt+'][option][3]" placeholder="Option" aria-label="Option" aria-describedby="basic-addon1">';
            tr +='  </div>';
          tr +='  </td>';
          tr +='  <td> <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a></td>';
        tr +='  </tr>';

        $('#container-list-ques-ans tr:last').after(tr);

  });

  $("#save-pages").click(function(){
      for (var i in CKEDITOR.instances) {
          CKEDITOR.instances[i].updateElement();
      };

      $('form[name="content-description-form"]').submit();

  });



  $('select[data-selected]').each(function(){

    var split = $(this).data('selected').toString().split(",");
    if(split.length){
      $(this).val(split);
    }else{
      $(this).val($(this).data('selected'));
    }
   
  });
  
})(jQuery); // End of use strict

