$(document).ready(function(){
  // DataTable jquery plugin
  //var table = $('#table').DataTable({"stateSave": true});
  var table = $('#table').DataTable();
  $('#table.search tfoot th').each(function(){var title = $('#table.search thead th').eq($(this).index()).text();$(this).html('<input type="text" placeholder="'+title+'" />');});

  // Apply the search
  if(table.columns().eq(0)){table.columns().each(function(colIdx){$('input', table.column(colIdx).footer()).on('keyup change', function(){table.column(colIdx).search(this.value).draw();});});}

  // Autocheck checkbox if value = 1
  $('input[type="checkbox"].status').each(function(){ ($(this).val() == 1) ? $(this).prop('checked', true) : $(this).prop('checked', false); });
  // Autocheck checkbox if value = true
  $('input[type="checkbox"][name="quotalimit[per_session]"]').each(function(){ ($(this).val() == 'true') ? $(this).prop('checked', true) : $(this).prop('checked', false); });

  // Colored nav menu
  $('nav#menu').children('menu').children('li').each(function(){
    if ($(this).children('a').attr('href') == location.pathname){
      $(this).toggleClass('active');
    }
  });

  // Group functions
  $(document).on('click','button.addMember', function(event){
    var el = $('select#users'),
     els = $('select#users option:selected'),
     id = $('select#members').data('id');
     els.each(function(){
      var user = $(this),
        username = user.val();
      $.ajax({
       url: '/groups/addMember/',
       data: "groupid="+id+"&member="+username,
       type: 'post',
       success: function(){
        user.remove().appendTo($('select#members'));
       }
      });
    });
  });

  $(document).on('click','button.removeMember', function(event){
    var el = $('select#members'), 
     els = $('select#members option:selected'),
     id = el.data('id');
     els.each(function(){
      var user = $(this),
        username = user.val();
      $.ajax({
       url: '/groups/removeMember/',
       data: "groupid="+id+"&member="+username,
       type: 'post',
       success: function(){
        user.remove().appendTo($('select#users'));
       }
      });
    });
  });

  // Change status checkbox functions
  $(document).on('change',"input[type=checkbox].status", function(event){
    var el = $(this),
    id = el.data('id'),
    type = el.data('type');
    if (type == undefined) return;
    if(el.is(':checked')){
      el.attr('value',1);
    }else{
      el.attr('value',0);
    }
    $.ajax({
     url: '/'+type+'s/changeStatus/',
     data: type+"id="+id,
     type: 'post',
     success: function(){
     }
    });
  });

  $(document).on('change','input[type="checkbox"][name="quotalimit[per_session]"]', function(event){
    var el = $(this);
    if(el.is(':checked')){
        el.attr('value','true');
    }else{
        el.attr('value','false');
    }
  });

  $(document).on('click','button#show', function(event){
    $('p.form').toggleClass('hide');
  });

// Delete function
  $(document).on('click','button.delete', function(event){
   if(confirm('Are you shure?')){
    var el = $(this),
     id = el.data('id'),
     type = el.data('type'),
     result = type + " #" + id + " has been removed.";
     if (type == 'quotatally') {
      link = '/quotatallies/delete/';
     } else {
      link = '/'+type+'s/delete/';
     }

    $.ajax({
     url: link,
     data: type+"id="+id,
     type: 'post',
     success: function(){
      alert(result);
      el.parent().parent().parent().remove();
     }
    });
   };
  });

// Save function
  $(document).on('click','button.save', function(event){
    var table = $('#table'),
     el = $(this),
     id = el.data('id'),
     type = el.data('type'),
     form = $(this).parent().parent().parent(),
     send = type+'['+type+'id]='+id+'&',
     p = form.parent().parent();
     form.children().find('input').each(function(){
        send += $(this).prop('name')+'='+$(this).val()+'&';
    });

    $.ajax({
     url: '/'+type+'s/update/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(data){
      p.prepend('<b>'+type+' data updated!</b>');
     }
    });
  });

// Create function
  $(document).on('click','button.create', function(event){
    var table = $('#table'),
     form = $(this).parent(),
     el = $(this),
     type = el.data('type'),
     send = '';

    form.children('input').each(function(){
      send += $(this).prop('name')+'='+$(this).val()+'&';
    });

    form.children('select').each(function(){
      $(this).children('option:selected').each(function(){
        send += $(this).parent().prop('name')+'='+$(this).val()+'&';
      });
    });

    $.ajax({
     url: '/'+type+'s/create/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(data){
       if (data != false) {
        location.reload();
       } else {
        alert('Error in '+type+' create!');
       }
     }
    });
  });

});
