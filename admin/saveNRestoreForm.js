// —————————————————–//
// SAVE FORM FIELD SELECTIONS IN COOKIES 		//
// formcookie_saverestore.js				//
// Written by Tony Davis, T. Davis Consulting, Inc.	//
// Date written: September 27, 2005			//
// Email: tony@tdavisconsulting.com			//
// Web site: http://www.tdavisconsulting.com		//
// —————————————————–//

// instructions:
// ————
// Change <BODY>
// to <BODY onunload="saveSelections(document.forms[0])"> and
// Change </FORM>
// TO </FORM><SCRIPT language=JavaScript type="">loadSelections(document.forms[0]);</SCRIPT>
// see a working example at: http://www.tdavisconsulting.com/formcookie
//

//
// ————————————————
// This function will concatentate all the fields in
// in the form into one string, delimited by a PIPE
// symbol, into one cookie. The cookie name is the
// same name as the form name. ALL fields are saved.
// ————————————————
//

/// COOKIE FUNCTIONS

function setCookie(name, value, expires, path, domain, secure) {
document.cookie= name + "=" + escape(value) +
((expires) ? "; expires=" + expires.toGMTString() : "") +
((path) ? "; path=" + path : "") +
((domain) ? "; domain=" + domain : "") +
((secure) ? "; secure" : "");

}

function getCookie(name) {
	var dc = document.cookie;
	var prefix = name + "=";
	var begin = dc.indexOf("; " + prefix);
	if (begin == -1) {
		begin = dc.indexOf(prefix);
		if (begin != 0) return null;
	} else {
		begin += 2;
	}
	
	var end = document.cookie.indexOf(";", begin);
	if (end == -1) {
		end = dc.length;
	}
	return unescape(dc.substring(begin + prefix.length, end));
}


function saveSelections(frm) {

		var setvalue;
		var fieldType;
		var index;
		var formname = frm.name;

		// Expire cookie in 1 day.
		var today = new Date();
		var exp   = new Date(today.getTime()+1*24*60*60*1000);

		var string = "formname=" + formname + "|";
		var cookieName = formname;

		//alert(exp);
		//alert(formname);


		var n = frm.length;
		
		for (i = 0; i < n; i++) {
			e = frm[i].name;
			fieldValue  = frm[i].value;
			fieldType   = frm[i].type;

			//alert(e);
//			alert(fieldType);
			//alert(fieldValue);

			// RADIO BUTTON
			var checkedRadioButtonIndex = 0; // 0 by default
			if (fieldType == "radio") {
				for (x=0; x < frm.elements[e].length; x++) {
					if (frm.elements[e][x].checked) {
						checkedRadioButtonIndex = x;
					}
				}
			string += checkedRadioButtonIndex + "|";
//				alert("RADIO");
//				if (frm.elements[e].checked) {
//					alert("selected index = "+frm.elements[i].options.selectedIndex);
//					checkedRadioButtonIndex = frm.elements[i].options.selectedIndex;
//					alert("checked index = " + checkedRadioButtonIndex);
//					string = string + checkedRadioButtonIndex + "|";
//				}
			}

			// TEXT, TEXTAREA, and DROPDOWN
			if ((fieldType == "text") ||
			    (fieldType == "textarea")) //|| (fieldType == "select-one"))
			{
		    	string = string + frm.elements[e].value + "|";
//		    	alert(frm.elements[e].value);
			}

			// SELECT 
			if (fieldType == "select-one") {
				alert("berore setting option" + fieldType);
				string = string + frm.elements[e].options.selectedIndex + "|";
			}
			
			
			// CHECKBOX
			if (fieldType == "checkbox") {
				if (frm.elements[e].checked==true) {
					var setvalue = "1";
				}
				
				if (frm.elements[e].checked==false) {
					var setvalue = "0";
				}
				
				string = string + setvalue + "|";
			}

			// HIDDEN field
			if (fieldType == "hidden") {
		    	string = string + frm.elements[e].value + "|";
		    	//alert("text");
			}
			
			// NUMBER
			if (fieldType == "number") {
				string += frm.elements[e].value.toString() + "|";	
			}
		}

		setCookie(cookieName, string, exp); 

}

//
// LOAD FORM FIELD SELECTIONS FROM SAVED COOKIES
//

function loadSelections(frm) {
	var e;
	var z;
	var x;
	var cookieName;
	var fieldArray;
	var fieldValues;
	var fieldValue;

	var formname = frm.name;

	// Retrieve form elements from cookie and split into array.

	cookieName  = formname;
	fieldValues = getCookie(cookieName);

	if (fieldValues != null) {
		fieldArray  = fieldValues.split("|");
	} else {
		//document.write("NULL !!!")
		alert("NULL");
	}

//	!!!alert(fieldArray);
//alert(fieldArray[0]);
//alert(fieldArray[1]);
//alert(fieldArray[2]);
//alert(fieldArray[3]);

		var n = frm.length;
		for (i = 0; i < n; i++) {
			e = frm[i].name;
			z = i;
			z++;
			var fieldType  = frm[i].type;
			var fieldValue = fieldArray[z];
			
//			alert("current type "+fieldType);
			//
			// TEXT, TEXTAREA, and DROPDOWN
			//
			if ((fieldType == "text") ||
			    (fieldType == "textarea")) //|| (fieldType == "select-one"))
			{
		    	frm.elements[e].value = fieldValue;
		    	//alert(e);
		    	//alert(fieldValue);
			}

			//SELECT
			if (fieldType == "select-one") {
//				alert("Before option setting: " + fieldValue);
				frm.elements[e].options[fieldValue].selected = true;
			}
			
			if (fieldType == "select-one") {
//				alert("xxxxx" + fieldType);
//				alert("DESC " + typeof fieldValue);
				//let index = parseInt(fieldValue);
				let index = Number(fieldValue);
				//string = string + frm.elements[e].options.selectedIndex + "|";
//				alert("indextype " + typeof index);
				frm.elements[e].options[index].selected = true;
				
			}

			// CHECKBOX
			if (fieldType == "checkbox")
			{
				fld_checkbox = fieldValue;
				if (fld_checkbox == "1") {
					frm.elements[e].checked = true;
				}
			}

			// RADIO BUTTON
			if (fieldType == "radio") {
				if (fieldValue == null) {
					alert("RADIO is NULL");
				}
				x = fieldValue;
//				alert("Current Radio = " + x);
				//alert(x);
				frm.elements[e][x].checked = true;
			}

			//
			// HIDDEN field
			if (fieldType == "hidden") {
		    	frm.elements[e].value = fieldValue;
		    }
			
			// NUMBER
			if (fieldType == "number") {
				frm.elements[e].value = fieldValue;
			}
		
		}
}
