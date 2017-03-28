<!doctype html><html lang="en"><head><meta charset="UTF-8">
<title>Web Resizer - Bulk API Sample</title>
<!-- distributed under GNU 2.0 author: webresizer -->
<meta name="description" content="webresizer API Sample - free to use photo editor.">
<!--[if lt IE 9]><script type="text/javascript">var el=["header","nav","main","section","footer"];for(var i=0;i<el.length;i++){document.createElement(el[i]);}</script><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" media="all" href="/sample/bulkmenu.css">
<link rel="stylesheet" type="text/css" media="all" href="/sample/font-awesome.css">
<link rel="stylesheet" type="text/css" media="all" href="/sample/wzedit.css">
<link rel="stylesheet" type="text/css" media="all" href="/sample/wzsettings.css">
</head><body>

<header id="banner"><a href="http://api.webresizer.com/" title="Webresizer API" id="wz"></a></header>

<section id="thumbnails"><h2 class="accessibility">Loaded Images</h2></section>

<main id="console">
<section id="upload"><h2>Loading..</h2><p id="dragtxt">drop images here</p><input type="file" id="uploadb" name="uploadb" multiple="multiple" /></section>
<h1 class="accessibility">Photo Editor</h1>
<section id="editorTools">
<div id="size" class="row"><label>Width </label><input type="text" pattern="[0-9]*" value="0" maxlength="4" tabindex="1"><span class="plus">+</span> <span class="minus">-</span> <small class="range"></small></div>
<div id="opt" class="row"><label>Image Quality </label><input type="text" pattern="[0-9]*" value="0" maxlength="3" tabindex="1"><span class="plus">+</span> <span class="minus">-</span> <small class="range"></small></div>
<div id="sharp" class="row"><label>Sharpen </label><input type="text" pattern="[0-9]*" value="0" maxlength="3" tabindex="1"><span class="plus">+</span> <span class="minus">-</span> <small class="range"></small></div>
</section>
<section id="cropTools">
<div id="cw" class="row"><label><span class="accessibility">Crop </span>Width </label><input id="cwidth" type="text" pattern="[0-9]*" value="0" maxlength="4" tabindex="1"> <small class="range"></small></div>
<div id="ch" class="row"><label><span class="accessibility">Crop </span>Height </label><input id="cheight" type="text" pattern="[0-9]*" value="0" maxlength="4" tabindex="1"> <small class="range"></small></div>
</section>

<section id="actions"><h3 class="accessibility">Bulk Actions</h3>

<span class="action" id="crop" title="" tabindex="1">Apply Crop</span><br/> <div class="fa-search-plus" id="zoomIn" title="Zoom In" tabindex="1"><span class="accessibility">Zoom In</span><br/></div>
<div class="fa-search-minus" id="zoomOut" title="Zoom Out" tabindex="1"><span class="accessibility">Zoom Out</span><br/></div><span class="plainAction" id="cancelCrop" title="" tabindex="1">Cancel</span><br/>

<span class="action" id="showCropper" title="show crop tools" tabindex="1">Crop Image</span> <br/><span class="action" id="bulk" title="apply these settings to all images" tabindex="1">Apply to All</span> <br/><span class="action" id="undo" title="undo all changes to this image" tabindex="1">Undo Edits</span> <br/><span class="action" id="saveToggle" title="show controls to download images" tabindex="1">Display Save</span>
</section>

</main> 

<section id="dimensions">
<h3 class="accessibility">Image Dimensions</h3><small class="origDim"><span id="wo" title="Original Width"></span><span class="dx" id="odx">x</span><span id="ho" title="Original Height"></span> <span id="os" title="File Size (original)"></span></small> | 
<small class="optDim"><span id="mw" title="Optimized Width"></span><span class="dx">x</span><span id="mh" title="Optimized Height"></span></small> | <small class="optSize"><span id="ms" title="File Size (optimized)"></span></small></section>

<section id="rotate"><h3 class="accessibility">Rotate</h3><div id="rctl"><p id="rr" class="fa-rotate-right"> <span class="accessibility">Right</span></p><p id="rl" class="fa-rotate-left"><span class="accessibility">Left</span></p></div></section>

<h2 class="accessibility">Current Image</h2><div id="editor"></div>

<script type="text/javascript">var canIE9=false;</script>
<!--[if lte IE 9]><script type="text/javascript">canIE9=true;document.write("<p id='warning' class='fa-lightbulb-o'><p>");</script><![endif]-->

<script type="text/javascript" src="/sample/wzedit.js"></script>
<script type="text/javascript" src="/sample/wzsettings.js"></script>
<script type="text/javascript">wz.ld.w();</script>
<!--útf-->

</body></html>
