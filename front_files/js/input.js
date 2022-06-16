$(function(){  
    $('input').change(function(){
      var label = $(this).parent().find('span'); 
      if(typeof(this.files) !='undefined'){ // fucking IE      
        if(this.files.length == 0){
          label.removeClass('withFile').text(label.data('default'));
        }
        else{
          var file = this.files[0]; 
          var name = file.name;
          var size = (file.size / 1048576).toFixed(3); //size in mb 
          label.addClass('withFile').text(name + ' (' + size + 'mb)');
        }
      }
      else{
        var name = this.value.split("\\");
            label.addClass('withFile').text(name[name.length-1]);
      }
      return false;
    });  
  });