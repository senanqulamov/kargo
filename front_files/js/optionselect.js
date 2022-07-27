


function checkboxDropdown(el) {
    var $el = $(el)
  
    function updateStatus(label, result) {
      if(!result.length) {
        label.html('Select Options');
      }
    };
    
    $el.each(function(i, element) {
      var $list = $(this).find('.dropdown-list'),
        $label = $(this).find('.dropdown-label'),
        $checkAll = $(this).find('.check-all'),
        $inputs = $(this).find('.check'),
        defaultChecked = $(this).find('input[type=checkbox]:checked'),
        result = [];
      
      updateStatus($label, result);
      if(defaultChecked.length) {
        defaultChecked.each(function () {
          result.push($(this).next().text());
          $label.html(result.join(", "));
        });
      }
      
      $label.on('click', ()=> {
        $(this).toggleClass('open');
      });
  
      $checkAll.on('change', function() {
        var checked = $(this).is(':checked');
        var checkedText = $(this).next().text();
        result = [];
        if(checked) {
          result.push(checkedText);
          $label.html(result);
          $inputs.prop('checked', false);
        }else{
          $label.html(result);
        }
          updateStatus($label, result);
      });
  
      $inputs.on('change', function() {
        var checked = $(this).is(':checked');
        var checkedText = $(this).next().text();
        if($checkAll.is(':checked')) {
          result = [];
        }
        if(checked) {
          result.push(checkedText);
          $label.html(result.join(", "));
          $checkAll.prop('checked', false);
        }else{
          let index = result.indexOf(checkedText);
          if (index >= 0) {
            result.splice(index, 1);
          }
          $label.html(result.join(", "));
        }
        updateStatus($label, result);
      });
  
      $(document).on('click touchstart', e => {
        if(!$(e.target).closest($(this)).length) {
          $(this).removeClass('open');
        }
      });
    });
  };
  
  checkboxDropdown('.dropdown');



