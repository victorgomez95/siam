$("#state").change(function(event){
  $.get("towns/"+event.target.value+"",function(response,state){
      $("#town").empty();
      for (var i = 0; i < response.length; i++) {
        $("#town").append("<option value='"+response[i].CVE_MUN+"'>"+response[i].NOM_MUN+"</option>");
      }
  });
});

$("#town").change(function(event){
  $.get("towns/"+$('select[id=state]').val()+"/localities/"+event.target.value+"",function(response,state){
      $("#locality").empty();
      for (var i = 0; i < response.length; i++) {
        $("#locality").append("<option value='"+response[i].id+"'>"+response[i].NOM_LOC+"</option>");
      }
  });
});
