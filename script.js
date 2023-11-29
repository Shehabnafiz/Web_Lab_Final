document.getElementById('subscribe-form').addEventListener('submit', function(event) {
    event.preventDefault();
     
    var email = document.getElementById('subscribe-email').value;
     
    // Replace with your actual subscription code here
    console.log('Subscribed:', email);
   });