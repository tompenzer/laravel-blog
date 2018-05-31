<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>SVG Mask Example</title>
  <meta name="description" content="An example of Firefox's SVG CSS Mask Support">
  <meta name="author" content="Tom Penzer">
  <link rel="stylesheet" href="style.css">
  <style>
  body {
      position: relative;
      background: #444444;
      width: 700px;
  	color: #CCC;
  }

  a {
      width: 172px;
      height: 32px;
      border-radius:5px;
      -moz-border-radius:5px;
      -moz-box-shadow: 0 0 3px rgba(255,255,255,0.35);
      -webkit-box-shadow: 0 0 3px rgba(255,255,255,0.35);
      box-shadow: 0 0 3px rgba(255,255,255,0.35);
      color: #FFFFFF;
      font-weight: bold;
      font-size: 14px;
      text-decoration: none;
      text-align: center;
      line-height: 32px;
  }

  a:hover  {
      -moz-box-shadow: inset 0px -32px 0px 0px rgba(0,0,0,0.15);
      -webkit-box-shadow: inset 0px -32px 0px 0px rgba(0,0,0,0.15);
      box-shadow: inset 0px -32px 0px 0px rgba(0,0,0,0.15);
  }

  a:active {
      -moz-box-shadow: inset 0px -32px 0px 0px rgba(0,0,0,0.35);
      -webkit-box-shadow: inset 0px -32px 0px 0px rgba(0,0,0,0.35);
      box-shadow: inset 0px -32px 0px rgba(0,0,0,0.35);
  }

  a#outer-signup-button {
      position: absolute;
      right: 40px;
  	top: 20px;
  	z-index: 1;/* needed to raise the button above the masked div to be clickable */
      text-shadow: #CC5200 0px -1px 0px;
      background: -webkit-gradient(linear, left top, left bottom, from(#F7B400), to(#D76A00));
      background: -moz-linear-gradient(top,  #F7B400,  #D76A00);
  	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#F7B400', endColorstr='#D76A00');
  }

  div#promo-banner {
      position:relative;
      height: 169px;
      width: 669px;
      border-radius:5px;
      -moz-border-radius:5px;
      background: -webkit-gradient(linear, left top, left bottom, from(#2E2E2E), to(#000000));
      background: -moz-linear-gradient(top,  #2E2E2E,  #000000);
  	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2E2E2E', endColorstr='#000000');
      margin: 20px 10px 0px 13px;
      -webkit-mask-box-image: url(http://i.imgur.com/JGTYi.png);
      mask: url('/images/maskdemo.svg#mask-demo'); /* This is where the magic happens (for FF at least) */
      -moz-box-shadow: inset 0 0 3px rgba(255,255,255,0.45);
      -webkit-box-shadow: inset 0 0 3px rgba(255,255,255,0.45);
      box-shadow: inset 0 0 3px rgba(255,255,255,0.45);
  }

  #promo-banner img {
      position: absolute;
      bottom: 1px;
      left: 1px;
      border-radius:5px 0px 0px 5px;
      -moz-border-radius:5px 0px 0px 5px;
  }

  #promo-banner h1 {
      margin-left: 112px;
      font-size: 16px;
      font-weight: normal;
      line-height: 46px;
      color: #FFFFFF;
  }

  #promo-banner h1 span {
      font-family: "Times New Roman", Times, serif;
      font-style: italic;
      font-size: 18px;
  }

  #promo-banner p {
      margin-left: 142px;
      padding-left: 15px;
      line-height: 16px;
      font-size: 12px;
      color: #CCCCCC;
  }

  #promo-banner h2 {
      position: absolute;
      font-family: "Times New Roman", Times, serif;
      font-style: italic;
      top: 48px;
      right: 20px;
      font-size: 18px;
      font-weight: normal;
      color: #FFFFFF;
      text-shadow: #000000 0px -1px 0px;
  }

  a#promo-signup-button {
      position: absolute;
      right: 30px;
      bottom: 30px;
      text-shadow: #1D4C7A 0px -1px 0px;
      background: -webkit-gradient(linear, left top, left bottom, from(#497AAC), to(#1D4C7A));
      background: -moz-linear-gradient(top,  #497AAC,  #1D4C7A);
  	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#497AAC', endColorstr='#1D4C7A');
  }
  </style>
</head>
<body>
	<blockquote><h3>Users, you sign up now!</h3></blockquote>
    <a id="outer-signup-button" href="#">Sign Up</a>
    <div id="promo-banner">
        <img src="http://i.imgur.com/hbmm3.png" width="129" height="167" />
        <h1>Developers, <span>Imagine</span> your code writing itself</h1>
        <p>It's always the little things that take the longest</p>
        <p>Like figuring out how to mask a div with SVGs</p>
        <p>Totally worth it for learning how SVG works though</p>
        <h2>Drink to forget the pain!</h2>
        <a id="promo-signup-button" href="#">Developer Sign Up</a>
    </div>
	<p>This page is in response to <a href="http://stackoverflow.com/questions/5887527/is-there-a-gecko-equivalent-to-webkit-mask-or-a-fancy-way-of-degrading-for-geck/9650153#9650153" target="_blank">this answer on StackOverflow</a>.</p>
	<h1>Files in directory:</h1>
	<blockquote><code>
	<a href="index.html">index.html</a><br />
	<a href="style.css">style.css</a><br />
	<a href="/images/maskdemo.svg">maskdemo.svg</a><br />
	</code></blockquote>
	<h2>The HTML Code:</h2>
	<blockquote><code>
	&lt;head&gt;<br />
  <blockquote>&lt;link rel=&quot;stylesheet&quot; href=&quot;style.css&quot;&gt;<br /></blockquote>
&lt;/head&gt;<br />

&lt;body&gt;<br />
    <blockquote>&lt;blockquote&gt;&lt;h3&gt;Users, you sign up now!&lt;/h3&gt;&lt;/blockquote&gt;<br />
	&lt;a id=&quot;outer-signup-button&quot; href=&quot;#&quot;&gt;Sign Up&lt;/a&gt;<br />
    &lt;div id=&quot;promo-banner&quot;&gt;<br />
        <blockquote>&lt;img src=&quot;http://i.imgur.com/hbmm3.png&quot; width=&quot;129&quot; height=&quot;167&quot; /&gt;<br />
        &lt;h1&gt;Developers, &lt;span&gt;Imagine&lt;/span&gt; your code writing itself&lt;/h1&gt;<br />
        &lt;p&gt;It's always the little things that take the longest&lt;/p&gt;<br />
        &lt;p&gt;Like figuring out how to mask a div with SVGs&lt;/p&gt;<br />
        &lt;p&gt;Totally worth it for learning how SVG works though&lt;/p&gt;<br />
        &lt;h2&gt;Drink to forget the pain!&lt;/h2&gt;<br />
        &lt;a id=&quot;promo-signup-button&quot; href=&quot;#&quot;&gt;Developer Sign Up&lt;/a&gt;<br /></blockquote>
    &lt;/div&gt;<br /></blockquote>
&lt;/body&gt;
	</code></blockquote>
	<h2>The CSS Code:</h2>
	<blockquote><code>
body {<br />
    position: relative;<br />
    background: #444444;<br />
    width: 700px;<br />
	color: #CCC;<br />
}<br />
<br />
a {<br />
    width: 172px;<br />
    height: 32px;<br />
    border-radius:5px;<br />
    -moz-border-radius:5px;<br />
    -moz-box-shadow: 0 0 3px rgba(255,255,255,0.35);<br />
    -webkit-box-shadow: 0 0 3px rgba(255,255,255,0.35);<br />
    box-shadow: 0 0 3px rgba(255,255,255,0.35);<br />
    color: #FFFFFF;<br />
    font-weight: bold;<br />
    font-size: 14px;<br />
    text-decoration: none;<br />
    text-align: center;<br />
    line-height: 32px;<br />
}<br />
<br />
a:hover  {<br />
    -moz-box-shadow: inset 0px -32px 0px 0px rgba(0,0,0,0.15);<br />
    -webkit-box-shadow: inset 0px -32px 0px 0px rgba(0,0,0,0.15);<br />
    box-shadow: inset 0px -32px 0px 0px rgba(0,0,0,0.15);	<br />
}<br />
<br />
a:active {<br />
    -moz-box-shadow: inset 0px -32px 0px 0px rgba(0,0,0,0.35);<br />
    -webkit-box-shadow: inset 0px -32px 0px 0px rgba(0,0,0,0.35);<br />
    box-shadow: inset 0px -32px 0px rgba(0,0,0,0.35);	<br />
}<br />
<br />
a#outer-signup-button {<br />
    position: absolute;<br />
    right: 40px;<br />
    top: 20px;<br />
	z-index: 1;/* needed to raise the button above the masked div to be clickable */<br />
    text-shadow: #CC5200 0px -1px 0px;<br />
    background: -webkit-gradient(linear, left top, left bottom, from(#F7B400), to(#D76A00));<br />
    background: -moz-linear-gradient(top,  #F7B400,  #D76A00);<br />
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#F7B400', endColorstr='#D76A00');<br />
}<br />
<br />
div#promo-banner {<br />
    position:relative;<br />
    height: 169px;<br />
    width: 669px;<br />
    border-radius:5px;<br />
    -moz-border-radius:5px;<br />
    background: -webkit-gradient(linear, left top, left bottom, from(#2E2E2E), to(#000000));<br />
    background: -moz-linear-gradient(top,  #2E2E2E,  #000000);<br />
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2E2E2E', endColorstr='#000000');<br />
    margin: 20px 10px 0px 13px;<br />
    -webkit-mask-box-image: url(http://i.imgur.com/JGTYi.png);<br />
    mask: url('/images/maskdemo.svg#mask-demo'); /* This is where the magic happens (for FF at least) */<br />
    -moz-box-shadow: inset 0 0 3px rgba(255,255,255,0.45);<br />
    -webkit-box-shadow: inset 0 0 3px rgba(255,255,255,0.45);<br />
    box-shadow: inset 0 0 3px rgba(255,255,255,0.45);<br />
}<br />
<br />
#promo-banner img {<br />
    position: absolute;<br />
    bottom: 1px;<br />
    left: 1px;<br />
    border-radius:5px 0px 0px 5px;<br />
    -moz-border-radius:5px 0px 0px 5px;<br />
}<br />
<br />
#promo-banner h1 {<br />
    margin-left: 112px;<br />
    font-size: 16px;<br />
    font-weight: normal;<br />
    line-height: 46px;<br />
    color: #FFFFFF;<br />
}<br />
<br />
#promo-banner h1 span {<br />
    font-family: &quot;Times New Roman&quot;, Times, serif;<br />
    font-style: italic;<br />
    font-size: 18px;<br />
}<br />
<br />
#promo-banner p {<br />
    margin-left: 142px;<br />
    padding-left: 15px;<br />
    line-height: 16px;<br />
    font-size: 12px;<br />
    color: #CCCCCC;<br />
}<br />
<br />
#promo-banner h2 {<br />
    position: absolute;<br />
    font-family: &quot;Times New Roman&quot;, Times, serif;<br />
    font-style: italic;<br />
    top: 48px;<br />
    right: 20px;<br />
    font-size: 18px;<br />
    font-weight: normal;<br />
    color: #FFFFFF;<br />
    text-shadow: #000000 0px -1px 0px;<br />
}<br />
<br />
a#promo-signup-button {<br />
    position: absolute;<br />
    right: 30px;<br />
    bottom: 30px;<br />
    text-shadow: #1D4C7A 0px -1px 0px;<br />
    background: -webkit-gradient(linear, left top, left bottom, from(#497AAC), to(#1D4C7A));<br />
    background: -moz-linear-gradient(top,  #497AAC,  #1D4C7A);<br />
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#497AAC', endColorstr='#1D4C7A');<br />
}
	</code></blockquote>
	<h2>The SVG Code:</h2>
	<blockquote><code>
	&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot;?&gt;<br />
&lt;!DOCTYPE svg PUBLIC &quot;-//W3C//DTD SVG 1.1//EN&quot; &quot;http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd&quot;&gt;<br />
&lt;svg version=&quot;1.1&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;&gt;<br />
	&lt;defs&gt;<br />
               	&lt;mask id=&quot;mask-demo&quot; maskUnits=&quot;userSpaceOnUse&quot;&gt; <br />
			&lt;path fill=&quot;white&quot; d=&quot;M0,43v0.5V44v0.5v1V46v0.5v1V48v0.5V49v0.5V50v0.5V51v0.5V52v0.5V53v0.5V54v0.5V55<br />
	v1v0.5V57v0.5V58v0.5v1V60v0.5V61v0.5v1V63v0.5v1V65v0.5V66v0.5v1V68v0.5V69v0.5V70v0.5V71v0.5V72v0.5V73v0.5V74v0.5v1V76v0.5V77<br />
	v0.5V78v0.5V79v0.5V80v0.5V81v0.5V82v0.5V83v0.5V84v0.5V85v0.5V86v0.5V87v0.5V88v0.5V89v0.5V90v0.5V91v0.5v1V93v0.5V94v0.5V95v0.5<br />
	V96v0.5V97v0.5V98v0.5V99v0.5v1v0.5v0.5v0.5v0.5v1v0.5v0.5v1v0.5v0.5v0.5v0.5v1v0.5v0.5v0.5v0.5v0.5v1v0.5v0.5v0.5v0.5v0.5v0.5v0.5<br />
	v0.5v0.5v0.5v0.5v0.5v0.5v0.5v0.5v1v0.5v0.5v1v0.5v0.5v0.5v0.5v0.5v0.5v0.5v0.5v1v0.5v0.5v1v0.5v0.5v0.5v0.5v0.5v0.5v0.5v0.5v0.5<br />
	v0.5v0.5v0.5v0.5v0.5v0.5v1.5v0.5v1v0.5v0.5v8v2v8.5v2c0,3.87,1.646,5.5,5.555,5.5h1.01h17.17h1.01h11.11h1.01h2.02h1.01h2.02h1.01<br />
	h6.06h1.01h4.04h1.01h1.01h1.01h1.01h2.02h1.01h6.06h1.01h1.01h1.01h2.02h1.01h1.01h1.01h1.01h3.03h1.01h2.02h1.01h2.02h1.01h1.01<br />
	h1.01h1.01h1.01h1.01h1.01h1.01h1.01h3.03h1.01h1.01h1.01h1.01h2.02h1.01h1.01h1.01h1.01h1.01h2.02h1.01h1.01h1.01h2.02h1.01h1.01<br />
	h1.01h1.01h1.01h2.02h1.01h1.01h1.01h1.01h2.02h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h2.02h1.01h1.01h1.01h1.01h2.02<br />
	h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h3.03h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01<br />
	h1.01h1.01h2.02h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h2.02h1.01h1.01h1.01h1.01h1.01<br />
	h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h0.505h0.505h1.01h1.01h1.01h1.01h1.01h1.01h1.01<br />
	h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01h1.01<br />
	h1.01h1.01h2.02h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h2.02h1.01h1.011h1.01h1.01<br />
	h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h3.03h1.01h1.01h1.011h1.01h1.01h1.01h1.01h1.011h1.01h1.01h2.021<br />
	h1.01h1.01h1.01h1.011h2.02h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011<br />
	h1.01h1.01h1.01h1.011h2.02h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.01h1.011h1.01h2.02h1.011h1.01<br />
	h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.01h1.011h1.01h2.02h1.011h1.01<br />
	h1.01h1.01h2.021h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h3.03h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01<br />
	h1.011h1.01h1.01h1.01h1.011h1.01h2.02h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h2.021<br />
	h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01<br />
	h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01<br />
	h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h2.021h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01<br />
	h1.01h2.021h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.01h1.011h3.029h1.011h1.01h1.01h1.01<br />
	h1.011h1.01h1.01h1.01h1.011h1.01h2.02h0.505h0.506h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01<br />
	h1.01h1.011h1.01h1.01h1.01h1.011h2.02h1.01h1.011h1.01h1.01h1.01h2.021h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01<br />
	h1.011h1.01h1.01h1.01h1.011h2.02h1.01h1.011h1.01h1.01h1.01h1.011h1.01h1.01h1.01h1.01h2.021h1.01h2.021h1.01h2.02h1.011h1.01h1.01<br />
	h1.01h1.011h2.02h1.01h1.011h1.01h5.05h1.01h1.01h1.011h1.01h1.01h1.01h1.011h1.01h3.535h6.564h1.011h17.17h1.01<br />
	c3.909,0,5.555-1.63,5.555-5.5v-2V151v-2v-8v-0.5V140v-0.5V139v-0.5v-1V137v-0.5V136v-0.5V135v-0.5V134v-0.5V133v-0.5V132v-0.5V131<br />
	v-0.5V130v-0.5v-1V128v-0.5V127v-0.5V126v-0.5V125v-0.5V124v-0.5V123v-0.5V122v-0.5V121v-0.5V120v-0.5V119v-0.5V118v-0.5V117v-0.5<br />
	V116v-0.5V115v-0.5V114v-0.5V113v-0.5V112v-0.5V111v-0.5V110v-0.5V109v-0.5V108v-0.5V107v-0.5V106v-0.5V105v-0.5V104v-0.5V103v-0.5<br />
	V102v-0.5V101v-0.5V100v-0.5V99v-0.5V98v-0.5V97v-0.5V96v-0.5V95v-0.5V94v-0.5V93v-0.5v-1V91v-0.5V90v-0.5V89v-0.5V88v-0.5V87v-0.5<br />
	V86v-0.5V85v-0.5V84v-0.5V83v-0.5V82v-0.5V81v-0.5V80v-0.5V79v-0.5V78v-0.5V77v-0.5V76v-0.5V75v-0.5V74v-0.5V73v-0.5V72v-0.5V71<br />
	v-0.5V70v-0.5V69v-0.5V68v-7v-2v-8.5v-2c0-3.87-1.646-5.5-5.555-5.5h-1.01h-17.17h-1.011h-6.564h-3.535h-1.01h-1.011h-1.01h-1.01<br />
	h-1.01h-1.011h-1.01h-1.01h-5.05h-1.01h-1.011h-1.01h-2.02h-1.011h-1.01h-1.01h-1.01h-1.011h-2.02h-1.01h-2.021h-1.01h-2.021h-1.01<br />
	h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01h-2.02h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01<br />
	h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-2.021h-1.01h-1.01h-1.01h-1.011h-1.01h-2.02h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01<br />
	h-1.01h-0.505h-0.506h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-0.506h-0.505h-2.02h-1.01h-1.011<br />
	h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-3.029h-1.011h-1.01h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01<br />
	h-1.01h-1.01h-1.011h-1.01h-1.01h-2.021h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.01h-1.011h-1.01<br />
	h-1.01h-1.01h-2.021h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01<br />
	h-1.01h-1.01h-1.011h-0.505h-18.766l-0.232-0.5L451.44,42l-0.232-0.5l-0.223-0.5l-0.232-0.5l-0.454-1l-0.233-0.5l-0.221-0.5<br />
	l-0.456-1l-0.231-0.5l-0.231-0.5l-0.223-0.5l-0.233-0.5l-0.221-0.5l-0.232-0.5l-0.233-0.5l-0.222-0.5L447.33,33l-0.224-0.5<br />
	l-0.231-0.5l-0.222-0.5l-0.233-0.5l-0.232-0.5l-0.222-0.5l-0.687-1.5l-0.222-0.5l-0.466-1l-0.221-0.5l-0.233-0.5l-3.646-8l-0.908-2<br />
	l-3.878-8.5l-0.92-2c-1.767-3.87-4.151-5.5-8.06-5.5h-1.011h-17.17h-1.01h-11.109h-1.011h-2.02h-1.01h-2.021h-1.01h-6.061h-1.01<br />
	h-4.04h-1.01h-1.01h-1.011h-1.01h-2.02h-1.01h-6.061h-1.01h-1.01h-1.011h-2.02h-1.01h-1.011h-1.01h-1.01h-3.03h-1.01h-2.021h-1.01<br />
	h-2.02h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-3.03h-1.01h-1.011h-1.01h-1.01h-2.021h-1.01h-1.01h-1.01h-1.011<br />
	h-1.01h-2.02h-1.01h-1.011h-1.01h-2.02h-1.011h-1.01h-1.01h-1.01h-1.011h-2.02h-1.01h-1.011h-1.01h-1.01h-2.021h-1.01h-1.01h-1.01<br />
	h-1.011h-1.01h-1.01h-1.01h-1.01h-1.011h-1.01h-2.02h-1.011h-1.01h-1.01h-1.01h-2.021h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-0.505<br />
	h-0.506h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01h-1.01h-1.011h-1.01h-1.01<br />
	h-1.01h-1.011h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01<br />
	h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-0.505<br />
	h-0.505h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01<br />
	h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01<br />
	h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01<br />
	h-1.01h-0.505h-0.505h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-2.02h-1.01h-1.01h-1.01h-1.01h-2.02h-1.01h-1.01h-1.01h-1.01h-1.01<br />
	h-1.01h-1.01h-1.01h-1.01h-1.01h-2.02h-1.01h-1.01h-1.01h-1.01h-2.02h-1.01h-1.01h-1.01h-1.01h-1.01h-2.02h-1.01h-1.01h-1.01h-2.02<br />
	h-1.01h-1.01h-1.01h-1.01h-1.01h-2.02h-1.01h-1.01h-1.01h-1.01h-3.03h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-1.01h-2.02<br />
	h-1.01h-2.02h-1.01h-3.03h-1.01h-1.01h-1.01h-1.01h-2.02h-1.01h-1.01h-1.01h-6.06h-1.01h-2.02h-1.01h-1.01h-1.01h-1.01h-4.04h-1.01<br />
	h-6.06h-1.01h-2.02h-1.01h-2.02h-1.01h-11.11h-1.01H6.565h-1.01h-0.03h-0.02H5.484h-0.02H5.443h-0.03H5.393h-0.02<br />
	C1.586,0.05,0,1.68,0,5.5v2V16v2v8v0.5V27v1v0.5V30v0.5V31v0.5V32v0.5V33v0.5V34v0.5V35v0.5V36v0.5V37v0.5v1V39v0.5v1V41v0.5V42v0.5<br />
	V43z&quot;/&gt;<br />
		&lt;/mask&gt;<br />
	&lt;/defs&gt;<br />
&lt;/svg&gt;
	</code></blockquote>

</body>
</html>
