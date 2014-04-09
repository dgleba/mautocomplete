(function()
    {
    var $ = jQuery;
	var table_name;
	var field_name;
	var site_URL = document.URL;
	var URL_broken = site_URL.split(".");
	var URL_split = URL_broken[0].split("/");
	var a = URL_split.indexOf("index") - 1;
	var app_name = URL_split[a];
	
	var proto = window.location.protocol;
	var host = window.location.host;
	var path = window.location.pathname;
	var site_action_URL = proto + "//" + host + path;
    
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
	      var VarSearch = "-table";
	      var SearchString = window.location.search.substring(1);
          var VariableArray = SearchString.split('&');
		  
          for (var i = 0; i < VariableArray.length; i++)
	      {
            var KeyValuePair = VariableArray[i].split('=');
            if (KeyValuePair[0] == VarSearch)
		    {
              window.table_name = KeyValuePair[1];
            }
          }
	      
          window.field_name = $(this).attr('name');
		  
          if (event.keyCode === $.ui.keyCode.TAB && $(this).data("ui-autocomplete").menu.active)
		  {
            event.preventDefault();
          }
        })
      
      .autocomplete({
      
          source: function(request, response) {
            $.getJSON(site_action_URL+"?-action=multipleautocompleteaction",
			{fname: window.field_name, tname: window.table_name, aname: app_name, term: extractLast(request.term)},
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