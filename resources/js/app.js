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



 window.toggleDropdownMobile = function () {
     
  const dropdown = document.getElementById('dropdown-menu-m');
  dropdown.classList.toggle('hidden');

}



// const fileInput = document.getElementById('fileInput');
// const progressBar = document.getElementById('progressBar');
// const statusText = document.getElementById('status');

// fileInput.addEventListener('change', (event) => {
//   const file = event.target.files[0];
//   if (file) {
//     uploadFile(file);
//   }
// });

// function uploadFile(file) {
//   const xhr = new XMLHttpRequest();
//   const formData = new FormData();
//   formData.append('file', file);

//   // Update progress bar during upload
//   xhr.upload.addEventListener('progress', (event) => {
//     if (event.lengthComputable) {
//       const percentComplete = (event.loaded / event.total) * 100;
//       progressBar.value = percentComplete;
//       statusText.textContent = `Upload progress: ${Math.round(percentComplete)}%`;
//     }
//   });

//   // Handle successful upload
//   xhr.addEventListener('load', () => {
//     if (xhr.status === 200) {
//       statusText.textContent = 'Upload complete!';
//     } else {
//       statusText.textContent = 'Upload failed!';
//     }
//   });

//   // Handle errors
//   xhr.addEventListener('error', () => {
//     statusText.textContent = 'Error occurred during upload.';
//   });

//   // Configure the request
//   xhr.open('POST', '/admin/files',true);
//   xhr.send(formData);
// }
