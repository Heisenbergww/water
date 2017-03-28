
// custom settings for the webresizer api
// distributed under GNU 2.0 author: webresizer



// set sample image 

wz.api.sample = "/sample/sample.jpg";

// set sample image file size (in bytes)

wz.api.sampleSize = 67428;



// show download links ("Display Save" button)  
// 1 = turn on, 0 = turn off

wz.api.showDownload = 0;



// localization (change the language)
// also manually modify the HTML as required

// note: the order of below is important

wz.api.loc = [
	"Display Save",
	"Save Off",
	"show controls to save images",
	"",
	"<a href='https://google.com/chrome/'>Chrome</a> or <a href='https://mozilla.org/'>Firefox</a>",
	"Please upgrade your browser to use this feature",
	"try",
	"Loaded Images",
	"Unable to initialise the editor",
	"Resizing...",
	"Apply to All",
	"unable to initialise the api",
	"Load Images",
	"Loading.."
];



// change the style
// also manually change css files as you like
// note: change class names or ids with care

wz.api.styles = {
	
	// body background color
	bc:"#050302",
	
	// error message class
	err:"errMsg",
	
	// input field valid value color
	ic:"#444444",
	
	// input field invalid value color
	sr:"#d5000f",
	
	// classes for download links (arrows)
	si:"sion fa-arrow-circle-down",
	sid:"sidown fa-arrow-circle-down",
	sif:"sioff",
	
	// thumbnail classes
	td:"thumbDelete",
	th:"thumb",
	
	// active thumbnail highlight colour
	hc:"#FFFFFF",

	// thumbnail delete highlight color and
	// filesize larger than original color
	dc:"#FF0000",
	
	// filesize smaller than original color
	ok:"#008000",
	
	// filesize loading (dots) color
	gc:"#555555"
	
};



// set minimum and maximum console values

// input fields:
// ch: crop height
// cw: crop width
// sharp: sharpen
// size: width
// opt: optimization

// v: default value
// by: increment by (plus or minus button increment)
// mn: minimum value allowed
// mx: maximum value allowed

wz.api.def = {
		
		// crop height input 
		// note: default value has no effect (calculated at half the height) 
		ch:{
			v:20,
			by:3,
			mn:20,
			mx:1000
		},
		
		// crop width input 
		// note: default value has no effect (calculated at half the width) 
		cw:{
			v:20,
			by:3,
			mn:20,
			mx:1000
		},
		
		// sharpen input 
		sharp:{
			v:10,
			by:5,
			mn:0,
			mx:100
		},
		
		// width input (image size) 
		size:{
			v:600,
			by:20,
			mn:20,
			mx:1000
		},
		
		// optimization input 
		opt:{
			v:70,
			by:5,
			mn:10,
			mx:100
		}
};