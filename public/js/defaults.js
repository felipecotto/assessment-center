$(document)
    .ready(function() {

    moment.locale('pt');

    $(".timeago").timeago();

    $('.ui.rating').rating('disable');
    
    $('.ui.checkbox').checkbox();

    $('.financial_fields').fadeOut();
    $('.marketing_fields').fadeOut();

    $('#type_service').on('change',function(e){
      
        id = $('select[name=type_service]').val();

        if(id == 1){
          $('.marketing_fields').fadeIn();
          $('.financial_fields').fadeOut();
        }else if(id == 3){
          $('.financial_fields').fadeIn();
          $('.marketing_fields').fadeOut();
        } else {
          $('.marketing_fields').fadeOut();
          $('.financial_fields').fadeOut();
        }

        $.post( "/services/listparent", { id : id } ).done(function(json){
            html = '';
            $.each($.parseJSON(json), function() {
                html += '<div class="field">';
                html += '<div class="ui checkbox">';
                html += '<input type="checkbox" id="service_'+this.id+'" name="services[]" value="'+this.id+'" class="hidden services">';
                if(this.included == 1){
                  html += '<label for="service_'+this.id+'">'+this.name+'</label>';
                } else {
                  price =  accounting.formatMoney(this.price, [symbol = "R$ "],[precision = 0],[thousand = "."],[decimal = ","]);
                  html += '<label class="green" for="service_'+this.id+'">'+this.name+' (+ '+price+')</label>';
                }
                
                html += '</div>';
                html += '</div>';
            });
            $('.grouped_services').html(html);
            $('#segment_services').removeClass('disabled');
            $('.ui.checkbox').checkbox();
            
            event.preventDefault();
            $('html,body').animate({scrollTop:$('#aservice').offset().top}, 500);

            // Call services function
            $('.services').on('change',function(e){

              if($('.services').is(':checked')){
                $('#segment_info').removeClass('disabled');

                event.preventDefault();
              }else{
                $('#segment_info').addClass('disabled');
                $('#segment_finish').addClass('disabled');
                $('#confirm').attr('disabled','disabled');
              }
                
            });

        });
    });

    

  $('.special.cards .image').dimmer({
    on: 'hover'
  });


    $('#deadline').on('change',function(e){
        $('#segment_finish').removeClass('disabled');
        
        $('#confirm').removeAttr('disabled');
        event.preventDefault();
    });

    $( ".reply" ).form({
        fields: {
           
           
            message_text : {
              identifier : 'message_text',
              rules : [{
                  type : 'empty',
                  prompt : 'Escreva sua mensagem'
                  }]
            }
        },
        onSuccess: function() {

        }
    }).submit( function( e ) {
        

    });

    $('.type_message').on('click',function(e){
        $('.type_message').removeClass('active');
        if($(this).data('id')>0){
          $(this).addClass('active');
          $('#type_message').val($(this).data('id'));
          e.preventDefault();
        }
    })
   
   $('#deliver_button').on('click',function(e){

      $('#deliver_modal').modal({
            closable  : false,
            onDeny    : function(){
            },
            onApprove : function() {

              additional = $('#additional_deliver').val();
              ticket_id = $('#ticket_id').val();
              service_id = $('#service_id').val();
              fileChecked = $('#fileChecked').val();
              
              if (fileChecked == 'false')
              {
                $('#error_reason').removeClass('hidden');
                $('#error_reason').text('Envie o arquivo final para o cliente.');
                return false;
              }

              $('#error_reason').addClass('hidden');

              
              $.ajax({
                type: 'POST',
                data: {additional: additional, service_id: service_id, ticket_id:ticket_id},
                url: '/tickets/savedelivered/',
                beforeSend: function () {

                },
                success: function (data) {
                                     location.reload(true);
                },
                error: function (data) {

                }
              });
              
            }
          })
          .modal('show')
        ;
    });

  $('#annotation_button').on('click',function(e){

      $('#annotation_modal').modal({
            closable  : false,
            onDeny    : function(){
            },
            onApprove : function() {

              annotation = $('#annotation').val();
              ticket_id = $('#ticket_id').val();
              service_id = $('#service_id').val();
              
              if (annotation == '')
              {
                $('#error_annotation').removeClass('hidden');
                $('#error_annotation').text('Descreva a sua observação.');
                return false;
              }

              $('#error_annotation').addClass('hidden');

              
              $.ajax({
                type: 'POST',
                data: {annotation: annotation, service_id: service_id, ticket_id:ticket_id},
                url: '/tickets/saveannotation/',
                beforeSend: function () {

                },
                success: function (data) {
                    window.location.href='/tickets/about/'+ticket_id+'/'+service_id;
                },
                error: function (data) {

                }
              });
              
            }
          })
          .modal('show')
        ;
    });

  $('#postpone_button').on('click',function(e){

      $('#postpone_modal').modal({
            closable  : false,
            onDeny    : function(){
            },
            onApprove : function() {

              annotation = $('#annotation').val();
              ticket_id = $('#ticket_id').val();
              service_id = $('#service_id').val();
              
              if (annotation == '')
              {
                $('#error_reason').removeClass('hidden');
                $('#error_reason').text('Descreva a sua observação.');
                return false;
              }

              $('#error_reason').addClass('hidden');

              
              $.ajax({
                type: 'POST',
                data: {annotation: annotation, service_id: service_id, ticket_id:ticket_id},
                url: '/tickets/saveannotation/',
                beforeSend: function () {

                },
                success: function (data) {
                    window.location.href='/tickets/about/'+ticket_id+'/'+service_id;
                },
                error: function (data) {

                }
              });
              
            }
          })
          .modal('show')
        ;
    });

    $('.btn_cancel').on('click',function(e){
      e = $(this).data('created');
      id = $(this).data('id');
      

      $('#cancel_modal')
          .modal({
            closable  : false,
            onDeny    : function(){
            },
            onApprove : function() {

              reason = $('#reason').val();

              if(reason == ""){
                $('#error_reason').removeClass('hidden');
                $('#error_reason').text('Por favor, informe a razão para o cancelamento.');
                return false;
              }

              $('#error_reason').addClass('hidden');

              $.ajax({
                type: 'POST',
                data: {reason: reason, id: id},
                url: '/tickets/cancel/',
                beforeSend: function () {

                },
                success: function (data) {
                  
                },
                error: function (data) {

                }
              });
            }
          })
          .modal('show')
        ;

    });
   
    $('.message .close')
      .on('click', function() {
        $(this)
          .closest('.message')
          .transition('fade')
        ;
      })
    ;

   
    
    
});

