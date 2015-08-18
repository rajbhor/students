 function isno(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
	
	
} 
 
 function no(evt)  {
	 
             
             
			
			var charCode = (evt.which) ? evt.which : event.keyCode
			  
    if (charCode ==39 || charCode ==34 || charCode ==45 ||  charCode==123 ||  charCode==125 || charCode==91 || charCode==93 || charCode==62 || charCode==60 || charCode==44 || charCode==59 || charCode==58 || charCode==124 || charCode==47 || charCode==92)
        return false;
    return true;
	 
        }
 
  
 
    function PreviewImage(inputFile) {
		var maximum =  1048576; // 1MB

		 
	 var filename=inputFile.value;
	 var valid_extensions = /(\.jpg|\.jpeg|\.png)$/i;   
if(!valid_extensions.test(filename))
{ 
   alert('Please upload a image in .jpeg .jpg or .png formats');
   inputFile.value = null;
   return false;
   
}
		
		
  else if (inputFile.files && inputFile.files[0].size > maximum) {
    alert("Photo size exceeded 1MB. Please choose a photo that is less than or equal to 1MB"); // Do your thing to handle the error.
    inputFile.value = null; // Clear the field.
	return false;
   }
   else { 

         var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
            $("#uploadPreview").show();
             
        }
   }
	}
    

   
     function PreviewImageChange(inputFile) {
        var maximum =  1048576; // 1MB

         
     var filename=inputFile.value;
     var valid_extensions = /(\.jpg|\.jpeg|\.png)$/i;   
if(!valid_extensions.test(filename))
{ 
   alert('Please upload a image in .jpeg .jpg or .png formats');
   inputFile.value = null;
   return false;
   
}
        
        
  else if (inputFile.files && inputFile.files[0].size > maximum) {
    alert("Photo size exceeded 1MB. Please choose a photo that is less than or equal to 1MB"); // Do your thing to handle the error.
    inputFile.value = null; // Clear the field.
    return false;
   }
   else { 

          $("#spic").click();


   }
    }
    

 function onlya(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode==32)
                    return true;
                else
                    return false;
            }
            catch (err) {
                //alert(err.Description);
            }
        }
 

  function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode==32)
                    return true;
                else
                    return false;
            }
            catch (err) {
                //alert(err.Description);
            }
        }
 