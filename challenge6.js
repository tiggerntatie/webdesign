/* Javascript for challenge 6 */

Challenge6 = function() {

  this.storyID = null;

  /*  addWordbyID transfers an element value to a span innerHTML
      The arguments are: 
        the id of the source form element
        the id of the destination span 
  */
  this.addWordbyID = function(form_field_id, span_id) {
    var source_field = document.getElementById(form_field_id);
    var destination_span = document.getElementById(span_id);
    destination_span.innerHTML = source_field.value;
  }

  /*  addRadioButtonbyName transfers a radio button value to a span innerHTML
      The arguments are: 
        the name of the source form radio button elements
        the id of the destination span 
  */
  this.addRadioButtonbyName = function(radio_button_name, span_id) {
    var value = "";
    /* this will retrieve a list of radio button elements with the given name */
    source_field = document.getElementsByName(radio_button_name);  
    for( i = 0; i < source_field.length; i++) {
      /* look for the one button that is checked */
      if(source_field.item(i).checked) {
        value = source_field.item(i).value;
        break;
      }
    }
    var destination_span = document.getElementById(span_id);
    destination_span.innerHTML = value;
  }
  
  /*  addCheckBoxbyName transfers a list of checkbox values to a span innerHTML
      The arguments are: 
        the name of the source form check box elements
        the id of the destination span 
  */
  this.addCheckBoxbyName = function(check_box_name, span_id) {
    var value = "";
    /* this will retrieve a list of checkbox elements with the given name */
    source_field = document.getElementsByName(check_box_name);  
    /* look at each of them to find ones that are checked */
    for( i = 0; i < source_field.length; i++) {
      if(source_field.item(i).checked) {
        if (value.length > 0) {
          /* we've already found at least one, so we're making a list of them */
          value += " and ";
        }
        /* append this value to whatever we already have */
        value += source_field.item(i).value;
      }
    }
    var destination_span = document.getElementById(span_id);
    destination_span.innerHTML = value;
  }
  

  /* transferWords moves the form content to the following paragraph, field by field */
  this.transferWords = function(story_id) {
    this.addWordbyID("first-name", "first-name-dest");
    this.addWordbyID("birthplace", "birthplace-dest");
    this.addWordbyID("birth-month", "birth-month-dest");
    this.addRadioButtonbyName("birth-decade", "birth-decade-dest");
    this.addWordbyID("secret", "secret-dest");
    this.addCheckBoxbyName("leaning", "leaning-dest");
    this.addWordbyID("world-view", "world-view-dest");
    /* display the story */
    this.storyID = story_id;
    document.getElementById(this.storyID).style.display = "block";
  }
  
  /* hideStory returns the story text to a hidden state */
  this.hideStory = function() {
    document.getElementById(this.storyID).style.display = "none";
  }
}

challenge6 = new Challenge6();
