$(function () {
    'use strict';
    var loading = '<div class="loader"><div class="loader__bar"></div><div class="loader__bar"></div><div class="loader__bar"></div><div class="loader__bar"></div><div class="loader__bar"></div><div class="loader__ball"></div></div>';
    // Login Form
    $('#login-form').on('submit', function (event) {
        $(this).validate({
            rules: {
            'login-password': {
                required: true,
                minlength: 5
            },
            'login-mail': {
                required: true,
                email: true
            }
            },
            messages : {
                'login-password' : {
                required : "الرجاء ادخال كلمة المرور",
                minlength : "كلمة المرور على الاقل 5 احرف"
            },
                'login-mail' :{ 
                    email: "البريد الالكتروني غير صحيح",
                    required: "الرجاء ادخال البريد الالكتروني "
            }
            },
            submitHandler: function(form) {
                var that = $('#login-form'),
                type = that.attr('method'),
                url = that.attr('action'),
                mail = $('#login-mail').val(),
                pass = $('#login-password').val();
                $.ajax({  
                  type: type,
                  url: url,
                  data: {
                    'login-mail' : mail,
                    'login-password' : pass
                  },
                  success : function(data) {
                    if (parseInt(data)== 1){
                         // Load makeUsre.php
                        $.ajax({  
                              type: 'POST',
                              url: 'makeUser.php',
                              data: {
                                'mail'    : mail
                              },
                              success : function(data) {
                                location.reload();
                              }});
                    }
                    else {
                       $('#invalid-login').slideDown();
                        $('#login-mail').focus();
                        setTimeout(function () {
                        $('#invalid-login').slideUp();
                        }, 5000);
                    }
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
                });
            }

        });
        return false;
    }); 


    //Signup Form 
    $('#singup-form').on('submit', function () {
        $(this).validate({
            rules: {
            'suser-name': {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            'suser-number': {
                required: true,
                minlength: 9,
                maxlength: 9,
                digits: true
            },
            'suser-mail': {
                required: true,
                email: true
            },
            'suser-remail': {
                required: true,
                email: true,
                equalTo: "#suser-mail"
            },
            'suser-pass': {
                required: true,
                minlength: 5
            },
            'suser-repass': {
                required: true,
                minlength: 5,
                equalTo: "#suser-pass"
            },
            'gender': {
                required: true,
            }
            },
            messages : {
                'suser-name': {
                required: 'هذا الحقل مطلوب',
                minlength: 'من 3-20 حرف',
                maxlength: 'من 3-20 حرف'
            },
            'suser-number': {
                required: 'هذا الحقل مطلوب',
                minlength: 'رقم الجامعي مكون من 9 خانات',
                maxlength: 'الرقم الجامعي مكون من 9 خانات',
                digits: 'ارقام فقط'
            },
            'suser-mail': {
                required: 'هذا الحقل مطلوب',
                email: 'صيغة الايميل خاطئة'
            },
            'suser-remail': {
                required: 'هذا الحقل مطلوب',
                email: 'صيغة الايميل خاطئة',
                equalTo: 'الايميلين مختلفين'
            },
            'suser-pass': {
                required: 'هذا الحقل مطلوب',
                minlength: '5 حروف على الاقل'
            },
            'suser-repass': {
                required: 'هذا الحقل مطلوب',
                minlength: '5 حروف على الاقل',
                equalTo: 'كلمتي السر مختلفتين'
            },
            'gender': {
                required: 'هذا الحقل مطلوب',
            }
            },
            submitHandler: function(form) {
                var that    = $('#singup-form'),
                type        = that.attr('method'),
                url         = that.attr('action'),
                smail      = $('#suser-mail').val(),
                sremail    = $('#suser-remail').val(),
                spass      = $('#suser-pass').val(),
                srepass    = $('#suser-repass').val(),
                sname      = $('#suser-name').val(),
                snumber    = $('#suser-number').val(),
                ssp        = $('#suser-sp').val(),
                gen        = $('input:radio[name=gender]:checked').val();
                $.ajax({  
                  type: type,
                  url: url,
                  data: {
                    'suser-mail'    : smail,
                    'suser-pass'    : spass,
                    'suser-name'    : sname,
                    'suser-number'  : snumber,
                    'suser-sp'      : ssp,
                    'gender'        : gen
                  },
                  success : function(data) {
                  if (parseInt(data) == 2) {
                        $('#invalid-signup').slideDown().text('هذا الايميل مستعمل بالفعل');
                        $('#suser-mail').focus();
                        setTimeout(function () {
                        $('#invalid-signup').slideUp();
                        }, 5000);
                  }else 
                  if (parseInt(data) == 3) {
                        $('#invalid-signup').slideDown().text('الرقم الجامعي موجود بالفعل');
                        $('#suser-number').focus();
                        setTimeout(function () {
                        $('#invalid-signup').slideUp();
                        }, 5000);
                  }else 
                  if (parseInt(data) == 1) {
                        $('#valid-signup').slideDown();

                        // Load makeUsre.php
                        $.ajax({  
                              type: 'POST',
                              url: 'makeUser.php',
                              data: {
                                'mail'    : smail
                              },
                              success : function(data) {
                                location.reload();
                              }});
                        setTimeout(function () {
                        $('#valid-signup').slideUp();
                        }, 5000);
                  }else {
                    alert(data);
                  }
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
                });
            }

        });
        return false;
    });
    
    //Set User Name Form
    $('#setUserName').on('submit', function () {
        $(this).validate({
            rules: {
            'newUserName': {
                required: true,
                minlength: 5,
                maxlength: 30
            }
            },
            messages : {
                'newUserName' : {
                required : "الرجاء ادخال الاسم الجديد :)",
                minlength : "اسم المستخدم على الاقل 5 احرف",
                maxlength : "اسم المستخدم من 5-30 احرف"
            }
            },
            submitHandler: function(form) {
                var that = $('#setUserName'),
                type = that.attr('method'),
                url = that.attr('action'),
                newUserName = $('#newUserName').val();
                $.ajax({  
                  type: type,
                  url: url,
                  data: {
                    'newUserName' : newUserName
                  },
                  success : function(data) {
                      if(data == '1'){
                        $('#name-done').slideDown();
                        $('#newUserName').val('');
                        setTimeout(function () {
                        $('#name-done').slideUp();
                        }, 2000);

                      } 
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
                });
            }

        });
        return false;
    }); 


//Set Password Form
    $('#setPassword').on('submit', function () {
        $(this).validate({
            rules: {
            'newPassword': {
                required: true,
                minlength: 5
            },
            'reNewPassword': {
              required: true,
              equalTo: '#newPassword'
            }
            },
            messages : {
                'newPassword' : {
                required : "هذا الحقل مطلوب",
                minlength : "الرقم السري على الاقل 5 احرف"
            },
                'reNewPassword' : {
                  required : "هذا الحقل مطلوب",
                  equalTo : "كلمتي السر مختلفتين"
                }
            },
            submitHandler: function(form) {
                var that = $('#setPassword'),
                type = that.attr('method'),
                url = that.attr('action'),
                newPassword = $('#newPassword').val();
                $.ajax({  
                  type: type,
                  url: url,
                  data: {
                    'newPassword' : newPassword
                  },
                  success : function(data) {
                      if(data == '1'){
                        $('#pass-done').slideDown();
                        $('#newPassword').val('');
                        $('#reNewPassword').val('');
                        setTimeout(function () {
                        $('#pass-done').slideUp();
                        }, 2000);

                      } 
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
                });
            }

        });
        return false;
    });


//Contact Us Form
    $('#contact-us').on('submit', function () {
        $(this).validate({
            rules: {
            'con-us-text-area': {
                required: true
            }
            },
            messages : {
                'con-us-text-area' : {
                required : "اكتب شيئا من فضلك"
            }
            },
            submitHandler: function(form) {
                var that = $('#contact-us'),
                type = that.attr('method'),
                url = that.attr('action'),
                message = $('#con-us-text-area').val();
                $.ajax({  
                  type: type,
                  url: url,
                  data: {
                    'message' : message
                  },
                  success : function(data) {
                    if(data == '1'){
                        $('#con-us-text-area').val('');
                        $('#contact-us-modal').modal('close');
                        Materialize.toast('شكرا على مساعدتك ♥_♥', 4000);
                      }
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.');
                    }
                });
            }

        });
        return false;
    });



// Add Schedual
    $('#add-schedual').on('submit', function () {
        $(this).validate({
            rules: {
            },
            messages : {
            },
            submitHandler: function(form) {
                $('.save-schedule-btn').attr('disabled', 'disabled');
                var that = $('#add-schedual'),
                type = that.attr('method'),
                url = that.attr('action'),
                courses = '';
                courses = $('#course-selector').val();
                if(courses != ''){
                $.ajax({  
                  type: type,
                  url: url,
                  data: {
                    'courses' : courses
                  },
                  success : function(data) {
                    $('#my-schedule').html(data);
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
                });}
            }

        });
        return false;
    }); 

    // Logout
    $('#log-out').on('click', function () {
        
                $.ajax({  
                  type: 'POST',
                  url: 'logout.php',
                  success : function(data) {
                    location.reload();
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.');
                    }
                });
            
    }); 

    // Change collage's
    $('.change-col').on('click', function () {
        $('.dropdown-button').dropdown('close');
        var that = $(this);
        var coll = $(this).attr('value');
        $('.collage-name').text($(this).attr('col-name'));
        $.ajax({  
                  type: 'POST',
                  url: 'spList.php',
                  data: {
                    'coll-id' : coll
                  },
                  success : function(data) {
                    $('.sp').html(data);
                    $('.sp-name').html("كلية "+that.attr('col-name'));
                    $('#adv-plan').hide();
                    $('.courses-type').html('<div style="height:300px;background-color: #F3F3F3;text-align: center;margin: 4px;border-radius: 3px;padding: 20px 0 0 0;"><p style="padding: 5px;background-color: #fff;margin: 0 30px;border-radius: 8px;font-size: 16px;font-family: cursive;font-weight: 600;">الرجاء اختيار تخصص لتتمكن من تصفح المواد</p></div>');
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
                });
        return false;
    });


    // ask for content
    $('#asm').on('submit', function () {
            $(this).validate({
            submitHandler: function(form){
                var that  = $('#asm'),
                type      = that.attr('method'),
                url       = that.attr('action'),
                courseId  = $('#coursse-id').val(),
                courseAdmin  = $('#coursse-admin').val(),
                needs = [];
                $('.needs:checked').each(function(i, e) {
                    needs.push($(this).val());
                });
                if(needs != ''){
                $.ajax({  
                  type: type,
                  url: url,
                  data: {
                          'needs' : needs,
                          'courseId': courseId,
                          'adminId'   : courseAdmin
                  },
                success: function(data) {
                $('#asm-done').slideDown();
                setTimeout(function () {
                        $('#asm-done').slideUp();
                        $('#ask-for-content').modal('close');
                        }, 2000);
                },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.');
                    }
                });
              } else {
                  $('#asm-err').slideDown();
                  setTimeout(function () {
                        $('#asm-err').slideUp();
                        }, 2000);
              }
            }
        });
          return false;
    });


    // ask for course
    $('#asc').on('submit', function () {
            $(this).validate({
            submitHandler: function(form){
                var that  = $('#asc'),
                type      = that.attr('method'),
                url       = that.attr('action'),
                adminId   = $.trim($('#admin-id').val()),
                content   = $('#ask-course-field').val();
                if(content != ''){
                $.ajax({  
                  type: type,
                  url: url,
                  data: {
                          'adminId' : adminId,
                          'content': content
                  },
                success: function(data) {
                $('#asc-done').slideDown();
                $('#ask-course-field').val('');
                setTimeout(function () {
                        $('#asc-done').slideUp();
                        $('#ask-for-course').modal('close');
                        }, 2000);
                },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.');
                    }
                });
              } else {
                  $('#asc-err').slideDown();
                  setTimeout(function () {
                        $('#asc-err').slideUp();
                        }, 2000);
              }
            }
        });
          return false;
    });


    // Admin Page
    $('#admin-btn').on('click', function () {
            $.ajax({  
                  type: 'POST',
                  url: 'course-request.php',
                  success : function(data) {
                    if(data == ''){
                    $('.to-add-course').html('<p style="background-color: #FFF;margin: 10px;text-align: center;padding: 40px 5px;font-size: 19px;border-radius: 3px;">عمل رآئع لم يتبقى اي طلبات ...</p>');
                  } else {
                     $('.to-add-course').html(data);
                  }},
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
            });
            $.ajax({  
                  type: 'POST',
                  url: 'content-request.php',
                  success : function(data) {
                    if (data == '') {
                    $('.to-add-content').html('<p style="background-color: #FFF;margin: 10px;text-align: center;padding: 40px 5px;font-size: 19px;border-radius: 3px;">عمل رآئع لم يتبقى اي طلبات ...</p>');
                  } else {
                     $('.to-add-content').html(data);
                  }
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
            });
            $.ajax({  
                  type: 'POST',
                  url: 'comment-request.php',
                  success : function(data) {
                    if(data == ''){
                    $('.to-accept').html('<p style="background-color: #FFF;margin: 10px;text-align: center;padding: 40px 5px;font-size: 19px;border-radius: 3px;">عمل رآئع لم يتبقى اي طلبات ...</p>');
                  } else {
                     $('.to-accept').html(data);
                  }},
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
            });
            $.ajax({  
                  type: 'POST',
                  url: 'admin-course-list.php',
                  success : function(data) {
                    $('.admin-courses-table').html(data);
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
            });
    });

    //Refresh Admin Panel
    $('.ref-comment').on('click', function () {
            $('.to-accept').html(loading);
            $.ajax({  
                  type: 'POST',
                  url: 'comment-request.php',
                  success : function(data) {
                    $('.to-accept').html(data);
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
            });
    });
    $('.ref-content').on('click', function () {
              $('.to-add-content').html(loading);
            $.ajax({  
                  type: 'POST',
                  url: 'content-request.php',
                  success : function(data) {
                    $('.to-add-content').html(data);
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
            });
    });
    $('.ref-course').on('click', function () {
        $('.to-add-course').html(loading);
            $.ajax({  
                  type: 'POST',
                  url: 'course-request.php',
                  success : function(data) {
                        $('.to-add-course').html(data);
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
            });
    });
        // Admin Add Course
          $('#add-course').on('submit', function () {
        $(this).validate({
            rules: {
            'course-name': {
                required: true,
            },
            'course-number': {
                required: true,
                minlength:8,
                maxlength:8
            },
            'course-weight': {
                required: true,
                minlength:1,
                maxlength:1
            }
            },
            messages : {
                'course-name' : {
                required : "ألرجاء ادخال اسم المساق"
            },
            'course-number' :{ 
                    required: "ألرجاء ادخال رقم المساق",
                    minlength: "رقم المساق يجب ان يتكون من 8 خانات",
                    maxlength: "رقم المساق يجب ان يتكون من 8 خانات"
            },
            'course-weight' :{ 
                    required: "أعدد ساعات المساق مطلوبة ",
                    minlength: "رقم المساق يجب ان يتكون من خانة واحدة",
                    maxlength: "رقم المساق يجب ان يتكون من خانة واحدة"
            }
            },
            submitHandler: function(form) {
                var that = $('#add-course'),
                type = that.attr('method'),
                url = that.attr('action'),
                courseName = $('#course-name').val(),
                courseId = $('#course-number').val(),
                courseWeight = $('#course-weight').val();
                $.ajax({  
                  type: type,
                  url: url,
                  data: {
                    'course-name' : courseName,
                    'course-id' :courseId,
                    'course-weight' :courseWeight
                  },
                  success : function(data) {
                    if(data == '1') {
                      $('#add-course-done').slideDown();
                      $('#course-number').val('');
                      $('#course-name').val('');
                      $('#course-weight').val('');
                      setTimeout(function () {
                        $('#add-course-done').slideUp();
                        }, 3000);
                    }
                    else {
                      alert(data);
                      $('#add-course-err').slideDown();
                      $('#course-number').focus().select();
                      setTimeout(function () {
                        $('#add-course-err').slideUp();
                        }, 5000);

                    }
                  },
                  error : function(){
                        alert('Whoops! This didn\'t work. Please contact us.')
                    }
                });
            }

        });
        return false;
    }); 
  });
