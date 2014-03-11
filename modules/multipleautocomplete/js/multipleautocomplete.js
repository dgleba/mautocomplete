(function(){
  var $ = jQuery;
  
  registerXatafaceDecorator(function(node){
  
    function split(val) {
      return val.split(/,\s*/);
    }
    
    function extractLast(term) {
      return split(term).pop();
    }
	
	$(".xf-multipleautocomplete").click(function(){
      var field_name = $(this).attr('name');
	  $.post( "modules/multipleautocomplete/actions/field_handler.php", { "name": field_name } );
    });
    
    $(".xf-multipleautocomplete")
    
    .bind("keydown", function(event) {
    
      if (event.keyCode === $.ui.keyCode.TAB &&
        $(this).data("ui-autocomplete").menu.active) {
        event.preventDefault();
      }
    })
    
    .autocomplete({
    
      source: function(request, response) {
	  
        $.getJSON("modules/multipleautocomplete/actions/action_multipleautocomplete.php", {
          term: extractLast(request.term)
        }, response);
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