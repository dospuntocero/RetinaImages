RetinaImages
============

Retina images for amazing responsiveness in silverstripe 3!

How to use it
=============

rename the folder: 'RetinaImages'

if you want to use CMS images you need to hardcode at least the width or the height (or both) of the image to be certain that the image produced will use the same space, or use css for each (not recomended in my experience).

example1:
=========
        <img width="70" src="$FacePhoto.CroppedImageResponsive(70,70).URL" alt="$Title"/>
  
  this line will produce 2 different images

        <img width="70" src="/assets/silversmith-samples/_resampled/croppedimage7070-file.png" alt="my responsive image"/>

  and

        <img width="70" src="/assets/silversmith-samples/_resampled/croppedimage140140-file.png" alt="my responsive image"/>

example2:
=========
 you can do also the following if you want to show totally different images 
 
        <% if IsRetina %>
         <img src="my url for retina image" alt="$Title"/>                  
        <% else %>
         <img src="my regular url here..." alt="$Title"/>                                    
        <% end_if %>
 
It also works for non CMS images
================================
Say you need to add a twitter icon for both retina and non retina screens, you can use something like this:

        <img width="13" height="12" src="mysite/images/Twitter-icon-header{$Retina}.png" alt="Our Twitter account">

where the $Retina part will render @2x if the screen supports retina images


Thanks to
---------
Master @UncleCheese - he helped me to tidy up my code :)



