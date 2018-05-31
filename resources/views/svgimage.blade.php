<!DOCTYPE html>
<html manifest="myCache.appcache">

<head>
    <link rel="stylesheet" href="style.css" />
    <title>SVG Retina Image Demo</title>
    <style>
    body {
    	position: relative;
        padding: 0;
        margin: 0;
        color: #DDDDDD;
        font-family: arial, sans-serif;
        min-width: 550px;
        background: #B89F81;
    }

    #header {
        position: relative;
        margin-bottom: 30px;
        width: 98%;
        padding: 16px 1% 30px 1%;
        background: rgba(0,0,0,0.8);
        box-shadow: 0 2px 3px rgba(0,0,0,0.65);
    }

    #header .image-wrapper {
        float: left;
        margin-right: 10px;
    }

    #header h1 {
        margin-right: 10%;
        text-align: center;
        font-size: 28px;
        margin-bottom: 10px;
    }

    #header a,
    #header a:link,
    #header a:visited {
        float: right;
        color: #DDDDDD;
        text-decoration: none;
        margin-right: 20px;
    }

    #header a:hover {
        text-decoration: underline;
    }

    .content {
        position: relative;
        margin-bottom: 30px;
        width: 94%;
        padding: 1%;
        margin-left: 2%;
        border-radius: 5px;
        background: rgba(0,0,0,0.8);
    }

    .content h2 {
        margin-left: 10px;
        font-size: 24px;
        line-height: 32px;
    }

    .content a,
    .content a:link,
    .content a:visited {
        font-weight: bold;
        display: inline-block;
        color: #DDDDDD;
    }

    .content p {
        padding: 20px;
        padding-top: 0;
        line-height: 28px;
    }

    .content li {
        padding-bottom: 16px;
        padding-right: 16px;
    }

    .content blockquote {
        padding: 20px;
        background: #FFFFBF;
        color: #333333;
        border-radius: 3px;
        overflow: auto;
    }

    .content blockquote span {
        background: #BFFFBF;
        color: #003300;
    }
    .content pre {
        white-space: pre-wrap;
    }

    #promo {
        min-height: 190px;
    }

    #promo .image-wrapper {
        position: relative;
        float: left;
        margin: 20px 40px 20px 20px;
    }

    #discuss {
        position: relative;
        width: 300px;
        padding: 0;
    }

    #discuss a,
    #discuss a:link,
    #discuss a:visited {
        padding: 20px 0;
        width: 100%;
        text-align: center;
    }
    </style>
</head>

<body>

<div style="z-index:10;position:relative;">

<div id="header">
    <div class="image-wrapper" style="width:149px;height:74px">
        <object type="image/svg+xml" width="100%" height="100%" data="/images/svg-image/images.svg#logo">
            <!--<img src="/images/svg-image/logo-1x.png" width="100%" height="100%" />-->
        </object>
    </div>

    <h1>SVG Retina Images - It Doesn't Get Any Easier</h1>

    <a href="http://thepenzone.com/about">by Tom Penzer</a>
</div>

<div id="promo" class="content">
    <div class="image-wrapper" style="width:200px;height:150px">
        <object type="image/svg+xml" width="100%" height="100%" data="/images/svg-image/images.svg#promo">
            <!--<img src="/images/svg-image/promo-1x.png" width="100%" height="100%" />-->
        </object>
    </div>

    <h2>Stop dreading Retina image support</h2>

    <ul>
        <li>Leverage SVG (with some JS baked in) to handle your standard format (png, jpg) Retina raster images</li>
        <li>Isolate the complexity of serving Retina images from your CSS and HTML</li>
        <li>Avoid multiple image requests and save bandwidth, speed up page rendering</li>
        <li>Follow intuitive file naming conventions and stop making busy work for yourself</li>
    </ul>
</div>

<div id="works" class="content">
    <p>This method was inpired by Estelle Weyl's
    <a href="https://github.com/estelle/clowncar">Clown Car Technique for Responsive Images</a>, though it uses
    Javascript instead of CSS media queries and allows for multiple images to be conveniently referenced in a single
    SVG. I was also inspired by @simurai and Erik Dahlstrom's work on
    <a href="http://simurai.com/post/20251013889/svg-stacks">SVG stacks</a>.</p>

    <h2>How it works:</h2>

    <p>For this method, we make an 'images.svg' file containing named references to each of the site's images,
    as well as a viewBox setting describing their dimensions. For the purpose of this example, the images must be in
    the same directory as the images.svg file, and the filenames must match these image reference names, plus
    '-1x.png' and '-2x.png', or '-1x.jpg' and '-2x.jpg' for the regular and double-resolution versions. Here's what
    the svg looks like:</p>

    <blockquote>
        <pre><code>&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot;?&gt;
&lt;svg version=&quot;1.1&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;
  xmlns:xlink=&quot;http://www.w3.org/1999/xlink&quot; onload=&quot;generateImage()&quot;&gt;
  &lt;title&gt;SVG Retina Image Demo&lt;/title&gt;
  &lt;desc&gt;
    By @tpenzer - http://thepenzone.com/svg-image/
  &lt;/desc&gt;
  &lt;script type=&quot;application/ecmascript&quot;&gt; &lt;![CDATA[
    function generateImage() {
      // parse the requested image ID from the location hash, get its container element
      var image_id = location.href.substring(location.href.indexOf('#') + 1);
      var container = document.getElementById(image_id);

      // for Retina displays, set 2x filename resolution key, else 1x
      if (window.devicePixelRatio &gt; 1) {
        var filename_res_key = <span>&quot;-2x&quot;</span>
      } else {
        var filename_res_key = <span>&quot;-1x&quot;</span>
      };

      // if image container has a class set, and has class 'jpg', make it use a .jpg filename extension, else .png
      if ((container.getAttributeNS(null, 'class')) && container.getAttributeNS(null, 'class').indexOf('jpg') != &quot;-1&quot;) {
        var filename_ext = &quot;.jpg&quot;
      } else {
        var filename_ext = &quot;.png&quot;
      };

      // split the viewBox string at every space, yielding an array of x, y, width and height values
      var view_box = container.getAttributeNS(null, 'viewBox').split(/s+/g);

      // create a new image element and set its attributes
      var image = document.createElementNS('http://www.w3.org/2000/svg', 'image');
      image.setAttributeNS(null, &quot;x&quot;, view_box[0]);
      image.setAttributeNS(null, &quot;y&quot;, view_box[1]);
      image.setAttributeNS(null, &quot;width&quot;, view_box[2]);
      image.setAttributeNS(null, &quot;height&quot;, view_box[3]);
      image.setAttributeNS('http://www.w3.org/1999/xlink', &quot;href&quot;, image_id + filename_res_key + filename_ext);

      //add the new image element to the container svg
      container.appendChild(image);
      }
  ]]&gt; &lt;/script&gt;
  <span>&lt;svg id=&quot;logo&quot; viewBox=&quot;0 0 149 74&quot;&gt;&lt;/svg&gt;</span>
  <span>&lt;svg id=&quot;promo&quot; viewBox=&quot;0 0 200 150&quot;&gt;&lt;/svg&gt;</span>
  <span>&lt;svg id=&quot;bkg&quot; class=&quot;jpg&quot; viewBox=&quot;0 0 960 720&quot;&gt;&lt;/svg&gt;</span>
&lt;/svg&gt;</code></pre>
    </blockquote>

    <p>There are three image references in the SVG, "logo", "promo", and "bkg", including viewBox values describing
    their dimensions, highlighted in green at the bottom. Note that "bkg" is a JPEG, and so it has an additional "jpg"
    class (png is the default, and doesn't need to be specified). The viewBox should be set to "0 0 width height", with
    the width and height pixel values for the 1x version of the image. There are images with filenames "logo-1x.png",
    "logo-2x.png", "promo-1x.png", "promo-2x.png", "bkg-1x.jpg" and "bkg-2x.jpg" in the same directory as the
    "images.svg" file. The javascript code will use the ID names, class name (.jpg images have class 'jpg'), filename
    keys (i.e. "-1x" and "-2x") and viewBox setting to create SVG image elements upon loading, generating a path to
    the correct .png or .jpg image based on these names combined with the detected pixel ratio. The parts highlighted
    in green are the only bits that should need modification for various uses. These images can then be rendered as
    such:</p>

    <blockquote>
        <pre><code>&lt;div id=&quot;bkg&quot; style=&quot;position:fixed;top:-50%;left:-50%;width:100%;height:100%&quot;&gt;
  &lt;object type=&quot;image/svg+xml&quot; width=&quot;200%&quot; height=&quot;200%&quot; data=&quot;images/images.svg#bkg&quot;&gt;
    &lt;!--&lt;img src=&quot;images/bkg-1x.jpg&quot; width=&quot;200%&quot; height=&quot;200%&quot; /&gt;--&gt;
  &lt;/object&gt;
&lt;/div&gt;

&lt;div class=&quot;image-wrapper&quot; style=&quot;width:149px;height:74px&quot;&gt;
    &lt;object type=&quot;image/svg+xml&quot; width=&quot;100%&quot; height=&quot;100%&quot; data=&quot;images/images.svg#logo&quot;&gt;
        &lt;!--&lt;img src=&quot;images/logo-1x.png&quot; width=&quot;100%&quot; height=&quot;100%&quot; /&gt;--&gt;
    &lt;/object&gt;
&lt;/div&gt;

&lt;div class=&quot;image-wrapper&quot; style=&quot;width:200px;height:150px&quot;&gt;
    &lt;object type=&quot;image/svg+xml&quot; width=&quot;100%&quot; height=&quot;100%&quot; data=&quot;images/images.svg#promo&quot;&gt;
        &lt;!--&lt;img src=&quot;images/promo-1x.png&quot; width=&quot;100%&quot; height=&quot;100%&quot; /&gt;--&gt;
    &lt;/object&gt;
&lt;/div&gt;
</code></pre>
    </blockquote>

    <h2>What's going on here?</h2>

    <p>SVG 'image' elements with references to the appropriate resolution png images are generated upon loading the svg
    image, so that only a single request is made for the desired image resource. In order to avoid various rendering
    issues, it's best to wrap the 'object' element in a 'div' with the dimensions of the image, and set the object to
    100% width and height. The inline styling for the background '#bkg' image is a total hack to compensate for the
    inability to specify an SVG fragment ID like 'images.svg#bkg' for a CSS background-image; it's included for
    demonstration purposes only, and should probably not be used in production. Safari 7 and Safari for iOS 7 in
	particular are unamused by these shenanigans.</p>

	<p>I included commented-out "img" elements inside the "object" elements
	to show how you would extend support to older browsers in exchange for an additional image request to your server.
	The browser will send multiple requests for the "images.svg" file, which is tiny, but still wastes resources. You
	can make browsers cache this file to minimize requests by adding a "manifest" attribute to your page's html element,
	as such:</p>

    <blockquote>
        <pre><code>&lt;html manifest=&quot;myCache.appcache&quot;&gt;</code></pre>
    </blockquote>

    <p>Then, you can add a file to the site directory, in this example named "myCache.appcache", with the following
    contents:</p>

    <blockquote>
        <pre><code>CACHE MANIFEST
/path/to/images.svg

NETWORK:
*</code></pre>
    </blockquote>

    <p>This will force browsers to cache the svg file locally, and request it from their local cache rather than
    your server. Note that this will cause Firefox to prompt users on whether they'd like your site to be able to
    store data on their computer.</p>

</div>

<div id="problems" class="content">
    <h2>So what are the pitfalls?</h2>

    <ul>
        <li>Image filenames must conform to strict templates, and they must share the same format</li>
        <li>This approach won't work at all if the user has Javascript disabled</li>
        <li>Browser compatibility seems wide, but there are likely to be some issues I haven't discovered</li>
    </ul>

    <p>Note that you can easily remove the javascript requirement if you don't mind your Retina users making two image
    requests, by including image elements referencing their respective 1x assets in the images.svg file by default,
    using a bit of CSS to hide all but the :target image container, and then modifying their href attributes for
    Retina users with javascript, like so:</p>

    <blockquote>
        <pre><code>&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot;?&gt;
&lt;svg id=&quot;images&quot; class=&quot;image&quot; version=&quot;1.1&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;
  xmlns:xlink=&quot;http://www.w3.org/1999/xlink&quot; onload=&quot;setImageHiRes()&quot;&gt;
  &lt;title&gt;SVG Retina Image Demo&lt;/title&gt;
  &lt;desc&gt;
    By @tpenzer - http://thepenzone.com/svg-image/
  &lt;/desc&gt;
  &lt;style&gt;
    svg .image { display: none }
    svg .image:target { display: inherit }
  &lt;/style&gt;
  &lt;script type=&quot;application/ecmascript&quot;&gt; &lt;![CDATA[
    function setImageHiRes() {
      if (window.devicePixelRatio &gt; 1) {
        // parse the requested image ID from the location hash, get its image element
        var image_id = location.href.substring(location.href.indexOf('#') + 1);
        var container = document.getElementById(image_id);
        var image = container.getElementsByTagNameNS('http://www.w3.org/2000/svg', 'image')[0];

        // if image container has a class of 'jpg', make it use a .jpg filename extension, else .png
        if (container.getAttributeNS(null, 'class').indexOf('jpg') != &quot;-1&quot;) {
          var filename_ext = &quot;.jpg&quot;
        } else {
          var filename_ext = &quot;.png&quot;
        };

        // set image href to {image_id} + {2x filename key}
        image.setAttributeNS('http://www.w3.org/1999/xlink', &quot;href&quot;, image_id + <span>'-2x'</span> + filename_ext);
      };
    }
  ]]&gt; &lt;/script&gt;
<span>  &lt;svg id=&quot;logo&quot; class=&quot;image&quot; viewBox=&quot;0 0 149 74&quot;&gt;
    &lt;image xlink:href=&quot;logo-1x.png&quot; x=&quot;0&quot; y=&quot;0&quot; width=&quot;149&quot; height=&quot;74&quot;/&gt;
  &lt;/svg&gt;
  &lt;svg id=&quot;promo&quot; class=&quot;image&quot; viewBox=&quot;0 0 200 150&quot;&gt;
    &lt;image xlink:href=&quot;promo-1x.png&quot; x=&quot;0&quot; y=&quot;0&quot; width=&quot;200&quot; height=&quot;150&quot;/&gt;
  &lt;/svg&gt;
  &lt;svg id=&quot;bkg&quot; class=&quot;image jpg&quot; viewBox=&quot;0 0 960 720&quot;&gt;
    &lt;image xlink:href=&quot;bkg-1x.jpg&quot; x=&quot;0&quot; y=&quot;0&quot; width=&quot;960&quot; height=&quot;720&quot;/&gt;
  &lt;/svg&gt;</span>
&lt;/svg&gt;</code></pre>
    </blockquote>
</div>

<div id="use" class="content">
    <h2>How do I start using this awesome thing?</h2>
    <p><a href="/images/svg-image/images.svg" download>Download the SVG file</a> (or
    <a href="/images/svg-image/images-nojs.svg" download>download the non-JS-dependent version</a>), modify the parts
    highlighted in green to suit your needs, stick it in your images directory, and link to the svg instead of the
    png images.</p>
</div>

<div id="discuss" class="content">
    <a href="https://news.ycombinator.com/item?id=5614961">Discuss on Hacker News</a>
</div>

</div>

<div id="bkg" style="position:fixed;top:-50%;left:-50%;width:100%;height:100%;">
  <object type="image/svg+xml" width="200%" height="200%" data="/images/svg-image/images.svg#bkg">
    <!--<img src="/images/svg-image/bkg-1x.jpg" width="200%" height="200%" />-->
  </object>
</div>

</body>

</html>
