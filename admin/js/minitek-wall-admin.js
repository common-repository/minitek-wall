(function ($) {
  "use strict";

  /**
   * This enables you to define handlers, for when the DOM is ready:
   */

  $(function () {
    /**
     * Fix active dashboard menu item
     */
    if (
      document.getElementById("menu-posts-mwall").querySelectorAll(".current")
        .length == 0
    ) {
      $("#menu-posts-mwall").find(".wp-first-item").addClass("current");
    }

    /**
     * Toggle visibility of items type
     */
    var items_type = $('select[name="wall-post-type"]').val();

    if (items_type == "post") {
      $("#mwall-admin-metabox-data-source-posts").removeClass("hidden");
    } else if (items_type == "attachment") {
      $("#mwall-admin-metabox-data-source-media").removeClass("hidden");
    } else if (items_type == "page") {
      $("#mwall-admin-metabox-data-source-pages").removeClass("hidden");
    } else if (items_type == "specific") {
      $("#mwall-admin-metabox-data-source-specific").removeClass("hidden");
      $("#mwall-admin-metabox-data-source-authors").addClass("hidden");
      $("#mwall-admin-metabox-field-exclude").addClass("hidden");
      $("#mwall-admin-metabox-field-offset").addClass("hidden");
      $("#mwall-admin-metabox-field-keywords").addClass("hidden");
    }

    $('select[name="wall-post-type"]').change(function () {
      var items_type = $(this).val();

      if (items_type == "post") {
        $("#mwall-admin-metabox-data-source-posts").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-media").addClass("hidden");
        $("#mwall-admin-metabox-data-source-pages").addClass("hidden");
        $("#mwall-admin-metabox-data-source-specific").addClass("hidden");
        $("#mwall-admin-metabox-data-source-authors").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-dates").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-general").removeClass("hidden");
        $("#mwall-admin-metabox-field-exclude").removeClass("hidden");
        $("#mwall-admin-metabox-field-offset").removeClass("hidden");
        $("#mwall-admin-metabox-field-keywords").removeClass("hidden");
      } else if (items_type == "attachment") {
        $("#mwall-admin-metabox-data-source-posts").addClass("hidden");
        $("#mwall-admin-metabox-data-source-media").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-pages").addClass("hidden");
        $("#mwall-admin-metabox-data-source-specific").addClass("hidden");
        $("#mwall-admin-metabox-data-source-authors").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-dates").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-general").removeClass("hidden");
        $("#mwall-admin-metabox-field-exclude").removeClass("hidden");
        $("#mwall-admin-metabox-field-offset").removeClass("hidden");
        $("#mwall-admin-metabox-field-keywords").removeClass("hidden");
      } else if (items_type == "page") {
        $("#mwall-admin-metabox-data-source-posts").addClass("hidden");
        $("#mwall-admin-metabox-data-source-media").addClass("hidden");
        $("#mwall-admin-metabox-data-source-pages").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-specific").addClass("hidden");
        $("#mwall-admin-metabox-data-source-authors").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-dates").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-general").removeClass("hidden");
        $("#mwall-admin-metabox-field-exclude").removeClass("hidden");
        $("#mwall-admin-metabox-field-offset").removeClass("hidden");
        $("#mwall-admin-metabox-field-keywords").removeClass("hidden");
      } else if (items_type == "specific") {
        $("#mwall-admin-metabox-data-source-posts").addClass("hidden");
        $("#mwall-admin-metabox-data-source-media").addClass("hidden");
        $("#mwall-admin-metabox-data-source-pages").addClass("hidden");
        $("#mwall-admin-metabox-data-source-specific").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-authors").addClass("hidden");
        $("#mwall-admin-metabox-data-source-dates").removeClass("hidden");
        $("#mwall-admin-metabox-data-source-general").removeClass("hidden");
        $("#mwall-admin-metabox-field-exclude").addClass("hidden");
        $("#mwall-admin-metabox-field-offset").addClass("hidden");
        $("#mwall-admin-metabox-field-keywords").addClass("hidden");
      }
    });

    /**
     * Custom radios
     */
    function selectCustomRadio() {
      $(".custom-radio-input:checked")
        .parents(".custom-radio")
        .addClass("active");

      $(".custom-radio-input").change(function () {
        $(this)
          .parents(".form-table")
          .find(".custom-radio")
          .removeClass("active");
        var checked = $(this).attr("checked", true);

        if (checked) {
          $(this).parents(".custom-radio").addClass("active");
        }
      });
    }

    selectCustomRadio();
  });
})(jQuery);
