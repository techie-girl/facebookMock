//
// Passfaces Web Client Configuration Parameters
//

// This file contains the Passfaces Web Client configuration parameters
// common to all versions (Java, JavaScript and ActiveX) of the Web Client
//
// There are three main sections of parameters: Common, Logon and Enroll
// Where those parameters in the Common section will be used by both 
// enrollment and logon.
//
// Additionally, sets of parameters may be selected by the value of the 
// pfcustom session cookie to provide dynamic customization.
//
// If the pfcustom session cookie is not set, CustomLogon and CustomEnroll 
// will be used.
//
// So if pfcustom has the value "XXXXXX", all clients (Java, ActiveX and 
// JavaScript will combine parameters from the following sections for logon:
//		Common, Logon, CustomLogonXXXXXX
//
// and from the following sections for enrollment:
//		Common, Enroll, CustomEnrollXXXXXX
//
// Note that parameters should not be duplicated in sections that will be 
// included together.

// The following example shows how to switch the background images 
// for both logon and enrollment depending on the value of the pfcustom cookie. 
// Note that in this example IMAGE.BACKGROUND.URL only appears in the custom
// sections - it should not be duplicated in the Common, Logon or Enroll 
// sections.
// The same technique can be used to dynamically switch any of these parameters.


// Default values for customizable parameters (used if pfcustom is empty) 
var CustomLogon = {
	"IMAGE.BACKGROUND.URL":"imagesJS2/backgroundlogon.gif"
};

var CustomEnroll = {
	"IMAGE.BACKGROUND.URL":"imagesJS2/background.gif"
};


// Example custom parameters based on a pfcustom cookie value of "ABC123"
// (note that these images are not provided!)	
var CustomLogonABC123 = {
	"IMAGE.BACKGROUND.URL":"imagesJS2/backgroundlogonABC123.gif"
};

var CustomEnrollABC123 = {
	"IMAGE.BACKGROUND.URL":"imagesJS2/backgroundABC123.gif"
};


var Common = {
	// Parameters common to logon and enrollment
	"COMMS.RESULT.CODING":"0",										// not used by JS
	"COMMS.RESULT.TYPE":"1",										// not used by JS
	
	"CONFIG.GRID.SIZE":"3,3",										// not used by JS
	"CONFIG.MOUSE_PERMIT":"1,1,1",									// !JS
								
	"DIMENSION.FACE":"62,78",										// !JS
	"DIMENSION.GRID.GAP.SIZE":"5",									// !JS
	"DIMENSION.PROMPT_PANEL.GAP.WIDTH":"2",							// !JS
	"DIMENSION.VERTICAL.GAP.HEIGHT":"5",							// !JS
	"DIMENSION.BUTTON.GAP.WIDTH":"5",								// !JS

	"FONT.MAIN":"0,15,1,0,0",										// !JS
	"FONT.TITLE":"0,18,1,0,0",										// !JS

	"TEXT.ERROR.COLOUR":"#FF0000",		// Make errors red so they show up on black or white

	"TEXT.ERROR.BAD_DOWNLOAD":"Error : Download failed\\n\\n",		// !JS
	"TEXT.ERROR.BAD_INPUTS":"Error : Bad startup parameters\\n\\n",	// !JS
	"TEXT.ERROR.INTERNAL_ERROR":"Internal Error\\n\\n",				// !JS
	"TEXT.ERROR.NO_BROWSER":"Couldn`t find\nweb browser!",			// AX only

	"TEXT.MISC.COLOUR":"#FFFFFF",									// !JS

	"TEXT.MISC.DOWNLOADING":"Please wait while your\\nPassfaces are downloaded",	
	"TEXT.MISC.INIT":"Setting up!\\n\\nPlease wait.",				// !JS
	"TEXT.MISC.THE_END":"Please wait...",							// !JS

	"TEXT.PROMPT.COLOUR":"#FFFFFF",									
	"TEXT.PROMPT.4":"Click on your Passface\\n\\n",
	"TEXT.PROMPT.5":"Click on your Passface\\n\\n(go on!)",

	"BACKGROUND.COLOUR":"#204162",									

	"IMAGE.FACE.LOAD_MODE":"0",	
	"IMAGE.FACE.URL":"includes/images",

	"IMAGE.PROMPT_PANEL.URL":"imagesJS2/promptpanel.gif",				// removed in this version (JS only so far)

	"IMAGE.HILIGHT1.URL":"imagesJS2/highlight1.gif",					// JS only
	"IMAGE.HILIGHT2.URL":"imagesJS2/highlight2.gif",					// JS only
	"IMAGE.HILIGHT3.URL":"imagesJS2/highlight3.gif",					// JS (enroll) only
	"IMAGE.HILIGHTS.URL":"imagesJS2/highlights.gif",					// !JS

	"IMAGE.PROGRESS.INFO":"2,2",									// !JS
	"IMAGE.PROGRESS.URL":"imagesJS2/progress.gif",						// !JS

	"NETCACHE.SERIAL":"320"											// AX only
};

var Logon = {
	// Login specific parameters
	"IMAGE.BUTTONS.INFO":"0,1,0,1,1,2,3",							// !JS
	"IMAGE.BUTTONS.URL":"",											// !JS

	"DIMENSION.ADJUST.ORIGIN":"2,16",								// !JS

	"NETCACHE.REALM":"passfaces logon"								// AX only 
};

var Enroll = {
	// Enroll specific parameters
	"IMAGE.SCORES.URL":"imagesJS2/scores.gif",							// !JS

	"IMAGE.BUTTONS.INFO":"0,1,0,1,1,2,3",							// !JS
	"IMAGE.BUTTONS.URL":"imagesJS2/buttons.gif",						// !JS

	"IMAGE.STEPOFF.URL":"imagesJS2/step0.gif",
	"IMAGE.STEPON.URL":"imagesJS2/step1.gif",

	"DIMENSION.CHOOSE.GAP.WIDTH":"5",								// !JS
	"DIMENSION.CHOOSE.GAP.HEIGHT":"4",								// !JS
	"DIMENSION.SCORE.GAP.WIDTH":"0",								// !JS

	"DIMENSION.ADJUST.ORIGIN":"2,0",								// !JS
	"DIMENSION.MARGIN.TOP":"62",									// !JS
	"DIMENSION.MARGIN.BOTTOM":"24",									// !JS

	"CONFIG.CHOOSE_FACES":"2",										// not used by JS

	"TEXT.TITLE.BASE":"",
	"TEXT.TITLE.INTRODUCTION":"ENROLL",
	"TEXT.TITLE.DOWNLOADING":"ENROLLING",
	"TEXT.TITLE.CHOOSING":"",										// not used by JS
	"TEXT.TITLE.CONFIRMATION":"ENROLLING",
	"TEXT.TITLE.FAMIL":"ENROLLING",
	"TEXT.TITLE.RESULT":"ENROLLING",
	"TEXT.TITLE.FINISH":"COMPLETE",
	"TEXT.TITLE.PRACTICE.0":"ENROLLING",
	"TEXT.TITLE.PRACTICE.1":"ENROLLING",
	"TEXT.TITLE.PRACTICE.2":"ENROLLING",
	"TEXT.TITLE.PRACTICE.3":"ENROLLING",
	"TEXT.TITLE.PRACTICE.4":"ENROLLING",
	"TEXT.TITLE.COLOUR":"#000000",									// !JS

	// These 2 are currently JS only
	"TEXT.INTRO1.TITLE":"Introduction to Passfaces\\n",				
	"TEXT.INTRO1.MAIN":"You are assigned a number of secret faces that are REQUIRED to access your account. Recognizing a familiar face is easy and almost instantaneous. Learn more by viewing the <b>Passfaces Demo</b>.\\n\\n\<b>Enrollment is important, so please follow each step carefully.</b>\\n\\nThe process takes 3 to 5 minutes.",

	"TEXT.EXPLAIN.INTRO.CANT_CHOOSE_FACES":"<b>Press NEXT</b> to continue OR<b>\\nENROLL LATER</b> to enroll at a later time.",
	"TEXT.EXPLAIN.INTRO.CANT_CHOOSE_GENDER":"",	
	"TEXT.EXPLAIN.FINISHED":"Press <b>DONE</b> to complete enrollment or\\n<b>BACK</b> to repeat the entire process.",
	"TEXT.EXPLAIN.CONFIRM.CANT_CHOOSE_FACES":"<b>Here are your SECRET Passfaces.</b>\\nPress <b>NEXT</b> to continue",
	"TEXT.EXPLAIN.DOWNLOADING.TITLE":"Downloading Passfaces",
	"TEXT.EXPLAIN.FAMIL.TITLE.START":"STEP 1\\nGet To Know Your Passfaces",																		// JS only
	"TEXT.EXPLAIN.FAMIL.TITLE.END":"STEP 2\\nPractice Using Passfaces",																			// JS only
	"TEXT.EXPLAIN.FAMIL.MALE":"",																										// not used by JS
	"TEXT.EXPLAIN.FAMIL.FEMALE":"",		
	"TEXT.EXPLAIN.FAMIL.FACE1":"Take a close look at this person.\\nWhat do you think she is like?\\nDoes she remind you of anyone?",	// JS only
	"TEXT.EXPLAIN.FAMIL.FACE2":"Take a close look at this person.\\nWhat do you think he is like?\\nDoes he remind you of anyone?",		// JS only
	"TEXT.EXPLAIN.FAMIL.FACE3":"Study her facial features.\\nDoes she look like anyone you know?\\n",										// JS only
	"TEXT.EXPLAIN.FAMIL.FACE4":"Study his facial features.\\nDoes he look like anyone you know?\\n,",										// JS only
	"TEXT.EXPLAIN.FAMIL.FACE5":"Look at her facial expression.\\nLook at her hair.\\nWhat features stand out?",							// JS only
	"TEXT.EXPLAIN.FAMIL.FACE6":"Look at his facial expression.\\nLook at his hair.\\nWhat features stand out?",							// JS only
	"TEXT.EXPLAIN.FAMIL.FACE7":"Look closely at her face.\\nWhat shape is her face?\\nWhat looks interesting about her?",				// JS only
	"TEXT.EXPLAIN.FAMIL.FACE8":"Look closely at his face.\\nWhat shape is his face?\\nWhat looks interesting about him?",				// JS only
	"TEXT.EXPLAIN.FAMIL.FACE9":"Take a close look at this person.\\nWhat do you think she is like?\\nDoes she remind you of anyone?",	// JS only
	"TEXT.EXPLAIN.FAMIL.LAST.CONTINUE":"You are now ready to practice\\nusing your Passfaces.\\nPress <b>NEXT</b> to continue or\\n<b>BACK</b> to repeat Step 1\\n",
	"TEXT.EXPLAIN.FAMIL.CONTINUE":"\\n<b>Press NEXT to continue\\n\\n</b>",
	"TEXT.EXPLAIN.COLOUR":"#FFFFFF",																									// !JS
	
	// All TEXT.LEARN.GOOD.TITLE.N, TEXT.LEARN.BAD.TITLE.N and TEXT.LEARN.XXXX.TITLE.EXTRA.N texts are optional																																	
	//"TEXT.LEARN.GOOD.TITLE.1":"",	
	"TEXT.LEARN.GOOD.TITLE.2":"STEP 3\\nTry Logging On with Passfaces",
	//"TEXT.LEARN.GOOD.TITLE.3":"",
	"TEXT.LEARN.GOOD.TITLE.4":"Congratulations!",	

	"TEXT.LEARN.GOOD.TITLE.EXTRA.4":"\\n\\n<b>You are ready to complete enrollment.</b>\\n",	

	"TEXT.LEARN.HESITANT":"You seem a little unsure!\\nPlease press <b>BACK</b> and try again.",
																											// JS only
	"TEXT.LEARN.GOOD.1":"You are Doing Great!\\nNow Practice One More Time\\n\\n<b>Press <b>NEXT</b> to continue\\n</b>",
	"TEXT.LEARN.GOOD.2":"Press <b>NEXT</b> to <b>Try Logging On</b> OR\\npress <b>BACK</b> if you would\\nlike more practice.",
	"TEXT.LEARN.GOOD.3":"<b>Well done!</b>\\n\\nPress <b>Next</b> to try logging on one final time.",
	"TEXT.LEARN.GOOD.4":"Press <b>NEXT</b> if you agree.\\nPress <b>BACK</b> for more practice.",
	"TEXT.LEARN.GOOD.COLOUR":"#FFFFFF",																		// !JS
	
	"TEXT.LEARN.FINISH.TITLE":"Come Back Soon!",
	"TEXT.LEARN.FINISH.TITLE.EXTRA":"\\n\\nIt is <b>IMPORTANT</b> to log on using\\nPassfaces at least once in the next few\\ndays. This ensures that you\\nremember your Passfaces.",
					
	//"TEXT.LEARN.BAD.TITLE.0":"",
	//"TEXT.LEARN.BAD.TITLE.1":"",
	//"TEXT.LEARN.BAD.TITLE.2":"",
	//"TEXT.LEARN.BAD.TITLE.3":"",
	//"TEXT.LEARN.BAD.TITLE.4":"",					
	"TEXT.LEARN.BAD.0":"<b>You didn`t get them all first time.</b>\\n\\nPress <b>BACK</b> and try again.",
	"TEXT.LEARN.BAD.1":"<b>You didn`t get them all first time.</b>\\n\\nPress <b>BACK</b> and try again.",
	"TEXT.LEARN.BAD.2":"<b>You need more assisted practice.</b>\\n\\nPress <b>BACK</b> and try again.",
	"TEXT.LEARN.BAD.3":"Oops!\\nPlease press <b>BACK</b> and try again.",
	"TEXT.LEARN.BAD.4":"Oops!\\nPlease press <b>BACK</b> and try again.",
	"TEXT.LEARN.BAD.COLOUR":"#FFFFFF",

	"TEXT.PROMPT.0":"Click on your Passface\\nThere's only one on this screen\\n\\nClick on your Passface",										
	"TEXT.PROMPT.1":"Click on your Passface\\nThere's only one on this screen\\n(It's moving)\\nClick on your Passface",						
	"TEXT.PROMPT.2":"Click on your Passface\\nThere's only one on this screen\\n\\nClick on your Passface",										
	"TEXT.PROMPT.3":"Click on your Passface\\nThere's only one on this screen\\n(It's moving)\\nClick on your Passface",						

	"TEXT.PROMPT.COLOUR":"#FFFFFF",

	"NETCACHE.REALM":"passfaces enroll"							// AX only
};