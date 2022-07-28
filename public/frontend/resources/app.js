  // Loading Animation Start
  $(document).ready(function() {
      var loading = $(".loading");
      loading.delay(loading.attr("delay-hide")).slideUp();
  });
  // Loading Animation End

  //   Counter Star
  $('.counter').counterUp({
      delay: 10,
      time: 2000
  });
  $('.counter').addClass('animated fadeInDownBig');
  $('h3').addClass('animated fadeIn');
  //   Counter End

  // Check div Start
  $('.big').click(function() {
      $('.hli').toggleClass('hli');
      $(this).toggleClass('hli');
  });
  // Check div End

  //   Plus Minus Input start
  $(document).ready(function() {
      $('.minus').click(function() {
          var $input = $(this).parent().find('input');
          var count = parseInt($input.val()) - 1;
          count = count < 1 ? 1 : count;
          $input.val(count);
          $input.change();
          return false;
      });
      $('.plus').click(function() {
          var $input = $(this).parent().find('input');
          $input.val(parseInt($input.val()) + 1);
          $input.change();
          return false;
      });
  });
  //   Plus Minus Input end

  //   File Buton Start
  const realFileBtn = document.getElementById("real-file");
  const customBtn = document.getElementById("custom-button");
  const customTxt = document.getElementById("custom-text");

  customBtn.addEventListener("click", function() {
      realFileBtn.click();
  });

  realFileBtn.addEventListener("change", function() {
      if (!realFileBtn.value) {
        customTxt.innerHTML = "No file chosen, yet.";
      }
  });
  // File Button end
