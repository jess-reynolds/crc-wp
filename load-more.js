console.log("wassup");

jQuery(function($) {
  var canBeLoaded = true;
  var bottomOffset = 3000;

  function showLoadingBox() {
    $(".boxes__wrap")
      .find(".boxes__box--container:last-of-type")
      .after(
        `<div class="boxes__box--container" id="loading-box"><em>Loading more posts...</em></div>`
      );
  }

  function hideLoadingBox() {
    $("#loading-box").remove();
  }

  $(window).scroll(function() {
    var data = {
      action: "loadmore",
      query: params.posts,
      page: params.current_page
    };

    if (
      $(document).scrollTop() > $(document).height() - bottomOffset &&
      canBeLoaded
    ) {
      console.log(params.posts);
      $.ajax({
        url: params.ajaxurl,
        data: data,
        type: "POST",
        beforeSend: function() {
          canBeLoaded = false;
          showLoadingBox();
        },
        success: function(data) {
          hideLoadingBox();
          if (data) {
            $(".boxes__wrap")
              .find(".boxes__box--container:last-of-type")
              .after(data);
            canBeLoaded = true;
            params.current_page++;
          }
        },
        error: hideLoadingBox
      });
    }
  });
});
