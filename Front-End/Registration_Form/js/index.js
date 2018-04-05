$( "#enter-id" ).slideUp();


//Single date range pickers
$(function() {
    $('.js-single-daterange').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
});


$( "#submit-id-button" ).click(function() {
  $( this ).hide();
  /*$( "#submit-id" ).slideUp( "fast", function() {
    // Animation complete.
  });*/
  $( "#enter-id" ).slideDown( "fast", function() {
    // Animation complete.
  });
  $("#enter-id-button").removeAttr('disabled');
  
});




$('.next').click(function(){
    var nextId = $(this).parents('.tab-pane').next().attr("id");
    $('[href=#'+nextId+']').tab('show');
    return false;
  })

  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    //update progress
    var step = $(e.target).data('step');
    var percent = (parseInt(step) / 5) * 100;

    $('.progress-bar').css({width: percent + '%'});
    //$('.progress-bar').text("Step " + step + " of 5");
    e.relatedTarget // previous tab
  })

  $('.first').click(function(){
    $('#myWizard a:first').tab('show')
  })
  
  
  $('#last').click(function(){
    $('#lastli').addClass('success');
  });