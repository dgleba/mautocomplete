(function(){
  var $ = jQuery;
  
  registerXatafaceDecorator(function(node){
  
    function split(val) {
      return val.split(/,\s*/);
    }
    
    function extractLast(term) {
      return split(term).pop();
    }
    
    $(".xf-multipleautocompleteContactsTags")
    
    .bind("keydown", function(event) {
    
      if (event.keyCode === $.ui.keyCode.TAB &&
        $(this).data("ui-autocomplete").menu.active) {
        event.preventDefault();
      }
    })
    
    .autocomplete({
    
      source: function(request, response) {
	  
        $.getJSON("modules/multipleautocompleteContactsTags/actions/action_multipleautocompleteContactsTags.php", {
          term: extractLast(request.term)
        }, response);
      },
	  
      search: function() {
	  
        var term = extractLast(this.value);
	    
        if (term.length < 2) {
          return false;
        }
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