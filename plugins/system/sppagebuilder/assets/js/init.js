jQuery(document).ready(function ($) {
	if (spPagebuilderEnabled) {
		$(spIntergationElement).hide();
		$(".builder-integration-component").show();
		$(".builder-integration-button-editor").addClass("is-active");
	} else {
		$(".builder-integration-component").hide();
		$(spIntergationElement).show();
		$(".builder-integration-button-joomla").addClass("is-active");
	}

	$("[action-switch-builder]").on("click", function (event) {
		event.preventDefault();

		$("[action-switch-builder]").removeClass("is-active");
		$(this).addClass("is-active");

		var action = $(this).data("action");

		// get shared parent container
		var $container = $(this).parent(".sp-pagebuilder-btn-group").parent();

		if (action === "editor") {
			$(".builder-integration-component").hide();
			$(spIntergationElement).show();
			$("#jform_attribs_sppagebuilder_active").val("0");

			if (typeof WFEditor !== "undefined") {
				$(".wf-editor", $container).each(function () {
					var value = this.nodeName === "TEXTAREA" ? this.value : this.innerHTML;

					// pass content from textarea to editor
					Joomla.editors.instances[this.id].setValue(value);

					// show editor and tabs
					$(this).parent(".wf-editor-container").show();
				});
			}
		} else {
			if (typeof WFEditor !== "undefined") {
				$(".wf-editor", $container).each(function () {
					// pass content to textarea
					Joomla.editors.instances[this.id].getValue();

					// hide editor and tabs
					$(this).parent(".wf-editor-container").hide();
				});
			}

			$(spIntergationElement).hide();
			$(".builder-integration-component").show();
			$("#jform_attribs_sppagebuilder_active").val("1");
		}
	});
});
