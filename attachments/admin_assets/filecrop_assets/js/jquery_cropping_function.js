$(document).ready(function(){
              $('.image-editor').cropit({
                imageState: {
                  src: 'http://lorempixel.com/1500/2400/',
                },
              });
              
              $('.rotate-cw').click(function() {
                $('.image-editor').cropit('rotateCW');
              });
              
              $('.rotate-ccw').click(function() {
                $('.image-editor').cropit('rotateCCW');
              });
              
              $('.export').click(function() {
                var imagedata = $('.image-editor').cropit('export');
				//window.open(imagedata);
                $('#image_show').html(imagedata);
                $('#base64Img').submit();
              });
              
              $('#image-input-browse-button').click(function() {
                $('.cropit-image-input').trigger("click");
              });
              
            });