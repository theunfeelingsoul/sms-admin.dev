$(function(){

  // Get lables
  $.post( "ajaxlabel.php?l=l", function( data ) {
    var labelArray = data.split(',');
    console.log(labelArray);
    var sampleTags = labelArray;

    //-------------------------------
          // Single field
          //-------------------------------
          $('#singleFieldTags').tagit({
              availableTags: sampleTags,
              // This will make Tag-it submit a single form value, as a comma-delimited field.
              singleField: true,
              singleFieldNode: $('#mySingleField'),
              removeConfirmation: true,
      allowSpaces: true
          }); // end $().tagit

  }); // end post
}); // end dunction