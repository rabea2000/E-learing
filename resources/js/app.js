import './bootstrap';



document.addEventListener('DOMContentLoaded', function () {
  const dropdownButton = document.getElementById('dropdownDefault');
  
  if (dropdownButton) {
    dropdownButton.addEventListener('click', function (event) {
      const dropdown = document.getElementById('dropdown');
      if (dropdown) {
        dropdown.classList.toggle('hidden');
      }
      event.stopPropagation(); // Prevents the document click event from immediately hiding the dropdown
    });
  }
});

  // Hide the dropdown when clicking outside of it
  document.addEventListener('click', function (event) {
    const dropdown = document.getElementById('classMenu');
    const button = document.getElementById('classButton');
    const dropdownButton = document.getElementById('dropdownDefault');
    const dropdownfilter = document.getElementById('dropdown');

      if (dropdown && button){
    // Check if the clicked element is outside the dropdown and the button
    if (!dropdown.contains(event.target) && !button.contains(event.target)) {
      dropdown.classList.add('hidden');
    }}


  });





window.showClassList = function(){
  
  const dropdown = document.getElementById('classMenu');
  dropdown.classList.toggle('hidden');
  
}

window.showreplyfield = function (label , action, name ,value){
       
     
      
  const replyField = document.getElementById("replyField");
  const replyButton = document.getElementById("reply");
  const name_label = document.getElementById("name_label");
  const form = document.getElementById("comment_or_reply_form");
  const hidden_input = document.getElementById("hidden_input_form");

  
  if (label == undefined) {
    replyField.style.display = "none";
    
    return  ; 
        //  replyField.classList.add('fixed' ,'bottom-0', 'left-1/2 transform', '-translate-x-1/2');
  }

  
    replyField.style.display = "block";
    
    name_label.textContent = label ;
    
    form.action = action ;
   
    hidden_input.name = name ; 
    
    hidden_input.value = value ;
    
     
  

}

window.showdropdownComment = function (comment_id ,reply ) {
    
  const dropdownButton = document.getElementById('dropdownCommentButton');
   
  if( reply == undefined  ){
     const dropdownMenu = document.getElementById('dropdownComment'+comment_id);
     dropdownMenu.classList.toggle('hidden');
     return ; 
    
  }

  const dropdownMenu  = document.getElementById('dropdownReply'+comment_id);
  dropdownMenu.classList.toggle('hidden');


 }

 window.toggleDropdownMobile = function () {
     
  const dropdown = document.getElementById('dropdown-menu-m');
  dropdown.classList.toggle('hidden');

}

