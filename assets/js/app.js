

// AJAX form submit with fall back worked in.
$('form.ajax').on('submit', function(){
  var that = $(this),
      url = that.attr('action'),
      type = that.attr('method'),
      date = {};

  that.find('[name]').each(function(index,value){
      var that = $(this),
          name = that.attr('name'),
          value = that.val();

      data[name] = value;
  });

  $.ajax({
    url: url,
    type: type,
    data: data,
    success: function(response){
        console.log(response);
    }

  });

  return false;
});



// Delete done through AJAX with a prompt 
$('.delete_ajax').click('submit', function(){
  var that = $(this);

if(confirm( "are you sure you want to delete this entry?" ))
{
    id = that.attr("name");

    $.ajax({
    type:'POST',
    url:'',
    data:id,
    success: function(response){
    console.log(response);
    }
});   

  return false; 
}
  else
{
    event.preventDefault();
    return false
}

});











