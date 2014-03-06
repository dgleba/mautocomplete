$(document).ready(function() {
document.write("<h1>This is a heading</h1>");

  function split(val) {
    return val.split(/,\s*/);
  }
  
  function extractLast(term) {
    return split(term).pop();
  }
  
  $("#tags")
  
  .bind("keydown", function(event) {
  
    if (event.keyCode === $.ui.keyCode.TAB &&
      $(this).data("ui-autocomplete").menu.active) {
      event.preventDefault();
    }
  })
  
  .autocomplete({
  
    source: function(request, response) {
	
      $.getJSON("actions/tags.php", {
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
})(jQuery);