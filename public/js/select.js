var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function() {
    $("#subsform").validate({
        rules: {
            email: {
              required: true,
              email: true
            },      
          },
          messages: {
           email: {
            required: "Please enter email address",
            email: "Please enter a valid email address.",
           },
          },
          errorElement : 'div',
        errorLabelContainer: '.errormessage'
    });
    loadProvince();
});

$("#inputemail").on("keyup",function() {
  
})
$('#provinces').on('select2:select', function (e) {
    var id = e.params.data.id;
    $('#regencies').val(null).trigger('change');
    $('#districts').val(null).trigger('change');
    $('#villages').val(null).trigger('change');
    loadCity(id);
});

$('#regencies').on('select2:select', function (e) {
    var id = e.params.data.id;
    $('#districts').val(null).trigger('change');
    $('#villages').val(null).trigger('change');
    loaddistricts(id);
});

$('#districts').on('select2:select', function (e) {
    var id = e.params.data.id;
    $('#villages').val(null).trigger('change');
    loadvillages(id);
});

function loadProvince(){
    $("#provinces").select2({
        width: "style",
        ajax: {
          url: "/getdata",
          dataType: 'json',
          type:"POST",
          delay: 250,
          allowClear: true,
          data: function (params) {
            return {
              _token:CSRF_TOKEN,  
              q: params.term, // search term
              val:"provinces",
            };
          },
          processResults: function (data) {
            return {
              results: $.map(data, function (item) {
                return {
                    text: item.name,
                    id: item.id
                }
            })};
          },
          cache: true
        },
        placeholder: 'Search for province',
    });
}

function loadCity(id){
    $("#regencies").select2({
        width: "style",
        ajax: {
          url: "/getdata",
          dataType: 'json',
          type:"POST",
          delay: 250,
          allowClear: true,
          data: function (params) {
            return {
              _token:CSRF_TOKEN,  
              q: params.term, // search term
              id:id,
              parent:"provinces",
              val:"regencies",
            };
          },
          processResults: function (data) {
            return {
              results: $.map(data, function (item) {
                return {
                    text: item.name,
                    id: item.id
                }
            })};
          },
          cache: true
        },
        placeholder: 'Search for regencies',
    });
}

function loaddistricts(id){
    $("#districts").select2({
        placeholder: 'Search for districts',
        width: "style",
        ajax: {
          url: "/getdata",
          dataType: 'json',
          type:"POST",
          delay: 250,
          allowClear: true,
          data: function (params) {
            return {
              _token:CSRF_TOKEN,  
              q: params.term, // search term
              id:id,
              parent:"regencies",
              val:"districts",
            };
          },
          processResults: function (data) {
            return {
              results: $.map(data, function (item) {
                return {
                    text: item.name,
                    id: item.id
                }
            })};
          },
          cache: true
        },
       
    });
}

function loadvillages(id){
    $("#villages").select2({
        placeholder: 'Search for villages',
        width: "style",
        ajax: {
          url: "/getdata",
          dataType: 'json',
          type:"POST",
          delay: 250,
          allowClear: true,
          data: function (params) {
            return {
              _token:CSRF_TOKEN,  
              q: params.term, // search term
              id:id,
              parent:"districts",
              val:"villages",
            };
          },
          processResults: function (data) {
            return {
              results: $.map(data, function (item) {
                return {
                    text: item.name,
                    id: item.id
                }
            })};
          },
          cache: true
        },
        
    });
}

$("#btnsubmit").on("click",function() {
  if ($("#subsform").valid()) {
    var emailinput = $("#inputemail").val()
    $.ajax({
      type: "POST",
      url: "/subscribe",
      dataType:"JSON",
      contentType: "application/json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: emailinput,
      success: function(response){
        if (response==true) {
          $(".successmessage").html("Insert Successfully");
          $(".successmessage").css({ 'color': 'green', 'font-style:': 'italic' ,"display":"block"});
          $("#subsform").trigger("reset");
          setInterval(function(){
            $(".successmessage").hide("2000");
            $(".successmessage").html("");
          }, 3000);
          
        }
      }
    });
  }
});