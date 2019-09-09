$(function () {
    'use strict';
    setInterval(checkBadges,1000);
    $('#course-selector').change(function () {
      $('.save-schedule-btn').removeAttr('disabled');
    });
    function urlify(text) {
    var urlRegex = /(https?:\/\/[^\s]+)/g;
    return text.replace(urlRegex, function(url) {
        return '<a href="' + url + '">' + url + '</a>';
    })
    // or alternatively
    // return text.replace(urlRegex, '<a href="$1">$1</a>')
}
$('.comment-body').each(function(element) {
    $(element).text(urlify($(element).text()));
});
    function checkBadges() {
      $( '.admin-badges' ).each(function() {
        $( this ).text($(this).parent().siblings('.cont').children('ul').children('li').length);
        if($(this).text() == '0') {
          $(this).parent().addClass('good').removeClass('bad');
          $(this).parent().siblings('.cont').children('ul').html('<p style="background-color: #FFF;margin: 10px;text-align: center;padding: 40px 5px;font-size: 19px;border-radius: 3px;">عمل رآئع لم يتبقى اي طلبات ...</p>');
        } else {
          $(this).parent().addClass('bad').removeClass('good');
        }
      });
    }
    $('.asc').on('click', function () {
      $('#asc #admin-id').attr('value', $.trim($(this).attr('admin-id')));
    });
    $('.asm').on('click', function () {
    $('#coursse-id').attr('value',$(this).attr('course-id'));
    $('#coursse-admin').attr('value',$(this).attr('course-admin'));
    });
    $("input[type='text']").click(function () {
    $(this).select();
    }).focus(function () {
      var last = $(this).attr('placeholder');
      $(this).attr('place-data', last);
      $(this).attr('placeholder', '');
    }).blur(function () {
      var ne = $(this).attr('place-data');
      $(this).attr('placeholder', ne);
    });
    $("textarea").click(function () {
    $(this).select();
    }).focus(function () {
      var last = $(this).attr('placeholder');
      $(this).attr('place-data', last);
      $(this).attr('placeholder', '');
    }).blur(function () {
      var ne = $(this).attr('place-data');
      $(this).attr('placeholder', ne);
    });
    $("input[type='password']").click(function () {
    $(this).select();
    }).focus(function () {
      var last = $(this).attr('placeholder');
      $(this).attr('place-data', last);
      $(this).attr('placeholder', '');
    }).blur(function () {
      var ne = $(this).attr('place-data');
      $(this).attr('placeholder', ne);
    });$("input[type='email']").click(function () {
    $(this).select();
    }).focus(function () {
      var last = $(this).attr('placeholder');
      $(this).attr('place-data', last);
      $(this).attr('placeholder', '');
    }).blur(function () {
      var ne = $(this).attr('place-data');
      $(this).attr('placeholder', ne);
    });$("input[type='number']").click(function () {
    $(this).select();
    }).focus(function () {
      var last = $(this).attr('placeholder');
      $(this).attr('place-data', last);
      $(this).attr('placeholder', '');
    }).blur(function () {
      var ne = $(this).attr('place-data');
      $(this).attr('placeholder', ne);
    });
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: true, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'right', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );
    $('.div-head h6').addClass('z-depth-2');
    $('.slider').slider({
        height : '300px',
        indicators : false 
    });
    $('#show-create-new-account-div').click( function () {
           $('.login-div').animate({ opacity : '0'}, 500);
        $('.login-div').css({
               'display' : 'none'
           });
        $('.sign-up-div').css({
               'display' : 'block'
           });
        $('.sign-up-div').animate({ opacity : '1'}, 1000);
        });
    $('ul.tabs').tabs({
        'swipeable' : 'True'
    });
    $('#show-login-div').click( function () {
            $('.sign-up-div').animate({ opacity : '0'}, 500);
        $('.sign-up-div').css({
               'display' : 'none'
           });
        $('.login-div').css({
               'display' : 'block'
           });
        $('.login-div').animate({ opacity : '1'}, 1000);
        });
    $('ul.tabs').tabs({
        'swipeable' : 'True'
    });
    
    $('.modal').modal();
    $(window).scroll(function(e){ 
  var $el = $('nav'); 
  var isPositionFixed = ($el.css('position') == 'fixed');
  if ($(this).scrollTop() > 300 && !isPositionFixed){ 
    $('nav').css({'position': 'fixed', 'top': '0px', 'width' : '70%'}); 
    $('.slider').css({'marginBottom': '86px' }); 
  }
  if ($(this).scrollTop() < 300 && isPositionFixed)
  {
    $('nav').css({'position': 'static', 'top': '0px', 'width' : '100%' }); 
    $('.slider').css({'marginBottom': '0px' });
  } 
});
    $(window).scroll(function(e){ 
  var $el = $('#logo'); 
  var isPositionFixed = ($el.css('position') == 'fixed');
  if ($(this).scrollTop() > 220 && !isPositionFixed){
      $('#logo').css({
          'display' : 'none'
      });
      $('#min-logo').css({
          'display' : 'inline'
      });
      $('#search-field').css({
          'top' : '66px'
      });
  }
        
  if ($(this).scrollTop() < 300 )
  {
    $('#logo').css({
          'display' : 'inline'
      });
      $('#min-logo').css({
          'display' : 'none'
      });
      $('#search-field').css({
          'top' : '10px'
      });
  } 
});
    $('.modal').modal();
    
    var counrse_name ,
        counrse_number ,
        counrse_hours ;
    
    $('#add_course').click(function () {
        counrse_name = $('#counrse_name').val(),
        counrse_number = $('#counrse_number').val(),
        counrse_hours = $('#counrse_hours').val();
        if (counrse_name != '' && counrse_number != '' && counrse_hours != '' ){
        $('#add_course_table  > tbody:last-child').append('<tr><td>'+counrse_hours+'</td><td>'+counrse_number+'</td><td>'+
          counrse_name+'</td></tr>');}
        
    });
    $('a').hover(function () {
        $('a').css({'backgroundColor' : 'res'});
     //  $('a').addClass('active');
       //$('a').siblings().removeClass('active');
        
    });
    
    $('select').material_select();
    // file chooser var fileInputTextDiv = document.getElementById('file_input_text_div');
var fileInput = document.getElementById('file_input_file');
var fileInputText = document.getElementById('file_input_text');


function changeInputText() {
  var str = fileInput.value;
  var i;
  if (str.lastIndexOf('\\')) {
    i = str.lastIndexOf('\\') + 1;
  } else if (str.lastIndexOf('/')) {
    i = str.lastIndexOf('/') + 1;
  }
  fileInputText.value = str.slice(i, str.length);
}

function changeState() {
  if (fileInputText.value.length != 0) {
    if (!fileInputTextDiv.classList.contains("is-focused")) {
      fileInputTextDiv.classList.add('is-focused');
    }
  } else {
    if (fileInputTextDiv.classList.contains("is-focused")) {
      fileInputTextDiv.classList.remove('is-focused');
    }
  }
}
    
});