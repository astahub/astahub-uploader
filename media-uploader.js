jQuery(function($){
    var frame,
        metaBox = $('#astahub-file-uploader'), // Your meta box id here
        uploadButton = metaBox.find('#upload-button'),
        uploadLabel = metaBox.find( '#upload-label'),
        uploadFileID = metaBox.find( '#upload-file-id' );

    // ADD FILE LINK
    uploadButton.on( 'click', function( event ){
        event.preventDefault();
    
        // If the media frame already exists, reopen it.
        if ( frame ) {
          frame.open();
          return;
        }

        // Create a new media frame
        frame = wp.media({
            title: 'Select or upload an image',
            button: {
                text: 'Use this image'
            },
            type: 'image',
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected in the media frame...
        frame.on( 'select', function() {      
          // Get media attachment details from the frame state
          var attachment = frame.state().get('selection').first().toJSON();

          // Send the attachment URL to our custom image input field.
          uploadLabel.html( attachment.filename );

          // Send the attachment id to our hidden input
          uploadFileID.val( attachment.id );
        });

        frame.open();
    });
});