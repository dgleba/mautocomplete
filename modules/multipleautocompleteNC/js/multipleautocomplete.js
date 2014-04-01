(function()
    {
    var $ = jQuery;
	var site_path = working_dir;
    
    registerXatafaceDecorator(function(node)
	  {
       
      function split(val)
	  {
        return val.split(/,\s*/);
      }
      
      function extractLast(term)
	  {
        return split(term).pop();
      }
      
      $(".xf-multipleautocomplete")
      
        .bind("keydown", function(event)
		{		
	      var table_name;
	      var VarSearch = "-table";
	      var SearchString = window.location.search.substring(1);
          var VariableArray = SearchString.split('&');
		  
          for (var i = 0; i < VariableArray.length; i++)
	      {
            var KeyValuePair = VariableArray[i].split('=');
            if (KeyValuePair[0] == VarSearch)
		    {
              table_name = KeyValuePair[1];
            }
          }
	      
          var field_name = $(this).attr('name');
		  $.post( site_path+"/multipleautocompleteField_handler.php", { "fname": field_name, "tname": table_name } );
        
          if (event.keyCode === $.ui.keyCode.TAB && $(this).data("ui-autocomplete").menu.active)
		  {
            event.preventDefault();
          }
        })
      
      .autocomplete({
      
          source: function(request, response) {
            $.getJSON(site_path+"/action_multipleautocomplete.php",  //original, works.
            //$.getJSON(site_path+"/hellonoclass.php", //working, calls the hello action directly
            //$.getJSON("http://localhost/mautocomplete-module/index.php?-action=hello", //calling the URL directly, does not work.
            //$.getJSON(DATAFACE_SITE_HREF+"?-action=hello", //trying it Steve's way, doesn't work.
			{term: extractLast(request.term)},
			response);
          },
	      
          focus: function() {
            return false;
          },
	      
          select: function(event, ui) {
            var terms = split(this.value);
            terms.pop();
            terms.push(ui.item.value);
            terms.push("");
            this.value = terms.join(", ");
            return false;
          }
      });
    });
})();