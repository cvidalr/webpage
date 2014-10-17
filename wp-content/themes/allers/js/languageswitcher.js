$(document).ready(function() {

	// --- language dropdown --- //

	// turn select into dl
	createDropDown();
	
	var $dropTrigger = $(".dropdown dt a");
	var $languageList = $(".dropdown dd ul");
	
	// open and close list when button is clicked
	$dropTrigger.toggle(function() {
		$languageList.slideDown(200);
		$dropTrigger.addClass("active");
	}, function() {
		$languageList.slideUp(200);
		$(this).removeAttr("class");
	});

	// close list when anywhere else on the screen is clicked
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("dropdown"))
			$languageList.slideUp(200);
			$dropTrigger.removeAttr("class");
	});

	// when a language is clicked, make the selection and then hide the list
	$(".dropdown dd ul li a").click(function() {
		var clickedValue = $(this).parent().attr("class");
		var clickedTitle = $(this).find("em").html();
		$("#target dt").removeClass().addClass(clickedValue);
		$("#target dt em").html(clickedTitle);
		$languageList.hide();
		$dropTrigger.removeAttr("class");
	});
});

	// actual function to transform select to definition list
	function createDropDown(){
		var $form = $("div#country-select form");
		$form.hide();
		var source = $("#qtrans_select_qtranslate-2-chooser");
		source.removeAttr("autocomplete");
		var selected = source.find("option:selected");
		var options = $("option", source);
		$("#country-select").append('<dl id="target" class="dropdown"></dl>')
		
		if(selected.text()=="English")
		var lan="en"

		if(selected.text()=="Español")
		var lan="es"

//		$("#target").append('<dt class="' + selected.attr('id') + '"><a href="#"><span class="flag"></span><em>' + selected.text() + '</em></a></dt>')
                $("#target").append('<dt class="' + lan + '"><a href="#"><span class="flag"></span><em>' + selected.text() + '</em></a></dt>')		
		$("#target").append('<dd><ul></ul></dd>')
		options.each(function(){
			if($(this).text()=="English")
			var lan2="en"

			if($(this).text()=="Español")
			var lan2="es"

//			$("#target dd ul").append('<li class="' + $(this).attr("id") + '"><a href="' + $(this).val() + '"><span class="flag"></span><em>' + $(this).text() + '</em></a></li>');
			$("#target dd ul").append('<li class="' + lan2 + '"><a href="' + $(this).val() + '"><span class="flag"></span><em>' + $(this).text() + '</em></a></li>');
			});
//		alert (selected.attr('id'));
//		alert (selected.text());
	}
