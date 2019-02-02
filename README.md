# No Thumbnails Gallery
#### Ever needed a lightbox gallery with no thumbnails? Here's your answer.

### Featherlight
This project requires Featherlight and Featherlight's gallery extension, an ultraslim jQuery lightbox.
[You can check out Featherlight here.](https://no-thumbnails-gallery.joebailey.xyz/)

## Demo
Try the [demo](https://joebailey26.github.io/no-thumbnails-gallery/demo/no-thumbnails-gallery.html) to see the gallery in action. Simply click on one image, and have a lightbox with multiple images come up.

## Install
1. Download and include gallery.php inside your folder with the set of images you want to display in a lightbox.

2. Include Featherlight's CSS files.
```html
<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css" type="text/css" rel="stylesheet"/>
<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.gallery.min.css" type="text/css" rel="stylesheet" />
```

3. Include jQuery and Featherlight scripts before the closing body tag.
```html
<script src="//code.jquery.com/jquery-latest.js"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.gallery.min.js"></script>
```

4. Create a HTML element to trigger the gallery. 
You can have as many as you want in one page, just make sure the class is the same.
You can place whatever HTML you like inside the A tag.
```html
<a id="FOLDER-CONTAINING-IMAGES" class="TRIGGER" href="javascript:void(0)">
  <img src="demo" alt="demo">
</a>
```

5. Place the following HTML at the bottom of the page, but before any scripts. This is where the images will be stored in the DOM without being visible. The images are only loaded after a user clicks on the gallery, so doesn't affect page load time.
```html
<div class="none" style="display:none" data-featherlight-gallery data-featherlight-filter="a"></div>
```

6. Include the following Javascript after the jQuery and Featherlight have been loaded. Make sure to change the values of the element selectors so they match your own.
```html
<script>
  $("TRIGGER-ELEMENT-CLASS").click(function(){
    var $images = '.none';
    var $folder1 = "PATH-TO-FOLDER-CONTAINING-IMAGES";
    var $folder2 = $folder1 + $(this).attr('id')
    var post = $.post($folder2 + "/Gallery.php", {images: $images} );
    post.done(function(data) {
      $($images).html(data);
    });
  });
</script>
```

If you get stuck check out how the demo loads images from the folder.
