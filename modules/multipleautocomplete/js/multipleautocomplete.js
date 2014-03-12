(function()
    {
    var $ = jQuery;
    
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
	      $.post( "modules/multipleautocomplete/actions/multipleautocompleteField_handler.php", { "fname": field_name, "tname": table_name } );
        
          if (event.keyCode === $.ui.keyCode.TAB && $(this).data("ui-autocomplete").menu.active)
		  {
            event.preventDefault();
          }
        })
      
      .autocomplete({
      
          source: function(request, response) {
            $.getJSON("modules/multipleautocomplete/actions/action_multipleautocomplete.php",
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